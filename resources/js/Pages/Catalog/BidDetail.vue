<template>
    <div class="bg-white dark:bg-gray-800 dark:bg-gray-600 min-h-screen">
        <Header />

        <teleport to="head">
            <title>FAS10 | {{ bid.title }}</title>
        </teleport>
        <div class="bg-gray-100 dark:bg-black w-full">
            <div
                class="h-24 flex items-center mx-auto max-w-7xl px-4 lg:px-8 sm:px-6"
            >
                <h2
                    class="text-4xl mb-2 text-gray-800 dark:text-white font-semibold font-heading"
                >
                    {{ bid.title }}
                </h2>
            </div>
        </div>

        <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <section class="py-12">
                <div class="flex flex-wrap -mx-8">
                    <div class="lg:w-1/2 px-8 lg:mt-0 order-2 lg:order-none">
                        <div class="flex flex-wrap">
                            <div class="w-full">
                                <ul
                                    class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row"
                                >
                                    <li
                                        class="-mb-px last:mr-0 flex-auto text-center"
                                    >
                                        <a
                                            class="font-bold px-4 py-3 shadow-lg rounded block leading-normal"
                                            v-bind:class="{
                                                'text-green-400 bg-white dark:bg-gray-600':
                                                    openTab !== 1,
                                                'text-white bg-green-400':
                                                    openTab === 1,
                                            }"
                                        >
                                            İlan Hakkında
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white dark:bg-gray-600 w-full mb-6 shadow-lg rounded"
                        >
                            <div class="px-4 py-5 flex-auto">
                                <div class="tab-content tab-space">
                                    <p
                                        class="mb-8 text-gray-800 dark:text-white leading-relaxed"
                                    >
                                        {{ bid.description }}
                                    </p>
                                    <table class="w-full mb-6 ">
                                        <tbody>
                                            <tr
                                                v-if="bid.company"
                                                class="border-t   dark:border-gray-500"
                                            >
                                                <td
                                                    class="py-3 text-gray-500 dark:text-gray-50"
                                                >
                                                    Yayınlayan şirket
                                                </td>
                                                <td class="text-right text-gray-500 dark:text-gray-50">
                                                    {{ bid.company.name }}
                                                </td>
                                            </tr>
                                            <tr class="border-t dark:border-gray-500">
                                                <td
                                                    class="py-3 text-gray-500 dark:text-gray-50"
                                                >
                                                    Oluşturulma Tarihi
                                                </td>
                                                <td class="text-right text-gray-500 dark:text-gray-50">
                                                    {{ bid.created_at }}
                                                </td>
                                            </tr>
                                            <tr
                                                v-if="bid.country"
                                                class="border-t dark:border-gray-500"
                                            >
                                                <td
                                                    class="py-3 text-gray-500 dark:text-gray-50"
                                                >
                                                    Ülke
                                                </td>
                                                <td class="text-right text-gray-500 dark:text-gray-50">
                                                    {{ bid.country.name }}
                                                </td>
                                            </tr>
                                            <tr
                                                v-if="bid.city"
                                                class="border-t dark:border-gray-500"
                                            >
                                                <td
                                                    class="py-3 text-gray-500 dark:text-gray-50"
                                                >
                                                    Şehir
                                                </td>
                                                <td class="text-right text-gray-500 dark:text-gray-50">
                                                    {{ bid.city.name }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-1/2 px-8">
                        <img
                            class="mb-4 rounded shadow"
                            v-for="image in bid.images"
                            :src="image.image"
                            :alt="image.image_caption"
                        />
                    </div>
                </div>
            </section>
        </main>
    </div>
</template>

<script>
import Header from "../../Components/Header.vue";
import CompanyBox from "@/Pages/Catalog/CompanyBox";

export default {
    components: {
        CompanyBox,
        Header,
    },
    data() {
        return {
            openTab: 1,
        };
    },
    props: {
        bid: [],
        images: [],
        canLogin: Boolean,
        canRegister: Boolean,
    },
};
</script>
