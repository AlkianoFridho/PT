import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import vueDevTools from 'vite-plugin-vue-devtools';

// Konfigurasi Vite
export default defineConfig({
  plugins: [
    vue(),         // Plugin Vue utama
    vueDevTools(), // Plugin Vue DevTools untuk debugging
  ],
});
