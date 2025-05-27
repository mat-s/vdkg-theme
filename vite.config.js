import { fileURLToPath } from 'url';
import { dirname, resolve } from 'path';
import FullReload from 'vite-plugin-full-reload';

const __filename = fileURLToPath(import.meta.url);
const __dirname = dirname(__filename);

export default {
  root: 'src',
  plugins: [
    FullReload([
      '../wp-content/themes/**/*.php',
      '../wp-content/plugins/**/*.php',
    ])
  ],
  build: {
    outDir: '../wp-content/themes/ravensbrueck-theme/dist',
    emptyOutDir: true,
    rollupOptions: {
      input: {
        app: resolve(__dirname, 'js/main.js'),
        styles: resolve(__dirname, 'scss/styles.scss')
      },
      output: {
        entryFileNames: '[name].js',
        assetFileNames: '[name].css'
      }
    }
  },
  css: {
    postcss: {
      plugins: [require('autoprefixer')]
    }
  },
  server: {
    proxy: {
      '/': {
        target: 'http://localhost:8000', // WordPress local dev URL
        changeOrigin: true,
        secure: false
      }
    },
    watch: {
      usePolling: true
    },
    open: false,
    port: 5173
  }
};