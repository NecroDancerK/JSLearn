/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.{html,php}',
    './learn/*.{html,php}',
    './learn/components/*.{html,php}',
    './tasks/*.{html,php}',
    './tasks/components/*.{html,php}',
    './tests/*.{html,php}',
    './tests/components/*.{html,php}',
  ],
  theme: {
    extend: {},
  },
  darkMode: 'selector',
}

