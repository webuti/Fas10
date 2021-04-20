<template>
    <div class="bg-white dark:bg-gray-800 dark:bg-gray-600 min-h-screen">
        <Header />

        <teleport to="head">
            <title>FAS10 | {{ bid.title }}</title>
        </teleport>
        <div class="bg-gray-50 dark:bg-black w-full">
            <div
                class="h-24 flex items-center mx-auto max-w-7xl px-4 lg:px-8 sm:px-6"
            >
                <h2
                    class="text-4xl text-gray-800 dark:text-white mb-2 font-semibold font-heading"
                >
                    {{ bid.title }}
                </h2>
            </div>
        </div>

        <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <section class="py-12">
                <div class="flex flex-wrap -mx-8">
                    <div class="lg:w-1/2 px-8 lg:mt-0 order-1 lg:order-none">
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
                                    <h3>{{ bid.price }} TL</h3>

                                    <p
                                        class="mb-8 text-gray-800 dark:text-white leading-relaxed"
                                    >
                                        {{ bid.description }}
                                    </p>
                                    <div v-if="imageModalShow">
                                        <img
                                            :src="imageModalUrl"
                                            class="mb-4 rounded shadow"
                                        />
                                    </div>

                                    <ul class="flex space-x-1">
                                        <li
                                            class="w-64"
                                            v-for="image in bid.images"
                                        >
                                            <img
                                                class="mb-4 rounded shadow"
                                                :src="image.image"
                                                :alt="image.image_caption"
                                                @click="
                                                    showModalImage(image.image)
                                                "
                                            />
                                        </li>
                                    </ul>

                                    <table class="w-full mb-6">
                                        <tbody>
                                            <tr
                                                v-if="bid.company"
                                                class="border-t dark:border-gray-500"
                                            >
                                                <td
                                                    class="py-3 text-gray-500 dark:text-gray-50"
                                                >
                                                    Yayınlayan şirket
                                                </td>
                                                <td
                                                    class="text-right text-gray-500 dark:text-gray-50"
                                                >
                                                    {{ bid.company.name }}
                                                </td>
                                            </tr>
                                            <tr
                                                v-if="bid.price"
                                                class="border-t dark:border-gray-500"
                                            >
                                                <td
                                                    class="py-3 text-gray-500 dark:text-gray-50"
                                                >
                                                    Fiyat
                                                </td>
                                                <td
                                                    class="text-right text-gray-500 dark:text-gray-50"
                                                >
                                                    {{ bid.price }} TL
                                                </td>
                                            </tr>
                                            <tr
                                                class="border-t dark:border-gray-500"
                                            >
                                                <td
                                                    class="py-3 text-gray-500 dark:text-gray-50"
                                                >
                                                    Oluşturulma Tarihi
                                                </td>
                                                <td
                                                    class="text-right text-gray-500 dark:text-gray-50"
                                                >
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
                                                <td
                                                    class="text-right text-gray-500 dark:text-gray-50"
                                                >
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
                                                <td
                                                    class="text-right text-gray-500 dark:text-gray-50"
                                                >
                                                    {{ bid.city.name }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-1/2 px-8  order-2">
                        <CreateOffer :id="bid.id" :type="bid.offer_type" />
                    </div>
                </div>
            </section>
        </main>
    </div>
</template>

<script>
import Header from "../../Components/Header.vue";
import CompanyBox from "@/Pages/Catalog/CompanyBox";
import CreateOffer from "./CreateOffer.vue";
export default {
    components: {
        CompanyBox,
        CreateOffer,
        Header,
    },
    data() {
        return {
            openTab: 1,
            imageModalShow: false,
            imageModalUrl: null,
        };
    },
    methods: {
        showModalImage(url) {
            this.imageModalUrl = url;
            this.imageModalShow = true;
            console.log(url, "url");
        },
    },
    props: {
        bid: [],
        images: [],
        canLogin: Boolean,
        canRegister: Boolean,
    },
};
</script>
