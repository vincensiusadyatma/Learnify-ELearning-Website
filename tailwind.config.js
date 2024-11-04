/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            screens: {
                'sm': '340px',   // => @media (min-width: 640px) ( small phone )
                'md': '568px',  // => @media (min-width: 768px) ( big phone)
                'lg': '1024px',  // => @media (min-width: 1024px) ( small tablet )
                'xl': '1280px',  // => @media (min-width: 1280px) ( big tablet && laptop )
                '2xl': '1536px',  // => @media (min-width: 1536px) ( dekstop )
            },
            colors: {
                'purple-dark-theme': '#693EA7',
                'blue-dark-theme': '#222265',
                'white-theme': '#FAFBFF'
            }
        },
       
    },
    darkMode: 'class',
    plugins: [],
}


