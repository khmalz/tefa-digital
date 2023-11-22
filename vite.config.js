import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import viteImagemin from "vite-plugin-imagemin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/js/client.js",
                "resources/js/datatable.js",
                "resources/js/auth.js",
                "resources/js/admin.js",
            ],
            refresh: true,
        }),
        viteImagemin({
            gifsicle: {
                optimizationLevel: 7,
                interlaced: false,
            },
            optipng: {
                optimizationLevel: 7,
            },
            mozjpeg: {
                quality: 50,
                maxMemory: 600,
            },
            pngquant: {
                quality: [0.8, 0.9],
                speed: 4,
            },
            svgo: {
                plugins: [
                    {
                        name: "removeViewBox",
                    },
                    {
                        name: "removeEmptyAttrs",
                        active: false,
                    },
                ],
            },
        }),
    ],
});
