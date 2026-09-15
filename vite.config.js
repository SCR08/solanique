import { dirname, resolve } from 'node:path';
import { fileURLToPath } from 'node:url';
import { defineConfig } from 'vite';

const themeRoot = dirname(fileURLToPath(import.meta.url));

/**
 * Vite configuration for the Solanique WordPress theme.
 *
 * The build writes hashed production assets and a manifest to assets/dist so
 * WordPress can enqueue the correct files without hard-coded filenames.
 */
export default defineConfig({
	root: themeRoot,
	base: './',
	// Theme media is authored in src/assets and copied into assets/dist by Vite.
	publicDir: resolve(themeRoot, 'src/assets'),
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
