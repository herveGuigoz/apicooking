export const state = () => ({
    recipes: null
})

export const mutations = {
    LOAD (state, data) {
        state.recipes = data
    }
}

export const actions = {
    async nuxtServerInit({ commit }) {
        const res = await this.$axios.$get('http://localhost:8080/recipes');
        const data = res['hydra:member']
        commit('LOAD', data )
    }
}

export const getters = {
    getRecipes: (state) => {
        return state.recipes
    },
    getFirstRecipe: (state) => {
        return state.recipes[0]
    }
}
