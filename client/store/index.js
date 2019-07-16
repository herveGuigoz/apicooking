import Vue from "vue";

// save our state (isPanel open or not) 
export const store = Vue.observable({
    isNavOpen: false
});

// We call toggleNav anywhere we need it in our app
export const mutations = {
    toggleNav() {
        store.isNavOpen = !store.isNavOpen
    }
};


// https://regenrek.com/posts/how-to-create-an-animated-vue-sidebar-menu-with-vue-observable/