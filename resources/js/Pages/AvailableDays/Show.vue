<template>

    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex flex-row justify-between">
                <span> {{team.name}}, müsait olan tarihleri</span>


                <span> <inertia-link :href="route('availableday.create')"
                                     class="button p-2 px-3   rounded-full bg-green-500 text-sm text-white"
                                     v-if="$page.props.user.current_team.id == team.id">Ekle
                </inertia-link></span>


            </h2>
        </template>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">


            <div v-if="dates.data.length" class="days">

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
            <div v-else>


                <div class="bg-white rounded-lg p-3 border border-gray-300 items-center flex text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                              d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    Yakın tarihlerde müsaitliği yok
                </div>
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
