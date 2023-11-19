import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/js/client.js",
                "resources/js/datatable.js",
                "resources/js/auth.js",
            ],
            refresh: true,
        }),
    ],
});
