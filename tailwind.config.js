import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        berkleyBlue: '#1D3557',
        oxfordBlue: '#0F1D2E',
        lightCyan: '#E0FBFC',
        cerulean: '#457B9D',
        ivory: '#F4F4F4',
        honeydew: '#F1FAEE',
        burntSienna: '#EE6C4D',
        grey: '#444',
        night: '#141415',
        eerieBlack: '#202122',

      },
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
      },
    },
  },
  plugins: [],
}

