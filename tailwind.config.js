module.exports = {
  purge: {
    enabled: true,
    content: [
      './www/site/templates/**/*.php',
      './www/site/snippets/**/*.php']
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {}
  },
  variants: {
    extend: {}
  },
  plugins: []
}
