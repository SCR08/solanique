import { promises as fs } from 'node:fs';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

const ROOT_DIR = path.resolve(path.dirname(fileURLToPath(import.meta.url)), '..');
const ASSET_DIR = path.join(ROOT_DIR, 'src', 'assets');

const IMAGE_INCOMING = path.join(ASSET_DIR, 'images', '_incoming');
const VIDEO_INCOMING = path.join(ASSET_DIR, 'videos', '_incoming');

const IMAGE_DESTINATIONS = {
	hero: path.join(ASSET_DIR, 'images', 'hero'),
	capital: path.join(ASSET_DIR, 'images', 'capital'),
	estates: path.join(ASSET_DIR, 'images', 'estates'),
	concierge: path.join(ASSET_DIR, 'images', 'concierge'),
	about: path.join(ASSET_DIR, 'images', 'about'),
	backgrounds: path.join(ASSET_DIR, 'images', 'backgrounds'),
	general: path.join(ASSET_DIR, 'images', 'general'),
	review: path.join(ASSET_DIR, 'images', '_review'),
};

const VIDEO_DESTINATIONS = {
	hero: path.join(ASSET_DIR, 'videos', 'hero'),
	backgrounds: path.join(ASSET_DIR, 'videos', 'backgrounds'),
	general: path.join(ASSET_DIR, 'videos', 'general'),
	review: path.join(ASSET_DIR, 'videos', '_review'),
};

const IMAGE_EXTENSIONS = new Set(['.jpg', '.jpeg', '.png', '.webp', '.avif', '.svg']);
const VIDEO_EXTENSIONS = new Set(['.mp4', '.webm', '.mov']);

const USAGE_BY_CATEGORY = {
	hero: 'Homepage hero or major page hero visual.',
	capital: 'Solanique Capital sections, capital strategy visuals, advisory content.',
	estates: 'Solanique Estates sections, property advisory visuals, real estate content.',
	concierge: 'Solanique Concierge sections, lifestyle coordination visuals.',
	about: 'About page, firm positioning, leadership/editorial sections.',
	backgrounds: 'Decorative backgrounds, CTA overlays, abstract section visuals.',
	general: 'Secondary visual support.',
	review: 'Needs human review before use.',
};

const CATEGORY_KEYWORDS = {
	hero: [
		'hero',
		'main',
		'homepage',
		'landing',
		'brand',
		'cinematic',
		'luxury-architecture',
		'luxury-interior',
		'private-office',
		'premium-interior',
		'elegant-building',
		'city',
		'skyline',
		'entrance',
		'lobby',
	],
	capital: [
		'capital',
		'investment',
		'investor',
		'finance',
		'financial',
		'meeting',
		'business',
		'strategy',
		'advisory',
		'wealth',
		'private-capital',
		'boardroom',
		'portfolio',
		'planning',
		'executive',
		'institution',
	],
	estates: [
		'estate',
		'estates',
		'real-estate',
		'property',
		'residence',
		'residential',
		'villa',
		'mansion',
		'home',
		'house',
		'architecture',
		'architectural',
		'exterior',
		'interior',
		'development',
		'luxury-residence',
		'pool',
		'penthouse',
	],
	concierge: [
		'concierge',
		'lifestyle',
		'travel',
		'hospitality',
		'service',
		'personal',
		'luxury-lifestyle',
		'car',
		'chauffeur',
		'yacht',
		'hotel',
		'dining',
		'experience',
		'luggage',
		'airport',
		'private-service',
	],
	about: [
		'about',
		'firm',
		'leadership',
		'founder',
		'team',
		'office',
		'private-office',
		'editorial',
		'brand-story',
		'corporate',
		'institutional',
		'portrait',
	],
	backgrounds: [
		'background',
		'texture',
		'abstract',
		'pattern',
		'bokeh',
		'gold',
		'black',
		'gradient',
		'marble',
		'detail',
		'light',
		'shadow',
		'overlay',
	],
};

const CATEGORY_MARKERS = {
	hero: ['hero'],
	capital: ['capital'],
	estates: ['estate', 'estates'],
	concierge: ['concierge'],
	about: ['about', 'firm'],
	backgrounds: ['background', 'backgrounds'],
};

