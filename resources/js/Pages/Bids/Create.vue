<template>
    <app-layout>
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-white leading-tight"
            >
                Yeni İlan
            </h2>
        </template>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <jet-form-section @submitted="createBids">
                    <template #title> İlan Bilgileri </template>

                    <template #description>
                        İlanınızın onaylanabilmesi için lütfen geçerli bilgiler
                        giriniz
                    </template>

                    <template #form>
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="title" value="İlan Başlığı" />
                            <jet-input
                                id="title"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.title"
                                autofocus
                            />
                            <jet-input-error
                                :message="form.errors.title"
                                class="mt-2"
                            />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <jet-label
                                for="description"
                                value="İlan Açıklaması"
                            />
                            <Textarea
                                class="mt-1 block w-full"
                                v-model="form.description"
                            ></Textarea>

                            <jet-input-error
                                :message="form.errors.description"
                                class="mt-2"
                            />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="sector_id" value="İlan Sektör" />
                            <select
                                class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full dark:bg-gray-800 dark:text-white dark:border-gray-400"
                                v-model="form.sector_id"
                            >
                                <option
                                    :value="sector.id"
                                    v-for="sector in sectors"
                                >
                                    {{ sector.name }}
                                </option>
                            </select>

                            <jet-input-error
                                :message="form.errors.sector_id"
                                class="mt-2"
                            />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="category_id" value="Kategori" />

                            <select
                                class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full dark:bg-gray-800 dark:text-white dark:border-gray-400 dark:bg-gray-800 dark:text-white dark:border-gray-400"
                                v-model="form.category_id"
                            >
                                <option
                                    :value="cat.id"
                                    v-for="cat in categories"
                                >
                                    {{ cat.name }}
                                </option>
                            </select>

                            <jet-input-error
                                :message="form.errors.category_id"
                                class="mt-2"
                            />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="sector_id" value="Teklif" />

                            <select
                                class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full dark:bg-gray-800 dark:text-white dark:border-gray-400 dark:bg-gray-800 dark:text-white dark:border-gray-400"
                                v-model="form.offer_type"
                            >
                                <option
                                    :value="offer.id"
                                    v-for="offer in offerTypes"
                                >
                                    {{ offer.name }}
                                </option>
                            </select>
                        </div>
                        <div
                            v-if="form.offer_type === 1"
                            class="col-span-6 sm:col-span-4"
                        >
                            <jet-label for="price" value="Fiyat" />
                            <jet-input
                                id="price"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.price"
                                autofocus
                            />
                            <jet-input-error
                                :message="form.errors.price"
                                class="mt-2"
                            />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <image-upload @imageLoaded="imageLoaded" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="country_id" value="Ülke" />

                            <select
                                class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full dark:bg-gray-800 dark:text-white dark:border-gray-400 dark:bg-gray-800 dark:text-white dark:border-gray-400"
                                v-model="form.country_id"
                            >
                                <option
                                    :value="country.id"
                                    v-for="country in countries"
                                >
                                    {{ country.name }}
                                </option>
                            </select>

                            <jet-input-error
                                :message="form.errors.country_id"
                                class="mt-2"
                            />
                        </div>

                        <template v-if="form.country_id === 1">
                            <div class="col-span-6 sm:col-span-4">
                                <jet-label for="city" value="Şehir" />

                                <select
                                    @change="districtLoad()"
                                    class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full dark:bg-gray-800 dark:text-white dark:border-gray-400 dark:bg-gray-800 dark:text-white dark:border-gray-400"
                                    v-model="form.city_id"
                                >
                                    <option
                                        :value="city.id"
                                        v-for="city in cities"
                                    >
                                        {{ city.name }}
                                    </option>
                                </select>

                                <jet-input-error
                                    :message="form.errors.city_id"
                                    class="mt-2"
                                />
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <jet-label for="district_id" value="İlçe" />
                                <select
                                    class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full dark:bg-gray-800 dark:text-white dark:border-gray-400 dark:bg-gray-800 dark:text-white dark:border-gray-400"
                                    v-model="form.district_id"
                                >
                                    <option
                                        :value="district.id"
                                        v-for="district in districts"
                                    >
                                        {{ district.ilce }}
                                    </option>
                                </select>
                                <jet-input-error
                                    :message="form.errors.district_id"
                                    class="mt-2"
                                />
                            </div>
                        </template>
                    </template>
                    <template #actions>
                        <jet-button
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Gönder
                        </jet-button>
                    </template>
                </jet-form-section>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";

import Textarea from "@/Jetstream/Textarea";
import ImageUpload from "@/Pages/Bids/ImageUpload";
import axios from "axios";
import JetCheckbox from "@/Jetstream/Checkbox";
export default {
    name: "Create",
    props: ["sectors", "companySector", "categories", "countries", "cities"],
    components: {
        ImageUpload,
        AppLayout,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetCheckbox,
        JetLabel,
        Textarea,
    },
    methods: {
        createBids() {
            this.form.post(route("bids.store"), {
                errorBag: "createBids",
                preserveScroll: true,
            });
        },
        imageLoaded(files) {
            console.log("dosyalar buraya geldi", files);
            this.form.files = files;
        },
        districtLoad() {
            this.districts = [];
            axios
                .get(route("location.district", this.form.city_id))
                .then((page) => {
                    this.districts = page.data;
                });
        },
    },
    data() {
        return {
            offerTypes: [
                { id: 1, name: "Sadece ilan olarak yayınla" },
                { id: 2, name: "Sadece iş ortaklarım teklif verebilsin" },
                { id: 3, name: "Herkes teklif verebilsin" },
            ],
            districts: [],
            form: this.$inertia.form({
                title: "",
                description: "",
                country_id: 1,
                sector_id: this.companySector,
                files: [],
                category_id: null,
                district_id: null,
                city_id: null,
                offer_type: null,
                status_id: null,
                price: null,
                fields: [],
                currency_id: 0,
            }),
        };
    },
};
</script>
