export default {
    updateTitle (state, { value }) {
        state.recipe.new.title = value
    },
    add (state, { recipe }) {
        state.recipes.push({
        recipe
        })
    },

    toggle (state, recipe) {
        recipes = recipe
    }
}
