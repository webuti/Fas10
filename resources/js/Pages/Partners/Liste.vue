<template>
    <div>

        <app-layout title="İş Ortaklarım">
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    İş Ortaklarım
                </h2>
            </template>

            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                <ul class="container   flex items-baseline justify-start border-b-2 border-gray-300 mb-10">
                    <li :class="{'border-b-2 text-gray-900 border-black -mb-4' :type == 'approved'} "
                        @click="type = 'approved'"
                        class="text-base font-bold  cursor-pointer tracking-wide uppercase py-4 px-6 ">Onaylı
                        ({{approved.data.length}})
                    </li>
                    <li class="text-base font-bold  cursor-pointer racking-wide uppercase py-4 px-6 "
                        @click="type = 'received'"
                        :class="{'border-b-2 text-gray-900  border-black -mb-4' :type == 'received'} ">
                        Gelen Talepler ({{received.data.length}})
                    </li>
                    <li
                        :class="{'border-b-2 text-gray-900  border-black -mb-4' :type == 'sent'} "
                        @click="type = 'sent'"
                        class="text-base cursor-pointer font-bold tracking-wide uppercase py-4 px-6 ">
                        Talep
                        Gönderdiklerim ({{sent.data.length}})
                    </li>
                </ul>

                <div v-if="type == 'approved'">
                    <div v-for="item in approved.data">
                        <partner-list-item :team="item.team"></partner-list-item>
                    </div>
                    
                </div>
                <div v-if="type == 'received'">


                    <div v-for="item in received.data">
                        <partner-list-item :team="item.team"></partner-list-item>
                    </div>

                </div>
                <div v-if="type == 'sent'">
                    <div v-for="item in sent.data">
                        <partner-list-item :team="item.team"></partner-list-item>
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
