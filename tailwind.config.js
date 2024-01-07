/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources//*.blade.php",
    "./resources//.js",
    "./resources/**/.vue",
  ],
  theme: {
    extend: {
      colors: {
        'light-orange':'#fa9600',
      },
    },
  },
  plugins: [],
}

