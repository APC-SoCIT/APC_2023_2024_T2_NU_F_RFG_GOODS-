import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./pages/**/*.{js,ts,jsx,tsx}",
        "./components/**/*.{js,ts,jsx,tsx}"
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'rfg-background': '#0D121F', //light black
                'rfg-text': '#FFF9F3', //white
                'rfg-primary': '#F9CD7B', //light orange
                'rfg-secondary': '#1D222F', //light light black
                'rfg-accent': '#F6903F', //orange
                'rfg-canvas': '#010613', // black
            },
            screens: {
                'cellphone': '400px',
                // => @media (min-width:400px)
                'tablet': '640px',
                // => @media (min-width: 640px)
        
                'laptop': '1024px',
                // => @media (min-width: 1024px)
        
                'desktop': '1280px',
                // => @media (min-width: 1280px)
            },
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin'),
    ],
};


