
export default {
  mode: 'universal',
  /*
  ** Headers of the page
  */
  head: {
    title: process.env.npm_package_name || '',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: process.env.npm_package_description || '' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },
  server: {
    port: 3000, // default: 3000
    host: '0.0.0.0', // default: localhost,
    //timing: false
  },
  /*
  ** Customize the progress-bar color
  */
  loading: { color: '#00D1B2' },
  /*
  ** Global CSS
  */
  css: [
    '~/assets/css/tailwind.css',
    '~/assets/css/simplegrid.css'
  ],
  /*
  ** Plugins to load before mounting the App
  */
  modules: [
    '@nuxtjs/axios',
    'nuxt-purgecss',
    '@nuxtjs/auth',
    '@nuxtjs/proxy',
  ],
  auth: {
    // Options
  },
  axios: {
    progress: true,
  },
  purgeCSS: {
    
  },
 /*
  ** Build configuration
  */
 build: {
  postcss: {
    plugins: {
      tailwindcss: './tailwind.config.js'
    }
  },
  /*
  ** You can extend webpack config here
  */
  extend(config, ctx) {
  }
},
transition: {
  name: 'fade',
  mode: 'out-in'
}
}