const REVIEW_NAME_PATTERNS = [
	/(^|[-_ ])copy([-_ ]|$)/,
	/(^|[-_ ])duplicate([-_ ]|$)/,
	/(^|[-_ ])final([-_ ]|$)/,
	/(^|[-_ ])untitled([-_ ]|$)/,
	/^img[-_ ]?\d+/,
	/^dsc[-_ ]?\d+/,
	/^screenshot/,
	/\(\d+\)$/,
];

const MANIFEST_JSON = path.join(ASSET_DIR, 'asset-manifest.json');
const MANIFEST_CSV = path.join(ASSET_DIR, 'asset-manifest.csv');
const MANIFEST_FIELDS = [
	'original_path',
	'new_path',
	'filename',
	'file_type',
	'category',
	'confidence',
	'reason',
	'recommended_usage',
	'alt_text_suggestion',
];

async function main() {
	await ensureDirectories();

	const existingRecords = await readManifestRecords();
	const processed = [];

	processed.push(...await processIncomingDirectory(IMAGE_INCOMING, 'image'));
	processed.push(...await processIncomingDirectory(VIDEO_INCOMING, 'video'));

	const records = upsertRecords(existingRecords, processed);
	await writeManifests(records);

	printSummary(processed);
}

async function ensureDirectories() {
	const directories = [
		IMAGE_INCOMING,
		VIDEO_INCOMING,
		...Object.values(IMAGE_DESTINATIONS),
		...Object.values(VIDEO_DESTINATIONS),
	];

	await Promise.all(directories.map((directory) => fs.mkdir(directory, { recursive: true })));
}

async function processIncomingDirectory(incomingDirectory, sourceType) {
	const entries = await fs.readdir(incomingDirectory, { withFileTypes: true });
	const processed = [];

	for (const entry of entries) {
		if (!entry.isFile() || entry.name.startsWith('.')) {
			continue;
		}

		const originalPath = path.join(incomingDirectory, entry.name);
		const classification = classifyFile(entry.name, sourceType);
		const destinations = sourceType === 'image' ? IMAGE_DESTINATIONS : VIDEO_DESTINATIONS;
		const destinationDirectory = destinations[classification.category] || destinations.review;
		const newPath = await getAvailablePath(destinationDirectory, entry.name);

		await fs.rename(originalPath, newPath);

		processed.push({
			original_path: toRelativePath(originalPath),
			new_path: toRelativePath(newPath),
			filename: path.basename(newPath),
			file_type: classification.fileType,
			category: classification.category,
			confidence: classification.confidence,
			reason: classification.reason,
			recommended_usage: USAGE_BY_CATEGORY[classification.category],
			alt_text_suggestion: getAltTextSuggestion(path.basename(newPath), classification.category),
		});
	}

	return processed;
}

function classifyFile(filename, sourceType) {
	const extension = path.extname(filename).toLowerCase();
	const supportedExtensions = sourceType === 'image' ? IMAGE_EXTENSIONS : VIDEO_EXTENSIONS;
	const filenameBase = path.basename(filename, extension).toLowerCase();

	if (!supportedExtensions.has(extension)) {
		return {
			category: 'review',
			confidence: 'low',
			fileType: 'unsupported',
			reason: `Unsupported ${sourceType} file extension "${extension || 'none'}".`,
		};
	}

	if (isPoorlyNamed(filenameBase)) {
		return {
			category: 'review',
			confidence: 'low',
			fileType: sourceType,
			reason: 'Filename appears ambiguous or duplicated-looking and needs human review.',
		};
	}

	const scores = getCategoryScores(filenameBase, sourceType);
	const rankedScores = Object.entries(scores)
		.filter(([, score]) => score > 0)
		.sort((a, b) => b[1] - a[1]);

	if (!rankedScores.length) {
		if (isSeoFriendlyName(filenameBase)) {
			return {
				category: 'general',
				confidence: 'medium',
				fileType: sourceType,
				reason: 'Supported asset with an SEO-friendly filename but no strong category signal.',
			};
		}

		return {
			category: 'review',
			confidence: 'low',
			fileType: sourceType,
			reason: 'Filename does not provide enough context for safe automatic classification.',
		};
	}

	const [bestCategory, bestScore] = rankedScores[0];
	const secondScore = rankedScores[1]?.[1] || 0;

	if (bestScore === secondScore && bestScore >= 3) {
		return {
			category: 'review',
			confidence: 'low',
			fileType: sourceType,
			reason: `Ambiguous filename matched multiple categories with equal confidence: ${getTopCategories(rankedScores).join(', ')}.`,
		};
	}

	const confidence = bestScore >= 5 && bestScore - secondScore >= 2 ? 'high' : 'medium';

	return {
		category: bestCategory,
		confidence,
		fileType: sourceType,
		reason: `Filename matched ${bestCategory} signals${secondScore ? ` with a ${bestScore - secondScore} point margin` : ''}.`,
	};
}

