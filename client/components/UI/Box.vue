<template>
    <div>
        <div class="box my-3">
            <div class="flex flex-row flex-no-wrap items-center">
                <div id="recipe-title" class="font-bold">{{ recipe.title }}</div>
                <div id="recipe-author" class="pl-3 text-xs">@{{ recipe.owner.username }}</div>
                <div id="recipe-time" class="text-right flex-1 text-xs">{{ recipe.totalTime }} min</div>
            </div>
            <div id="recipe-ingredients" class="pt-2 text-xs flex flex-wrap">
                <span v-for="(ingredient, index) in recipe.ingredients" :key="index" class="pl-1">
                    {{ ingredient }}.
                </span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'box',
    props: {
        recipe: {
            type:Object,
            required:true
        }
    }
}
</script>

<style scoped>
.box {
    background-color: white;
    box-shadow: rgba(10, 10, 10, 0.1) 0px 2px 3px, rgba(10, 10, 10, 0.1) 0px 0px 0px 1px;
    color: rgb(74, 74, 74);
    display: block;
    border-radius: 6px;
    padding: 1.25rem;
}
</style>
