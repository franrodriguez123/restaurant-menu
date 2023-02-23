import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/css/app.scss',
                'resources/css/admin.scss',
                'resources/css/frontend/app.scss',
                'resources/js/app.js',
                'resources/js/admin.js',
                'resources/js/frontend.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
            vue: 'vue/dist/vue.esm-bundler.js',
        }
    }
});
