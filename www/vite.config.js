import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    //vite動作の為の対応
    server: {
        host: true,
        hmr: {
            host: 'localhost',
            //protocol: 'ws', 
        },
        // watch: {
        //     usePolling: true,
        // },
    },
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
