<template>
    <div class="box my-3">
        <div class="w-full px-3 mb-3">
            <label class="block uppercase tracking-wide text-xs font-bold text-brown mb-2" for="title">
                Titre
            </label>
            <input 
            :value="recipe.title"
            @input="title"
            class="appearance-none block w-full bg-grey text-brown rounded py-2 px-4 mb-3 leading-tight focus:outline-none" id="title" type="text" placeholder="...">
        </div>

        <div class="flex flex-col">
            <p class="block uppercase tracking-wide text-xs font-bold text-brown mb-2 w-full px-3">
            Duree
            </p>
            <div class="flex flex-no-wrap">
                <div class="w-full flex flex-no-wrap px-3 mb-3">
                    <input 
                    :value="recipe.prepTime"
                    @input="prepTime"
                    class="appearance-none block w-full text-xs bg-grey text-brown rounded-l-sm py-1 px-4 mb-3 leading-tight focus:outline-none" type="number" placeholder="prep">
                    <p class="px-3 text-xs border border-grey py-1 mb-3 rounded-r-sm">minutes</p>
                </div>
                <div class="w-full flex flex-no-wrap px-3 mb-3">
                    <input 
                    :value="recipe.cookTime"
                    @input="cookTime"
                    class="appearance-none block w-full text-xs bg-grey text-brown rounded-l-sm py-1 px-4 mb-3 leading-tight focus:outline-none" type="number" placeholder="cuisson">
                    <p class="px-3 text-xs border border-grey py-1 mb-3 rounded-r-sm">minutes</p>
                </div>
            </div>
        </div>

        <div class="w-full flex flex-col px-3 mb-3">
            <div class="flex flex-no-wrap items-center">
                <p class="block uppercase tracking-wide text-xs font-bold text-brown mb-2">
                    Ingredients
                </p>
                <button 
                @click="addIngredient"
                class="ml-3 px-3 text-xs border border-teal-100 text-teal-100 py-1 mb-3 rounded">Add</button>
            </div>
            <div class="flex flex-no-wrap" v-for="(ingredient, index) in recipe.ingredients" :key="index">
                <div class="w-4/5">
                    <input 
                        :value="recipe.ingredients[index]"
                        @input="mapIngredient"
                        :data-index="index"
                        class="appearance-none block w-full bg-grey text-brown rounded py-2 px-4 mb-3 leading-tight focus:outline-none" type="text" placeholder="...">
                </div>
                <div class="flex-1 text-center pl-3">
                    <button 
                    @click="removeIngredient(index)"
                    class="text-xs text-teal-100 py-1 px-4 mb-3 border border-teal-100 rounded">X</button>
                </div>
            </div>
        </div>

        <div class="w-full flex flex-col px-3 mb-3">
            <div class="flex flex-no-wrap items-center">
                <p class="block uppercase tracking-wide text-xs font-bold text-brown mb-2">
                    Steps
                </p>
                <button 
                @click="addStep"
                class="ml-3 px-3 text-xs border border-teal-100 text-teal-100 py-1 mb-3 rounded">Add</button>
            </div>
            <div class="flex flex-no-wrap" v-for="(step, index) in recipe.steps" :key="index">
                <div class="flex-1">
                    <textarea 
                        :value="recipe.steps[index]"
                        @input="mapSteps"
                        class="appearance-none block w-full bg-grey text-brown rounded py-2 px-4 mb-3 leading-tight focus:outline-none" 
                        :placeholder="index"
                        :data-index="index"
                        rows="5">
                    </textarea>
                </div>
                <div 
                class="w-1/6 pl-1">
                    <button 
                        v-if="index == `Etape ${Object.keys(recipe.steps).length}`"
                        @click="removeStep(index)"
                        class="text-xs text-teal-100 py-1 px-4 mb-3 border border-teal-100 rounded">
                        X
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapMutations } from 'vuex'

export default {
    name:'RecipeForm',
    data() {
        return {
            counter: 0
        }
    },
    computed: {
        recipe () {
            return this.$store.state.recipe.new
        }
    },
    methods: {
        title (e) {
            this.$store.commit('recipe/updateTitle', e.target.value)
        },
        prepTime (e) {
            this.$store.commit('recipe/updatePrepTime', Number(e.target.value))
        },
        cookTime (e) {
            this.$store.commit('recipe/updateCookTime', Number(e.target.value))
        },
        addIngredient() {
            const key = this.counter
            this.counter += 1
            this.$store.commit('recipe/addIngredient', key)
        },
        mapIngredient(e){
            const index= e.target.dataset.index
            const value = e.target.value
            this.$store.commit('recipe/mapIngredient', { value, index })
        },
        removeIngredient(index) {
            this.$store.commit('recipe/removeIngredient', index )
        },
        addStep() {
            const key = `Etape ${Object.keys(this.$store.state.recipe.new.steps).length + 1 }`
            this.$store.commit('recipe/addStep', key)
        },
        mapSteps(e){
            const index= e.target.dataset.index
            const value = e.target.value
            this.$store.commit('recipe/mapStep', { value, index })
        },
        removeStep(index) {
            this.$store.commit('recipe/removeStep', index )
        }
    }
}
</script>

