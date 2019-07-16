import Vue from 'vue'

export const state = () => ({
    new: {
        "title": '',
        "prepTime": null,
        "cookTime": null,
        "owner": '',
        "ingredients": {},
        "steps": {}
    }
})

export const mutations = {
    updateTitle (state, value ) {
        state.new.title = value
    },
    updatePrepTime (state, value ) {
        state.new.prepTime = value
    },
    updateCookTime (state, value ) {
        state.new.cookTime = value
    },
    addIngredient (state, key) {
        Vue.set(state.new.ingredients, key, '')
    },
    mapIngredient (state, { value, index }) {
        state.new.ingredients[index] = value
    },
    removeIngredient (state, index) {
        Vue.delete(state.new.ingredients, index)
    },
    addStep (state, key) {
        Vue.set(state.new.steps, key, '')
    },
    removeStep (state, key) {
        Vue.delete(state.new.steps, key)
    },
    mapStep (state, { value, index }) {
        state.new.steps[index] = value
    }
}
