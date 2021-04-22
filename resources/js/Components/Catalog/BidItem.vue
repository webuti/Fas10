<template>
    <inertia-link :href="route('bidDetail',item.id)" aria-label="View item" title="İlanı İncele">


        <div
            class="bg-white duration-200  min-h-full  border-r border-b border-gray-200 transition-all ease-in-out hover:bg-gray-50    dark:bg-gray-600 dark:bg-gray-800  dark:bg-gray-600  py-5 px-2 ">


            <div class="flex">
                <div class="w-14" v-if="item.title">

                    <img v-if="item.images.length" class="h-10 w-10 rounded-full    object-cover"

                         :class="{ '-mt-5': index>0}"
                         v-for="(img,index) in item.images"
                         :src="img.image"/>

                    <img class="h-10 w-10 rounded-full object-cover" v-else
                         :src="'https://ui-avatars.com/api/?name='+item.title+'&color=7F9CF5&background=EBF4FF'"
                         :alt="item.title"/>


                </div>
                <div class="flex-1 flex justify-between">
                    <div class="flex flex-1 flex-col">
                        <div
                            class="text-gray-800 dark:text-white dark:text-white md:text-xl xs:text-md sm:text-md font-bold  ">

                            <template v-if="item.title">
                                {{item.title}}
                            </template>

                        </div>

                        <div class="text-gray-700 dark:text-gray-300   text-md">
                            <template v-if="item.description">{{item.description}}</template>
                        </div>

                    </div>

                    <div class="flex flex-col  space-y-3 items-end w-30 ">


                        <div v-if="item.city && item.country"
                             class=" text-sm  rounded-lg   flex  items-end   ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path fillRule="evenodd"
                                      d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                      clipRule="evenodd"/>
                            </svg>
                            {{item.country.name}}, {{item.city.name}}
                        </div>
                        <div class="text-gray-500 dark:text-white dark:text-white text-xs  ">
                            {{item.created_at}}
                        </div>
                    </div>


                </div>
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

