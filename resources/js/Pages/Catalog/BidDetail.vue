<template>


    <MainLayout :title="bid.title">

        <div class="dark:bg-gray-600 min-h-screen">

            <div class="flex items-center justify-between">
                <h2
                    class="text-4xl text-gray-800 dark:text-white mb-2 font-semibold font-heading"
                >
                    {{ bid.title }}
                </h2>

                <a href="#" @click="back()" class="text-blue-600 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                              d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Geri</a>
            </div>

            <main>
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

                        <div class="flex ">
                            <img class="h-10 w-10 mr-2 rounded-full object-cover"
                                 :src="'https://ui-avatars.com/api/?name='+bid.company.name+'&color=7F9CF5&background=EBF4FF'"
                                 :alt="bid.company.name">

                            <div class="flex flex-col">
                                <span class="text-xs">Yayınlayan Şirket</span>

                                <h2>{{ bid.company.name }}</h2>
                                <span class="text-sm flex" v-if="bid.country && bid.city">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                             viewBox="0 0 20 20" fill="currentColor">
                                <path fillRule="evenodd"
                                      d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                      clipRule="evenodd"/>
                            </svg>
                            {{bid.country.name}}, {{bid.city.name}}

                    </span>
                            </div>
                        </div>


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
                <CreateOffer :id="bid.id" :type="bid.offer_type"/>
            </main>


            <jet-dialog-modal
                :show="displayingBigImage"
                @close="displayingBigImage = false"
            >
                <template #content>
                    <img :src="bigImage" class="mb-4 rounded shadow"/>
                </template>

                <template #footer>
                    <jet-secondary-button @click="displayingBigImage = false">
                        Kapat
                    </jet-secondary-button>
                </template>
            </jet-dialog-modal>
        </div>

    </MainLayout>
</template>

<script>
    import Header from "../../Components/Header.vue";
    import CompanyBox from "@/Pages/Catalog/CompanyBox";
    import CreateOffer from "./CreateOffer.vue";
    import Footer from "../../Components/Footer.vue";
    import JetDialogModal from "@/Jetstream/DialogModal";
    import MainLayout from "@/Layouts/MainLayout";

    export default {
        components: {
            MainLayout,
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
            back() {
                window.history.back();

            }
        },
        props: {
            bid: [],
            images: [],
            canLogin: Boolean,
            canRegister: Boolean,
        },
    };
</script>