function getCategoryScores(filenameBase, sourceType) {
	const scores = {};
	const searchableName = `-${filenameBase.replace(/[_\s]+/g, '-')}-`;
	const allowedCategories = sourceType === 'video' ? ['hero', 'backgrounds', 'general'] : Object.keys(CATEGORY_KEYWORDS);

	for (const category of allowedCategories) {
		if ('general' === category) {
			continue;
		}

		let score = 0;
		const markers = CATEGORY_MARKERS[category] || [];

		for (const marker of markers) {
			if (searchableName.includes(`-${marker}-`) || filenameBase.startsWith(`solanique-${marker}-`)) {
				score += 8;
			}
		}

		for (const keyword of CATEGORY_KEYWORDS[category]) {
			if (searchableName.includes(`-${keyword}-`)) {
				score += keyword.includes('-') ? 3 : 2;
			}
		}

		scores[category] = score;
	}

	return scores;
}

function isPoorlyNamed(filenameBase) {
	return filenameBase.length < 8 || REVIEW_NAME_PATTERNS.some((pattern) => pattern.test(filenameBase));
}

function isSeoFriendlyName(filenameBase) {
	return filenameBase.startsWith('solanique-') && filenameBase.split('-').length >= 4;
}

function getTopCategories(rankedScores) {
	const topScore = rankedScores[0][1];

	return rankedScores.filter(([, score]) => score === topScore).map(([category]) => category);
}

async function getAvailablePath(destinationDirectory, filename) {
	await fs.mkdir(destinationDirectory, { recursive: true });

	const extension = path.extname(filename);
	const basename = path.basename(filename, extension);
	let candidate = path.join(destinationDirectory, filename);
	let duplicateIndex = 1;

	while (await pathExists(candidate)) {
		const suffix = String(duplicateIndex).padStart(2, '0');
		candidate = path.join(destinationDirectory, `${basename}-duplicate-${suffix}${extension}`);
		duplicateIndex += 1;
	}

	return candidate;
}

async function pathExists(candidatePath) {
	try {
		await fs.access(candidatePath);
		return true;
	} catch {
		return false;
	}
}

async function readManifestRecords() {
	if (await pathExists(MANIFEST_JSON)) {
		const json = await fs.readFile(MANIFEST_JSON, 'utf8');
		const records = JSON.parse(json || '[]');

		return Array.isArray(records) ? records : [];
	}

	if (await pathExists(MANIFEST_CSV)) {
		return parseCsv(await fs.readFile(MANIFEST_CSV, 'utf8'));
	}

	return [];
}

function upsertRecords(existingRecords, newRecords) {
	const recordsByOriginalPath = new Map();

	for (const record of existingRecords) {
		if (record?.original_path) {
			recordsByOriginalPath.set(record.original_path, normalizeManifestRecord(record));
		}
	}

	for (const record of newRecords) {
		recordsByOriginalPath.set(record.original_path, normalizeManifestRecord(record));
	}

	return Array.from(recordsByOriginalPath.values());
}

function normalizeManifestRecord(record) {
	return MANIFEST_FIELDS.reduce((normalized, field) => {
		normalized[field] = String(record[field] ?? '');
		return normalized;
	}, {});
}

