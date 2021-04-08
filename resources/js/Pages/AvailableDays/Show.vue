<template>

    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Müsaitlik olan tarihleri
            </h2>
        </template>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            <div>{{team.name}}</div>

            <div class="days">

                <ul class="space-y-1 mt-1">
                    <li class="bg-white border border-gray-300 shadow flex p-3  rounded-md justify-between"
                        v-for="item in dates.data">
                        <div class="justify-between items-center  space-x-1 flex">       <span
                            class="border border-green-400  bg-green-200 text-green-600 px-2 font-bold   flex rounded-full text-sm items-center  ">
                            Müsait</span>
                            <h2 class="text-sm">{{item.date}}</h2>
                        </div>
                    </li>
                </ul>
            </div>
            
        </div>
    </app-layout>

</template>

<script>
    import AppLayout from "@/Layouts/AppLayout";

    export default {
        name: "Show",
        components: {AppLayout},
        props: ['team', 'dates']
    }
</script>

<style scoped>

</style>
