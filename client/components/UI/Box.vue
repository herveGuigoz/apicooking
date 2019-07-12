<template>
    <div class="box">
        <div class="flex flex-row flex-no-wrap items-center">
            <div id="recipe-title" class="font-bold">Gratin d'auphinois</div>
            <div id="recipe-author" class="pl-3 text-xs">@herveGuigoz</div>
            <div id="recipe-time" class="text-right flex-1 text-xs">45 min</div>
        </div>
        <div id="recipe-ingredients" class="pt-2 text-xs">Poivron rouge, Poivron jaune, Coco, Gingembre, Ail</div>
    </div>
</template>

<script>
export default {
    name: 'box'
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
.box:not(:last-child) {
    margin-bottom: 0.5rem;
}
</style>
