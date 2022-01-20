module.exports = {
  theme: {
    extend: {
      colors: {
        primary: '#143D59',
        secondary: '#F4B41A',
        mydark: '#252525',
        success: 'green',
        warning: 'orange',
        error: 'red',
        danger: 'red',
        info: 'grey',
      },
      height: {
        quarterscreen: '25vh',
        midscreen: '50vh',
        thirdscreen: '75vh',
      },
      minWidth: {
        '100': '100px',
        '250': '200px',
        '500': '500px',
      },
      minHeight: {
        '100': '100px',
        '250': '200px',
        '500': '500px',
        'quarterscreen': '25vh',
        'midscreen': '50vh',
        'thirdscreen': '75vh',

      },
      typography: (theme) => ({
        DEFAULT: {
          css: {
            "code::before": {content: ''},
            "code::after": {content: ''},
            a: {
              color: theme('colors.primary'),
            },
            
          },
        },
      }),
    },
    fontFamily: {
      'sans': ['Raleway', 'Arial', 'sans-serif']
    },
    fill: theme => ({
      'primary': theme('colors.primary'),
      'secondary': theme('colors.secondary'),
      'mydark': theme('colors.mydark'),
      'white': theme('colors.white'),
      'success': theme('colors.success'),
      'warning': theme('colors.warning'),
      'error': theme('colors.error'),
      'info': theme('colors.info'),
    }),
    stroke: theme => ({
      'primary': theme('colors.primary'),
      'secondary': theme('colors.secondary'),
      'mydark': theme('colors.mydark'),
      'white': theme('colors.white'),
      'success': theme('colors.success'),
      'warning': theme('colors.warning'),
      'error': theme('colors.error'),
      'info': theme('colors.info'),
    }),
  },
  variants: { // all the following default to ['responsive']
    textIndent: ['responsive'],
    textShadow: ['responsive'],
    ellipsis: ['responsive'],
    hyphens: ['responsive'],
    kerning: ['responsive'],
    textUnset: ['responsive'],
    fontVariantCaps: ['responsive'],
    fontVariantNumeric: ['responsive'],
    fontVariantLigatures: ['responsive'],
    textRendering: ['responsive'],

    textColor: ['responsive', 'hover', 'focus', 'group-hover'],
    opacity: ['responsive', 'hover', 'focus', 'active', 'group-hover'],

    transitionProperty: ['responsive'],
    transitionDuration: ['responsive'],
    transitionTimingFunction: ['responsive'],
    transitionDelay: ['responsive'],
    willChange: ['responsive'],


  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    require('tailwind-scrollbar'),
    require('@tailwindcss/aspect-ratio'),
  ],
}