<template>
    <div id="col-right" class="bg-grey text-brown">
        <div class="flex flex-row flex-wrap justify-between w-full">
            <div id="title">
                <h1 class="font-bold text-2xl text-brown">Gratin dauphinois</h1>
            </div>
            <div id="like" class="disLike">
                <svg role="img" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" aria-labelledby="favouriteIconTitle">
                    <title id="favouriteIconTitle">Favourite</title>
                    <path d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z"></path>
                </svg>
            </div>
        </div>
        <div class="flex sm:flex-col sm:items-center md:flex-row md:items-start flex-wap w-full py-8 px-3">
            <div id="ingredients" class="md:w-1/2 flex flex-col">
                <h2 class="text-xs font-bold text-brown">Ingredients</h2>
                <ul class="list-disc ml-4 pt-3">
                    <li class="text-brown">1 poivron rouge</li>
                    <li class="text-brown">2 poivrons jaunes</li>
                    <li class="text-brown">400 ml de coco</li>
                    <li class="text-brown">gimgembre</li>
                    <li class="text-brown">Ail</li>
                </ul>
            </div>
            <div id="timing" class="w-full md:w-1/2 flex flex-col mt-6 md:mt-0">
                <span class="text-xs font-bold text-brown">Durée</span>
                <ul class="list-disc ml-4 pt-3 text-brown">
                    <li><span>préparation : </span><span id="">15 min</span></li>
                    <li><span>cuisson : </span><span id="">35 min</span></li>
                </ul>
            </div>
        </div>
        <div id="steps">
            <p class="steps-title font-bold text-brown">Etape 1</p>
            <p class="text-brown">Curabitur fringilla vehicula pharetra. Proin ligula ante, congue ut porta nec, finibus varius tellus. Integer dictum consequat urna. Maecenas ornare, sapien sed luctus tristique, massa ligula mollis risus, a semper risus nulla non elit. Etiam sit amet tortor iaculis, scelerisque arcu non, blandit metus. Donec egestas sollicitudin susci</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "render"
}
</script>

<style scoped>
#col-right {
    opacity: 0.75;
    padding-top: 0.5rem;
}
.disLike svg{fill: #dbdbdb;}
.isLike svg{fill: #00d1b2;}
</style>
