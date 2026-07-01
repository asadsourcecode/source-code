import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig(({ command }) => ({
    // In dev mode, serve the public directory so CSS background-image URLs
    // like url('/images/...') resolve correctly from Vite's dev server.
    publicDir: command === 'serve' ? 'public' : false,

    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            fonts: [
                bunny('Instrument Sans', {
                    weights: [400, 500, 600],
                }),
            ],
        }),
        tailwindcss(),
    ],

    server: {
        origin: 'http://localhost:5173',
        cors: true,
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
}));
