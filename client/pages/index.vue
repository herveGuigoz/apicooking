<template>
  <div class="flex flex-no-wrap">
    <div class="w-2/5 h-screen p-2">
      <search/>
      <box/>
    </div>
    <div class="w-3/5 bg-grey flex-1 px-6 h-screen">
      <render/>
    </div>
  </div>
</template>

<script>
import Search from '@/components/UI/Search'
import Box from '@/components/UI/Box'
import Render from '@/components/Render'

export default {
  components: {
    Search,
    Box,
    Render
  },
  async created() {
    try {
        const response = await this.$http.$get(
          "https://localhost:8443/recipes"
        );
        this.$store.commit('loadAllRecipes', response["hydra:member"])

      } catch (err) {
        console.log(err)
      }
  }
}
</script>

<style>

</style>
