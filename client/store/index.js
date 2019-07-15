export const state = () => ({
    onLoad: null
})

export const mutations = {
    loadAllRecipes (state, data) {
        state.onLoad = data
    }
}
