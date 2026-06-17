import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                primary: {
                    1: '#b7c99d', // Sage
                    2: '#b9be8f', // Olive Sage
                    3: '#b6c594', // Light Earthy Green
                    muted: '#a4bb8d', // Deep Muted Sage
                    deep: '#a5c897', // Fresh Leaf Green
                },
                brand: {
                    dark: '#141811',
                    light: '#fcfdfa',
                }
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
