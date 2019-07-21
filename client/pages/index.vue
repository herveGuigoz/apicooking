<template>
  <div class="flex flex-no-wrap">
    <div class="w-2/5 h-screen p-2">
      <search/>
      <box v-for="(recipe, index) in recipes" :key="index" :recipe="recipe" @click.native="select(recipe)"/>
    </div>
    <div class="w-3/5 bg-grey flex-1 px-6 h-screen">
    <!--
      <render :recipe="renderedRecipe"/>
    -->
      <render v-if="renderedRecipe" :recipe="renderedRecipe"/>
      <render v-else :recipe="firstRecipe"/>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import Search from '@/components/UI/Search'
import Box from '@/components/UI/Box'
import Render from '@/components/Render'

export default {
  components: {
    Search,
    Box,
    Render
  },
  computed: {
    ...mapGetters({
      recipes: 'getRecipes',
      firstRecipe: 'getFirstRecipe'
    })
  },
  data: () => ({
    renderedRecipe: null
  }),
  methods: {
    select(recipe) {
      this.renderedRecipe = recipe
    }
  }
}
</script>

<style>
render {
  cursor: pointer
}
</style>
