export const state = () => ({
    recipes: null
})

export const mutations = {
    load (state, data) {
        state.recipes = data
    }
}

