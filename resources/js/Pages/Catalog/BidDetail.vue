<template>
    <div class="dark:bg-gray-800 dark:bg-gray-600 min-h-screen">
        <Header />

        <teleport to="head">
            <title>FAS10 | {{ bid.title }}</title>
        </teleport>
        <div class="dark:bg-black w-full border-b border-gray-200">
            <div
                class="flex items-center mx-auto max-w-7xl px-4 lg:px-8 sm:px-6"
            >
                <h2
                    class="text-4xl text-gray-800 dark:text-white mb-2 font-semibold font-heading"
                >
                    {{ bid.title }}
                </h2>
            </div>
        </div>

        <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div
                class="flex sm:flex-col xs:flex-col md:flex-row lg:flex-row mb-5 mt-5"
            >
                <div class="flex p-3 mr-5 flex-1 shadow border border-gray-200">
                    <div class="flex-1 flex flex-col">
                        <span class="text-xs">Yayın Tarihi</span>
                        <span class="text-sm">{{ bid.created_at }}</span>
                    </div>
                    <div class="flex-1 flex flex-col">
                        <span class="text-xs">Bitiş Tarihi</span>
                        <span class="text-sm">4 hafta sonra</span>
                    </div>
                    <div class="flex-1 flex flex-col">
                        <span class="text-xs">Yaklaşık Bütçe</span>
                        <span class="text-sm" v-if="bid.price"
                            >{{ bid.price }} TL</span
                        >
                        <span class="text-sm" v-else>Belirtilmemiş</span>
                    </div>
                    <div class="flex-1 flex flex-col">
                        <span class="text-xs">Teslim Süresi</span>
                        <span class="text-sm">5 Gün</span>
                    </div>
                </div>
                <div
                    class="flex w-72 sm:w-full xs:w-full lg:w-auto md:w-auto sm:mt-5 xs:mt-5 md:mt-0 lg:mt-0 flex-col"
                >
                    <span class="text-xs">Yayınlayan Şirket</span>
                    <h2>{{ bid.company.name }}</h2>
                    <span class="text-sm" v-if="bid.country && bid.city">
                        {{ bid.country.name }} /
                        {{ bid.city.name }}
                    </span>
                </div>
            </div>

            <h3 class="border-b mb-5 border-gray-200">Açıklama</h3>
            <p class="mb-8 text-gray-800 dark:text-white leading-relaxed">
                {{ bid.description }}
            </p>
            <template v-if="bid.images.length">
                <h3 class="border-b mb-5 border-gray-200">Fotoğraflar</h3>

                <ul class="flex space-x-1">
                    <li class="w-24" v-for="image in bid.images">
                        <img
                            class="mb-4 w-24 rounded shadow"
                            :src="image.image"
                            :alt="image.image_caption"
                            @click="showBigImage(image.image)"
                        />
                    </li>
                </ul>
            </template>
            <h3 class="border-b border-gray-200">Teklif ver</h3>
            <CreateOffer :id="bid.id" :type="bid.offer_type" />
        </main>

        <jet-dialog-modal
            :show="displayingBigImage"
            @close="displayingBigImage = false"
        >
            <template #content>
                <img :src="bigImage" class="mb-4 rounded shadow" />
            </template>

            <template #footer>
                <jet-secondary-button @click="displayingBigImage = false">
                    Kapat
                </jet-secondary-button>
            </template>
        </jet-dialog-modal>
    </div>
</template>

<script>
import Header from "../../Components/Header.vue";
import CompanyBox from "@/Pages/Catalog/CompanyBox";
import CreateOffer from "./CreateOffer.vue";
import Footer from "../../Components/Footer.vue";
import JetDialogModal from "@/Jetstream/DialogModal";

export default {
    components: {
        CompanyBox,
        CreateOffer,
        Header,
        Footer,
        JetDialogModal,
    },
    data() {
        return {
            openTab: 1,
            bigImage: null,
            displayingBigImage: false,
        };
    },
    mounted() {
        if (this.bid.images) {
            //  this.bigImage = this.bid.images[0].image;
        }
    },
    methods: {
        showBigImage(url) {
            this.bigImage = url;
            this.displayingBigImage = true;
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
