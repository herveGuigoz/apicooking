<template>
    <div class="flex flex-no-wrap">
        <div class="w-2/5 h-screen p-2">
            <buttons/>
            <div class="box my-3">
                <div class="w-full px-3 mb-3">
                    <label class="block uppercase tracking-wide text-xs font-bold text-brown mb-2" for="title">
                        Titre
                    </label>
                    <input class="appearance-none block w-full bg-grey text-brown rounded py-2 px-4 mb-3 leading-tight focus:outline-none" id="title" type="text" placeholder="...">
                    <p class="text-red text-xs italic">Please fill out this field.</p>
                </div>

                <div class="flex flex-col">
                    <p class="block uppercase tracking-wide text-xs font-bold text-brown mb-2 w-full px-3">
                    Duree
                    </p>
                    <div class="flex flex-no-wrap">
                        <div class="w-full flex flex-no-wrap px-3 mb-3">
                            <input class="appearance-none block w-full text-xs bg-grey text-brown rounded-l-sm py-1 px-4 mb-3 leading-tight focus:outline-none" type="number" placeholder="prep">
                            <p class="px-3 text-xs border border-grey py-1 mb-3 rounded-r-sm">minutes</p>
                        </div>
                        <div class="w-full flex flex-no-wrap px-3 mb-3">
                            <input class="appearance-none block w-full text-xs bg-grey text-brown rounded-l-sm py-1 px-4 mb-3 leading-tight focus:outline-none" type="number" placeholder="cuisson">
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
                        class="ml-3 px-3 text-xs border border-green text-green py-1 mb-3 rounded">+</button>
                    </div>
                    <div class="flex flex-no-wrap" v-for="(ingredient, index) in ingredients" :key="index">
                        <div class="w-4/5">
                            <input v-model="ingredient.name"
                                class="appearance-none block w-full bg-grey text-brown rounded py-2 px-4 mb-3 leading-tight focus:outline-none" type="text" placeholder="...">
                        </div>
                        <div class="flex-1 text-center">
                            <button 
                            @click="removeIngredient(index)"
                            class="btn text-green py-1 px-4 mb-3 border border-green rounded">-</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-3/5 bg-grey flex-1 px-6 h-screen">
            <render/>
        </div>
    </div>
</template>

<script>
import Buttons from '@/components/newRecipe/Buttons'
import Render from '@/components/Render'

export default {
    components: {
        Buttons,
        Render
    },
    data() {
        return {
            ingredients: [{
                id: 0,
                name: ""
            }],
        }
    },
    methods: {
        addIngredient: function() {
            this.ingredients.push({name:""});
        },
        removeIngredient: function(index) {
            this.ingredients.splice(index, 1);
        }
    }
}
</script>

<style>

</style>
