<template>
    <div>
        <div class="overflow-hidden shadow-lg rounded-lg h-90 w-60 md:w-80 cursor-pointer m-auto">
            <inertia-link :href="route('companyDetail',id)" class="w-full block h-full">
                <img alt="blog photo"
                     src="https://images.pexels.com/photos/2408666/pexels-photo-2408666.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;w=500"
                     class="max-h-40 w-full object-cover"/>
                <div class="bg-white dark:bg-gray-800 w-full p-4">

                    <p class="text-gray-800 dark:text-white text-xl font-medium mb-2">
                        {{name}}
                    </p>
                    <p class="text-gray-400 dark:text-gray-300 font-light text-md">
                        {{description}}
                    </p>
                    <div class="flex  space-x-10 flex-row">
                        <div class="mt-2 flex  space-x-2  flex-row items-center text-sm text-gray-500">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>{{city}}</div>
                        </div>
                        <div class="mt-2  space-x-2 flex flex-row items-center text-sm text-gray-500">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </div>
                            <div>{{person}} Personel</div>
                        </div>
                    </div>
                    <div class="flex flex-wrap justify-starts items-center mt-4">
                        <Badge v-for="cat in categories">{{cat.service_id}}</Badge>
                    </div>
                </div>
            </inertia-link>
        </div>

    </div>
</template>

<script>
    import Badge from "@/Components/UI/Badge";

    export default {
        name: "CompanyItem",
        components: {Badge},
        props: ['name', 'person', 'city', 'categories', 'id', 'seo_url', 'description']

    }
</script>

<style scoped>
    .icon-small {
        height: 10px;
        width: 10px;
    }
</style>
