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
            // フォントの追加(https://fonts.google.com/specimen/Figtree)
            fontFamily: {
                sans: ['"Figtree"', ...defaultTheme.fontFamily.sans],
                fantasy: "fantasy",
            },
            colors: {
                "selected-text": "#A3A3FF",// ここを追加
                "theme-color": "#5c318c", // ここを追加
                "accent-color": "#FFC107" // ここを追加
            },
            backgroundSize: {
                'auto': 'auto',
                'cover': 'cover',
                'contain': 'contain',
                '10%': '10%',
                '20%': '20%',
                '30%': '30%',
                '40%': '40%',
                '50%': '50%',
                '60%': '60%',
                '70%': '70%',
                '80%': '80%',
                '90%': '90%',
                '100%': '100%',
            },
            spacing: {
                '21': '5.25rem',
                '22': '5.5rem',
                '23': '5.75rem',
                '61': '15.25rem',
                '62': '15.5rem',
                '63': '15.75rem',
            },
        },
        plugins: [forms],
    },
};