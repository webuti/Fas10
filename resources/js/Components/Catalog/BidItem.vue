<template>
    <inertia-link :href="route('bidDetail',item.id)" aria-label="View item" title="İlanı İncele"
                  class="  p-px overflow-hidden transition duration-300 full-w transform border rounded shadow-sm    hover:border-green-400 hover:shadow-xl">

        <div class="flex flex-row items-center justify-between p-5 bg-white dark:bg-gray-600 rounded-sm">

            <div class="pr-4 flex-4 flex flex-col">
                <div class="flex flex-row" v-if="item.images">

                    <img v-for="img in item.images" :key="img.id" :src="img.image"
                         class="object-cover w-10 h-10 rounded-full"/>

                </div>
                <h6 class="font-sans text-xl font-extrabold leading-none tracking-tight lg:text-4xl xl:text-3xl">
                    {{item.title}}
                </h6>
                <p class="text-sm text-gray-900 dark:text-white pb-2">
                    {{item.description}}

                </p>
                <div class="flex flex-1 items-center  flex-row space-x-1">

                    <span v-if="item.city"
                          class="bg-green-400 text-sm  rounded-lg px-2 text-white">{{item.city.name}}</span>
                    <span v-if="item.country" class="bg-green-400 text-sm  rounded-lg px-2 text-white">{{item.country.name}}</span>
                </div>

            </div>

            <div class="flex  items-center justify-center">
                <svg
                    class="w-3 text-gray-700 dark:text-white transition-colors duration-300 group-hover:text-green-400"
                    fill="currentColor" viewBox="0 0 12 12">
                    <path
                        d="M9.707,5.293l-5-5A1,1,0,0,0,3.293,1.707L7.586,6,3.293,10.293a1,1,0,1,0,1.414,1.414l5-5A1,1,0,0,0,9.707,5.293Z"></path>
                </svg>
            </div>
        </div>
    </inertia-link>
</template>

<script>
    export default {
        name: "BidItem",
        props: {
            item: Object,
        }
    }
</script>

