<template>
    <app-layout>
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-white leading-tight"
            >
                İlan Bilgileri : {{ bid.title }}
            </h2>
        </template>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
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
