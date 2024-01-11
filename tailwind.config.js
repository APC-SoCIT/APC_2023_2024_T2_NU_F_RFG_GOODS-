import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
const colors = require('tailwindcss/colors');

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
              'bistre': '#231006',
              'dutch-white': '#EFE4C5',
              'kombu-green': '#243010',
              'polished-pine': '#539987',
              'midnight-green': '#1A535C',
              ...colors,
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


