<template>
  <div class="flex flex-no-wrap">
    <div class="w-12 bg-brown">
        <smallsidebar 
          v-bind:isPanelOpen="isPanelOpen"
          @open-panel="openSidebarPanel">
          <div class="flex flex-col items-center">
              <h1 class="brand font-semibold text-center uppercase">Family cooking</h1>
              <p class="text-grey text-xs pt-3">Ajoutez vos propres recettes, sauvegardez vos préférées et commentez vos coups de
                  coeur...</p>
          </div>
          <div class="flex flex-col my-10">
            <p class="label text-xs tracking-widest uppercase text-grey">Les Recettes</p>
            <ul class="">
                <li class="my-2"><a class="hover:bg-beige hover:text-brown text-beige flex flex-no-wrap items-center rounded h-10 px-3" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15.7 13.3l-3.81-3.83A5.93 5.93 0 0 0 13 6c0-3.31-2.69-6-6-6S1 2.69 1 6s2.69 6 6 6c1.3 0 2.48-.41 3.47-1.11l3.83 3.81c.19.2.45.3.7.3.25 0 .52-.09.7-.3a.996.996 0 0 0 0-1.41v.01zM7 10.7c-2.59 0-4.7-2.11-4.7-4.7 0-2.59 2.11-4.7 4.7-4.7 2.59 0 4.7 2.11 4.7 4.7 0 2.59-2.11 4.7-4.7 4.7z"/></svg>
                        <span class="pl-3">Rechercher</span>
                    </a>
                </li>
                <li class="my-2"><a class="hover:bg-beige hover:text-brown text-beige flex flex-no-wrap items-center rounded h-10 px-3" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 576 512"><path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"/></svg>
                        <span class="pl-3">Favoris</span>
                    </a>
                </li>
            </ul>
            <p class="label text-xs tracking-widest uppercase text-grey pt-3">Mes Recettes</p>
            <ul class="">
                <li class="my-2">
                    <nuxt-link to="/new">
                        <a class="hover:bg-beige hover:text-brown text-beige flex flex-no-wrap items-center rounded h-10 px-3" href="#">
                            <svg width="16" height="16" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M 26.052,15.998c-0.086,0-0.17,0-0.252,0.002C 25.932,15.342, 26,14.67, 26,14c0-5.514-4.486-10-10-10 C 10.49,4, 6,8.442, 5.994,13.898c0,0.002, 0.016,0.202, 0.016,0.202l0,0 C 2.584,14.59,0,17.556,0,21c0,3.492, 2.516,6.496, 6,7l 5,0 C 11.552,28, 12,27.552, 12,27S 11.552,26, 11,26l-4.854,0.010C 3.822,25.668, 2,23.466, 2,21c0-2.456, 1.844-4.57, 4.292-4.92l 0.86-0.124 c 0.492-0.070, 0.858-0.492, 0.858-0.99L 7.994,13.902C 8,9.544, 11.59,6, 16,6c 4.412,0, 8,3.588, 8,8c0,0.542-0.054,1.088-0.164,1.618 l-0.264,1.272c-0.066,0.318, 0.028,0.646, 0.248,0.884c 0.22,0.236, 0.536,0.358, 0.864,0.308c 0.022-0.002, 0.648-0.084, 1.368-0.084 C 28.23,17.998, 30,19.792, 30,22c0,2.206-1.794,4-4,4L 19,26 c-2.8,0-2.99-1.678-3-2L 16,17.364 l 2.366,2.364 c 0.39,0.39, 1.024,0.39, 1.414,0c 0.39-0.39, 0.39-1.024,0-1.414L 15.756,14.292C 15.56,14.096, 15.302,14, 15.044,14 C 15.028,14, 15.016,13.992, 15,13.992c-0.288,0-0.542,0.124-0.724,0.318L 10.248,18.334c-0.39,0.39-0.39,1.024,0,1.414 c 0.39,0.39, 1.024,0.39, 1.414,0L 14,17.412L 14,24 c0,1.382, 1.044,4, 5,4L 26,28 c 3.308,0, 6-2.692, 6-6S 29.332,15.998, 26.052,15.998z"></path></g></svg>
                            <span class="pl-3">Poster</span>
                        </a>
                    </nuxt-link>
                </li>
                <li class="my-2"><a class="hover:bg-beige hover:text-brown text-beige flex flex-no-wrap items-center rounded h-10 px-3" href="#">
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 576 512"><path d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9 216.2 301.8l-7.3 65.3 65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1 30.9-30.9c4-4.2 4-10.8-.1-14.9z"/></svg>
                        <span class="pl-3">Modifier</span>
                    </a>
                </li>
            </ul>
          </div>
            <div class="w-auto my-4">
                <button 
                class="hover:border-brown hover:text-brown hover:bg-beige text-white py-1 px-4 border border-green rounded shadow">
                    Login
                </button>
            </div>
        </smallsidebar>
    </div>
    <div class="flex-1" @mouseover="clauseSidebarPanel">
        <nuxt />
    </div>
  </div>
</template>
<script>
import smallsidebar from '@/components/navigation/Smallsidebar'

export default {
  components: {
    smallsidebar
  },
  data: () => ({
      isPanelOpen: false
  }),
  methods: {
      openSidebarPanel() {
          this.isPanelOpen = true
      },
      clauseSidebarPanel() {
          if(this.isPanelOpen){this.isPanelOpen = false}
      }
  }
}
</script>

<style scoped>
svg {
    fill: rgb(219, 219, 219);
}
.brand {
    line-height: 1.125;
    word-break: break-word;
    color: rgb(0, 209, 178);
}
.label {
    font-family: 'Avenir-Light', sans-serif;
}

a:hover>svg {
    fill: rgb(85, 85, 85);
}
</style>
