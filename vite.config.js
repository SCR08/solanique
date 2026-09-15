import { promises as fs } from 'node:fs';
import { dirname, extname, join, resolve } from 'node:path';
import { fileURLToPath } from 'node:url';
import { defineConfig } from 'vite';

const themeRoot = dirname(fileURLToPath(import.meta.url));
const sourceAssetRoot = resolve(themeRoot, 'src/assets');
const distAssetRoot = resolve(themeRoot, 'assets/dist');
const excludedAssetDirectories = new Set(['_incoming', '_review']);
const excludedAssetFiles = new Set([
	'.DS_Store',
	'asset-manifest.csv',
	'asset-manifest.json',
	'privacy-global-globe-background.png',
]);
const excludedAssetExtensions = new Set(['.eps']);

async function copyProductionAssets(sourceDirectory, destinationDirectory) {
	const entries = await fs.readdir(sourceDirectory, { withFileTypes: true });

	await fs.mkdir(destinationDirectory, { recursive: true });

	await Promise.all(entries.map(async (entry) => {
		if (excludedAssetFiles.has(entry.name) || excludedAssetDirectories.has(entry.name)) {
			return;
		}

		const sourcePath = join(sourceDirectory, entry.name);
		const destinationPath = join(destinationDirectory, entry.name);

		if (entry.isDirectory()) {
			await copyProductionAssets(sourcePath, destinationPath);
			return;
		}

		if (!entry.isFile() || excludedAssetExtensions.has(extname(entry.name).toLowerCase())) {
			return;
		}

		await fs.copyFile(sourcePath, destinationPath);
	}));
}

function solaniqueProductionAssetCopy() {
	return {
		name: 'solanique-production-asset-copy',
		apply: 'build',
		closeBundle: async () => {
			await copyProductionAssets(sourceAssetRoot, distAssetRoot);
		},
	};
}

/**
 * Vite configuration for the Solanique WordPress theme.
 *
 * The build writes hashed production assets and a manifest to assets/dist so
 * WordPress can enqueue the correct files without hard-coded filenames.
 */
export default defineConfig({
	root: themeRoot,
	base: './',
	publicDir: false,
	plugins: [
		solaniqueProductionAssetCopy(),
	],
	server: {
		host: 'localhost',
		port: 5173,
		strictPort: true,
		cors: true,
	},
	build: {
		emptyOutDir: true,
		manifest: 'manifest.json',
		outDir: resolve(themeRoot, 'assets/dist'),
		rollupOptions: {
			input: {
				app: resolve(themeRoot, 'src/js/app.js'),
				main: resolve(themeRoot, 'src/css/main.css'),
			},
			output: {
				assetFileNames: '[name]-[hash][extname]',
				chunkFileNames: '[name]-[hash].js',
				entryFileNames: '[name]-[hash].js',
			},
		},
	},
});
