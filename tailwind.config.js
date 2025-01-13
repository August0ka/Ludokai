/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                "vivid-violet": {
                    50: "#fbf6fd",
                    100: "#f5ecfb",
                    200: "#ebd9f5",
                    300: "#dcbaed",
                    400: "#c791e1",
                    500: "#af66cf",
                    600: "#8e44ad",
                    700: "#7a3794",
                    800: "#652f79",
                    900: "#562b64",
                    950: "#351240",
                },
                pumpkin: {
                    50: "#fff9ec",
                    100: "#fff1d3",
                    200: "#ffdfa5",
                    300: "#ffc86d",
                    400: "#ffa432",
                    500: "#ff880a",
                    600: "#ff6f00",
                    700: "#cc5002",
                    800: "#a13e0b",
                    900: "#82350c",
                    950: "#461804",
                },
                "blue-night": {
                    50: "#e4edff",
                    100: "#cfddff",
                    200: "#a8c0ff",
                    300: "#7495ff",
                    400: "#3e56ff",
                    500: "#131bff",
                    600: "#0002ff",
                    700: "#0002ff",
                    800: "#0002e4",
                    900: "#050056",
                    950: "#020024",
                },
            },
        },
    },
    plugins: [],
};
