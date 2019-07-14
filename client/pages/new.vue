<template>
    <div class="flex flex-no-wrap">
        <div class="w-2/5 h-screen p-2">
            <buttons/>
            <div class="box my-3">
                <div class="w-full px-3 mb-3">
                    <label class="block uppercase tracking-wide text-xs font-bold text-brown mb-2" for="title">
                        Titre
                    </label>
                    <input class="appearance-none block w-full bg-grey text-brown rounded py-3 px-4 mb-3 leading-tight focus:outline-none" id="title" type="text" placeholder="...">
                    <p class="text-red text-xs italic">Please fill out this field.</p>
                </div>
                <div class="w-full flex flex-col px-3 mb-3">
                    <p class="block uppercase tracking-wide text-xs font-bold text-brown mb-2 w-full">
                    Ingredients
                    </p>
                    <div class="flex flex-no-wrap">
                        <div class="w-4/5">
                            <input class="appearance-none block w-full bg-grey text-brown rounded py-3 px-4 mb-3 leading-tight focus:outline-none" type="text" placeholder="...">
                        </div>
                        <div class="flex-1 text-center">
                            <button class="btn text-beige text-xl py-1 px-4 border border-beige rounded">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-3/5 bg-grey flex-1 px-6 h-screen">
            <render/>
        </div>
    </div>
</template>

<script>
import Buttons from '@/components/newRecipe/Buttons'
import Render from '@/components/Render'

export default {
  components: {
    Buttons,
    Render
  }
}
</script>

<style>

</style>
