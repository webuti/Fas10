<template>


    <MainLayout>
        <div class="flex flex-row">
            <Sidebar/>

            <div class="content  w-full">

                <div class="flex flex-wrap justify-between items-center bg-white border-b p-2 space-y-2 md:space-y-0">


                    <div
                        class="flex flex-wrap justify-start md:justify-end items-center space-x-0 space-y-2 sm:space-x-2 sm:space-y-0">
                        <div class="divide-x-2 border border-gray-300 shadow-sm rounded-md">
                            <button class="p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" class="h-4 w-4 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>
                                </svg>
                            </button>

                            <button class="p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" class="h-4 w-4 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                                </svg>
                            </button>

                            <button class="p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" class="h-4 w-4 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"/>
                                </svg>
                            </button>
                        </div>

                        <div class="relative">
                            <input type="text" placeholder="Search by"
                                   class="appearance-none relative block w-full px-8 py-2 border border-gray-300 placeholder-gray-500 text-gray-800 shadow-sm rounded-md focus:outline-none focus:ring-gray-500 focus:border-gray-500 focus:z-10 text-xs"/>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" class="absolute left-3 bottom-2 h-4 w-4 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>

                        <button
                            class="flex items-center space-x-1 text-xs text-gray-500 font-semibold border border-gray-300 shadow-sm rounded-md p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" class="h-4 w-4 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                            </svg>
                            <span>Filter</span>
                        </button>
                    </div>
                </div>
                <!-- End Tools -->

                <div class="grid grid-cols-1 mt-5  md:grid-cols-1 sm:grid-cols-1 gap-4">

                    <BidItem :item="bid" v-for="bid in bids"/>

                </div>

            </div>
        </div>
    </MainLayout>
</template>


<script>
    import Header from "../../Components/Header.vue";
    import BidItem from "../../Components/Catalog/BidItem";
    import Sidebar from "@/Components/Catalog/Sidebar";
    import MainLayout from "@/Layouts/MainLayout";

    export default {
        components: {
            MainLayout,
            Sidebar,
            BidItem,
            Header
        },

        props: {
            bids: Array,
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        }
    }
</script>
