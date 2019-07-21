<template>
  <div class="flex h-screen">
    <div class="w-7/12 bg-brown">
      <div class="flex text-3xl justify-center pt-16">
        <h1 class="brand font-semibold text-center uppercase">Family cooking</h1>
      </div>
      <h2 class="text-grey text-3xl p-16" ref="anime"></h2>
    </div>
    <div class="flex-1 bg-grey p-8">
      <div class="flex flex-col h-full justify-center">
        <nuxt/>
      </div>
    </div>
  </div>
</template>

<script>
import Typed from 'typed.js';
export default {
  mounted() {
    let options = {
      strings: ["Ajoutez vos propres recettes, sauvegardez vos préférées et commentez vos coups de coeur..."],
      typeSpeed: 60,
    }
    let typed = new Typed(this.$refs.anime, options);
  }
}
</script>

<style scoped>
.brand {
  color: #00D1B2;
}
</style>
