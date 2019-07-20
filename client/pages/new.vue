<template>
    <div class="flex flex-no-wrap">
        <div class="form w-2/5 h-screen p-2">
            <buttons/>
            <recipe-form></recipe-form>
        </div>
        <div class="w-3/5 bg-grey flex-1 px-6 h-screen">
            <render
                :is-likable="false"
                :recipe="recipe"
            />
        </div>
    </div>
</template>

<script>
import Buttons from '@/components/newRecipe/Buttons'
import RecipeForm from '@/components/newRecipe/Form'
import Render from '@/components/Render'


export default {
    //middleware: 'auth',
    components: {
        Buttons,
        Render,
        RecipeForm
    },
    computed: {
        recipe () {
            return this.$store.state.recipe.new
        }
    },
}
</script>

<style scoped>
.form {
    overflow: scroll;
}
</style>
