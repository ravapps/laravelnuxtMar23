/*
** TailwindCSS Configuration File
**
** Docs: https://tailwindcss.com/docs/configuration
** Default: https://github.com/tailwindcss/tailwindcss/blob/master/stubs/defaultConfig.stub.js
*/
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  variants: {
    extend: {
    },
  },
  plugins: [
      require('tw-elements/dist/plugin')
  ],
  theme: {
    extend: {
      colors: {
      },
      fontFamily: {
        sans: ['Inter var', ...defaultTheme.fontFamily.sans],
      },
    },
  },
  purge: {
    // Learn more on https://tailwindcss.com/docs/controlling-file-size/#removing-unused-css
    enabled: process.env.NODE_ENV === 'production',
    content: [
      './src/**/*.{html,js}',
      './node_modules/tw-elements/dist/js/**/*.js',
      'node_modules/tv-*/dist/tv-*.umd.min.js',
      'client/components/**/*.vue',
      'client/layouts/**/*.vue',
      'client/pages/**/*.vue',
      'client/plugins/**/*.js',
      'client/lib/**/*.ts',
      'client/lib/**/*.js',
      'client/lib/**/*.vue',
      'nuxt.config.js',
    ],
  },
}
