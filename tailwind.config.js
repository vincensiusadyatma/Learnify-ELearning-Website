/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {},
        colors: {'purple-dark-theme': '#693EA7'}
    },
    darkMode: 'class',
    plugins: [
        require('flowbite/plugin'),
    ],
}


