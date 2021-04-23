<template>
    <app-layout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2
                    class="font-semibold text-xl text-gray-800 dark:text-white leading-tight"
                >
                    İlan Bilgileri : {{ bid.title }}
                </h2>
                <inertia-link class="button p-2 px-3   rounded-lg bg-blue-600 dark:bg-gray-700 text-sm text-white" :href="route('bids.edit',bid.id)">Düzenle</inertia-link>
            </div>
        </template>


        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                <div
                    class="flex sm:flex-col xs:flex-col md:flex-row lg:flex-row mb-5 mt-5"
                >
                    <div
                        class="grid grid-cols-4 lg:grid-cols-4 md:grid-cols-4 xs:grid-cols-2 sm:grid-cols-2 gap-4 p-3 md:mr-5 flex-1  shadow border border-gray-200">
                        <div class="flex flex-col">
                            <span class="text-xs">Yayın Tarihi</span>
                            <span class="text-sm">{{ bid.created_at }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs">Bitiş Tarihi</span>
                            <span class="text-sm">4 hafta sonra</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs">Yaklaşık Bütçe</span>
                            <span class="text-sm" v-if="bid.price"
                            >{{ bid.price }} TL</span
                            >
                            <span class="text-sm" v-else>Belirtilmemiş</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs">Teslim Süresi</span>
                            <span class="text-sm">5 Gün</span>
                        </div>
                    </div>
                    <div
                        class="flex w-128 sm:w-full xs:w-full lg:w-auto md:w-auto sm:mt-5 xs:mt-5 md:mt-0 lg:mt-0 flex-col"
                    >


                    </div>
                </div>

                <h2>Gelen Teklifler</h2>

                <ul
                    class="bg-white divide-y divide-gray-200"
                    v-if="offers.data.length"
                >
                    <li v-for="offer in offers.data">
                        <div class="flex items-center justify-between">
                            <div class="p-3">
                                <span> {{ offer.price }} TL </span>
                                <div class="flex">
                                    <span class="text-xs">
                                        {{ offer.body }}
                                    </span>
                                </div>
                            </div>

                            <div
                                class="border-l p-3 border-gray-200 flex flex-col"
                            >
                                <template v-if="offer.company">
                                    {{ offer.company.name }}
                                </template>
                                <span class="text-xs text-gray-600">
                                    <small>TARİH:</small> {{ offer.created_at }}
                                </span>
                            </div>
                        </div>
                    </li>
                </ul>

                <div v-else>Bu ilana gelen teklif yok</div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from "../../Layouts/AppLayout.vue";

    export default {
        components: {
            AppLayout,
        },
        props: ["bid", "offers"],
    };
</script>

<style></style>

AppLayout
