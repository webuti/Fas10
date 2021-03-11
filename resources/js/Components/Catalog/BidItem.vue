<template>
    <inertia-link :href="route('bidDetail',item.id)" aria-label="View item" title="İlanı İncele"
                  class="  p-px overflow-hidden transition duration-300 full-w transform border rounded shadow-sm hover:scale-105   hover:border-green-400 hover:shadow-xl">
        <div
            class="absolute bottom-0 left-0 w-full h-1 duration-300 origin-left transform scale-x-0 bg-green-400 group-hover:scale-x-100"></div>
        <div
            class="absolute bottom-0 left-0 w-1 h-full duration-300 origin-bottom transform scale-y-0 bg-green-400 group-hover:scale-y-100"></div>
        <div
            class="absolute top-0 left-0 w-full h-1 duration-300 origin-right transform scale-x-0 bg-green-400 group-hover:scale-x-100"></div>
        <div
            class="absolute bottom-0 right-0 w-1 h-full duration-300 origin-top transform scale-y-0 bg-green-400 group-hover:scale-y-100"></div>
        <div class="flex flex-row items-center justify-between p-5 bg-white rounded-sm">
            <div class="pr-4 flex flex-col  ">
                <h6 class="mb-2 font-semibold leading-5">
                    {{item.title}}
                </h6>
                <p class="text-sm text-gray-900">
                    {{item.description}}

                </p>
            </div>
            <div class="flex flex-1 items-center justify-between flex-col space-y-1">
                <span class="bg-green-400 text-sm rounded-lg px-2 text-white">İstanbul</span>
                <span class="bg-green-400 text-sm  rounded-lg px-2 text-white">Küçükcekmece</span>
            </div>
            <div class="flex  items-center justify-center">
                <svg
                    class="w-3 text-gray-700 transition-colors duration-300 group-hover:text-green-400"
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
            item: Array,
        }
    }
</script>

