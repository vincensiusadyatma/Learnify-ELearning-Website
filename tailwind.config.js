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
        colors: {
            'purple-dark-theme': '#693EA7',
            'blue-dark-theme': '#222265',
            'white-theme': '#FAFBFF'
        }
    },
    darkMode: 'class',
    plugins: [
        require('flowbite/plugin'),
    ],
}


