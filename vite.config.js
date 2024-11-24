import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    root: resolve(__dirname, "src"),
    build: {
        outDir: "../dist",
    },
    server: {
        port: 8080,
    },
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});
