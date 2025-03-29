/** @type {import('tailwindcss').Config} */
module.exports = {
  content: {
    relative: true,

    files: ["./admin/**/*.{html,js,php}", "./user/**/**/*.{ html, js, php }"],

  },
  theme: {
    extend: {
      fontFamily: {
        inter: ["'Inter'", "sans-serif"],
      },
    },
  },
  plugins: [],
};
