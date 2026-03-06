/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",          // arquivos na raiz do tema
    "./**/*.php",       // todos os PHP dentro de subpastas
    "./assets/js/**/*.js"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};