<template>
    <div>

        <app-layout title="İş Ortaklarım">
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
                    İş Ortaklarım
                </h2>
            </template>

            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                <ul class="    flex items-baseline justify-start border-b-2 border-gray-300 mb-10">
                    <li :class="{'border-b-2 font-bold  text-gray-900 dark:text-white border-black -mb-4' :type == 'approved'} "
                        @click="type = 'approved'"
                        class="text-base   cursor-pointer   uppercase py-4 px-6 xs:p-3 xs:text-xs  sm:text-sm ">Onaylı
                        ({{approved.data.length}})
                    </li>
                    <li class="text-base  cursor-pointer   uppercase py-4 px-6 xs:p-3 xs:text-xs sm:text-sm "
                        @click="type = 'received'"
                        :class="{'border-b-2 font-bold  text-gray-900 dark:text-white  border-black -mb-4' :type == 'received'} ">
                        Gelen Talepler ({{received.data.length}})
                    </li>
                    <li
                        :class="{'border-b-2 font-bold  text-gray-900 dark:text-white  border-black -mb-4' :type == 'sent'} "
                        @click="type = 'sent'"
                        class="text-base  cursor-pointer    uppercase py-4 px-6 xs:p-3 xs:text-xs sm:text-sm">
                        Talep
                        Gönderdiklerim ({{sent.data.length}})
                    </li>
                </ul>

                <div v-if="type == 'approved'">
                    <div v-for="item in approved.data">
                        <partner-list-item :id="item.id" :team="item.team"></partner-list-item>
                    </div>

                </div>
                <div v-if="type == 'received'">


                    <div v-for="item in received.data">
                        <partner-list-item :approve="true" :id="item.id" :team="item.team"></partner-list-item>
                    </div>

                </div>
                <div v-if="type == 'sent'">
                    <div v-for="item in sent.data">
                        <partner-list-item :id="item.id" :team="item.team"></partner-list-item>
                    </div>

                </div>

            </div>

        </app-layout>
    </div>
</template>

<script>
    import AppLayout from "@/Layouts/AppLayout";
    import PartnerListItem from "@/Pages/Partners/PartnerListItem";

    export default {
        name: "List",
        components: {PartnerListItem, AppLayout},
        data() {
            return {
                type: "received",
            }
        },
        props: ['sent', 'received', 'approved']
    }
</script>

<style scoped>

</style>
