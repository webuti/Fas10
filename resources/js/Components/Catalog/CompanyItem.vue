<template>
    <div>
        <inertia-link :href="route('companyDetail',company.id)">

            <div
                class="bg-white duration-200  min-h-full  border-r border-b border-gray-200 transition-all ease-in-out hover:bg-gray-50    dark:bg-gray-600 dark:bg-gray-800  dark:bg-gray-600 w-full py-5 px-2 ">


                <div class="flex">
                    <div class="w-14">
                        <img class="h-10 w-10 rounded-full object-cover"
                             :src="'https://ui-avatars.com/api/?name='+company.name+'&color=7F9CF5&background=EBF4FF'"
                             :alt="company.name">

                    </div>
                    <div>

                        <div class="flex flex-col  ">
                            <div class="text-gray-800 dark:text-white dark:text-white text-xl font-bold  ">

                                <template v-if="company.name">
                                    {{company.name}}
                                </template>

                            </div>
                            <div class="text-gray-500 dark:text-white dark:text-white text-xs  ">
                           Kayıt Tarihi {{company.created_at}}
                        </div>
                        </div>

                        <div class="text-gray-700 dark:text-gray-300   text-md">
                            <template v-if="company.description">{{company.description}}</template>
                        </div>
                        <div class="flex  space-x-10 flex-row">
                            <div
                                class="mt-2 flex  space-x-2  flex-row items-center text-sm text-gray-500 dark:text-gray-50">
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
                                <div>
                                    <template v-if="company.city">{{company.city.name}}</template>

                                </div>
                            </div>
                            <div
                                class="mt-2  space-x-2 flex flex-row items-center text-sm text-gray-500 dark:text-gray-50">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                </div>
                                <div>{{company.number_of_staff}} Personel</div>
                            </div>
                        </div>
                        <div class="flex flex-wrap justify-starts font-medium items-center mt-4">
                            <Badge v-for="cat in company.services">{{cat.service.name}}</Badge>
                        </div>

                    </div>
                </div>


            </div>
        </inertia-link>
    </div>
</template>

<script>
    import Badge from "@/Components/UI/Badge";

    export default {
        name: "CompanyItem",
        components: {Badge},
        props: ['company']

    }
</script>

<style scoped>
    .icon-small {
        height: 10px;
        width: 10px;
    }
</style>