async function writeManifests(records) {
	await fs.writeFile(MANIFEST_JSON, `${JSON.stringify(records, null, 2)}\n`);
	await fs.writeFile(MANIFEST_CSV, toCsv(records));
}

function toCsv(records) {
	const rows = [
		MANIFEST_FIELDS.join(','),
		...records.map((record) => MANIFEST_FIELDS.map((field) => escapeCsvValue(record[field] || '')).join(',')),
	];

	return `${rows.join('\n')}\n`;
}

function parseCsv(csv) {
	const lines = csv.trim().split(/\r?\n/);

	if (lines.length < 2) {
		return [];
	}

	const headers = parseCsvLine(lines[0]);

	return lines.slice(1).map((line) => {
		const values = parseCsvLine(line);
		return headers.reduce((record, header, index) => {
			record[header] = values[index] || '';
			return record;
		}, {});
	});
}

function parseCsvLine(line) {
	const values = [];
	let value = '';
	let isQuoted = false;

	for (let index = 0; index < line.length; index += 1) {
		const character = line[index];
		const nextCharacter = line[index + 1];

		if ('"' === character && isQuoted && '"' === nextCharacter) {
			value += '"';
			index += 1;
			continue;
		}

		if ('"' === character) {
			isQuoted = !isQuoted;
			continue;
		}

		if (',' === character && !isQuoted) {
			values.push(value);
			value = '';
			continue;
		}

		value += character;
	}

	values.push(value);

	return values;
}

function escapeCsvValue(value) {
	const stringValue = String(value);

	if (!/[",\n\r]/.test(stringValue)) {
		return stringValue;
	}

	return `"${stringValue.replaceAll('"', '""')}"`;
}

function getAltTextSuggestion(filename, category) {
	if ('backgrounds' === category) {
		return '""';
	}

	if ('review' === category) {
		return 'Needs human review before alt text is assigned.';
	}

	const description = getReadableDescription(filename, category);
	const categoryLabel = getCategoryLabel(category);

	return `${description} suitable for ${categoryLabel}.`;
}

function getReadableDescription(filename, category) {
	const extension = path.extname(filename);
	const ignoredWords = new Set([
		'solanique',
		category,
		'image',
		'video',
		'asset',
		'duplicate',
	]);

	const words = path.basename(filename, extension)
		.toLowerCase()
		.split(/[-_\s]+/)
		.filter((word) => word && !ignoredWords.has(word) && !/^\d+$/.test(word));

	const phrase = words.join(' ') || 'Premium visual asset';

	return phrase.charAt(0).toUpperCase() + phrase.slice(1);
}

function getCategoryLabel(category) {
	const labels = {
		hero: 'a Solanique hero section',
		capital: 'Solanique Capital',
		estates: 'Solanique Estates',
		concierge: 'Solanique Concierge',
		about: 'the Solanique About page',
		general: 'Solanique Group',
	};

	return labels[category] || 'Solanique Group';
}

function toRelativePath(absolutePath) {
	return path.relative(ROOT_DIR, absolutePath).split(path.sep).join('/');
}

function printSummary(processed) {
	const categoryCounts = processed.reduce((counts, record) => {
		counts[record.category] = (counts[record.category] || 0) + 1;
		return counts;
	}, {});

	const reviewFiles = processed.filter((record) => 'review' === record.category);

	console.log('Solanique asset sorting complete.');
	console.log(`Processed files: ${processed.length}`);
	console.log('Category totals:');

	for (const category of ['hero', 'capital', 'estates', 'concierge', 'about', 'backgrounds', 'general', 'review']) {
		console.log(`- ${category}: ${categoryCounts[category] || 0}`);
	}

	if (reviewFiles.length) {
		console.log('Manual review required:');
		for (const record of reviewFiles) {
			console.log(`- ${record.new_path} (${record.reason})`);
		}
		return;
	}

	console.log('Manual review required: none');
}

main().catch((error) => {
	console.error('Asset sorting failed.');
	console.error(error);
	process.exitCode = 1;
});
