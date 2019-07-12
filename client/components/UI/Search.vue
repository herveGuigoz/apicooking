<template>
    <div class="w-full">
        <input class="focus:outline-none focus:border-grey text-grey" type="search" id="search" placeholder="Rechercher">
    </div>
</template>

<script>
export default {
    name: 'search'
}
</script>

<style scoped>
input {
    background-color: white;
    color: rgb(54, 54, 54);
    box-shadow: rgba(10, 10, 10, 0.1) 0px 1px 2px inset;
    max-width: 100%;
    width: 100%;
    border-color: rgb(0, 209, 178);
    -webkit-appearance: none;
    align-items: center;
    display: inline-flex;
    font-size: 1rem;
    height: 2.25em;
    justify-content: flex-start;
    line-height: 1.5;
    padding-bottom: calc(0.375em - 1px);
    padding-left: calc(0.625em - 1px);
    padding-right: calc(0.625em - 1px);
    padding-top: calc(0.375em - 1px);
    margin-bottom: 0.5rem;
    position: relative;
    vertical-align: top;
    border-width: 1px;
    border-style: solid;
    border-image: initial;
    border-radius: 4px;
}
</style>
