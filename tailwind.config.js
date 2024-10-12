/** @type {import('tailwindcss').Config} */
export default {
    daisyui: {
        themes: ["light", "dark", "cupcake"],
      },
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {keyframes: {
        slideIn: {
          '0%': { transform: 'translateY(-100%)', opacity: '0' },
          '100%': { transform: 'translateY(0)', opacity: '1' },
        },
        fadeOut: {
          '100%': { opacity: '0', transform: 'translateY(-100%)' },
        },
      },
      animation: {
        slideIn: 'slideIn 0.5s ease-out forwards',
        fadeOut: 'fadeOut 1s ease-out forwards',
      },
    },
  },
  plugins: [require('daisyui')],
}

