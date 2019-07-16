export const state = () => ({
    recipes: null
})

export const mutations = {
    loadAllRecipes (state, data) {
        state.recipes = data
    }
}
