<template>


    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                İş Ortaklarım
            </h2>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex  text-gray-700">


                <div class="flex flex-col flex-shrink-0 w-64 bg-white  border-r ">


                    <div class="ortaklar">
                        <h2 class="text-green-400 px-3">İş Ortaklarım</h2>
                        <div v-for="test in [2,3,4,5,6,7]" class="ortak border-b hover:bg-gray-300 text-sm border-gray-300 p-2  ">
                            <h2>Parlar Tekstil A.Ş.</h2>
                            <div class="status">1</div>
                            <div class="available"><span class="w-2 h-2 rounded-full bg-blue-500"></span></div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col flex-shrink-0 w-64  ">
                    <h2 class="text-green-400 px-3">Projeleri</h2>
                </div>
                <div class="flex flex-col flex-shrink-0 w-64  ">
                    <h2 class="text-green-400 px-3">Proje aşamaları</h2>
                </div>
            </div>
        </div>

    </app-layout>

</template>

<script>

    import AppLayout from "@/Layouts/AppLayout";


    export default {
        name: "Index",
        components: {
            AppLayout
        }
    }
</script>

<style scoped>

</style>
