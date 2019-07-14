<template>
    <div class="box">
        <div class="flex flex-row flex-no-wrap items-center justify-around">
            <button class="btn-green hover:bg-green text-green py-1 px-4 border border-green rounded shadow">Enregistrer</button>
            <button class="btn text-blue-700 py-1 px-4 border border-gray-500 rounded shadow">Annuler</button>
        </div>
    </div>
</template>

<script>
export default {
    name: 'buttons',
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
.btn {
    border-color: rgb(219, 219, 219);
}
.btn-green:hover {
    color: #fff;
}
</style>
