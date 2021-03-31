<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                İlan Düzenleme
            </h2>

        </template>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                <jet-form-section @submitted="updateBid">
                    <template #title>
                        İlan Bilgileri
                    </template>

                    <template #description>
                        İlanınızın onaylanabilmesi için lütfen geçerli bilgiler giriniz
                    </template>


                    <template #form>

                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="title" value="İlan Başlığı"/>
                            <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" autofocus/>
                            <jet-input-error :message="form.errors.title" class="mt-2"/>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="description" value="İlan Açıklaması"/>


                            <Textarea class="mt-1 block w-full" v-model="form.description"></Textarea>

                            <jet-input-error :message="form.errors.description" class="mt-2"/>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="sector_id" value="Sektör"/>

                            <select
                                class="border-gray-300 focus:border-green-300 focus:ring
                                 focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                v-model="form.sector_id">
                                <option :value="sector.id" v-for="sector in sectors">{{sector.name}}</option>
                            </select>

                            <jet-input-error :message="form.errors.sector_id" class="mt-2"/>


                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="category_id" value="Kategori"/>

                            <select
                                class="border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                v-model="form.category_id">
                                <option :value="cat.id" v-for="cat in categories">{{cat.name}}</option>
                            </select>

                            <jet-input-error :message="form.errors.category_id" class="mt-2"/>
                        </div>


                        <div class="col-span-6 sm:col-span-4">


                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="country_id" value="Ülke"/>

                            <select
                                class="border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                v-model="form.country_id">
                                <option :value="country.id" v-for="country in countries">{{country.name}}</option>
                            </select>


                            <jet-input-error :message="form.errors.country_id" class="mt-2"/>
                        </div>

                        <template v-if="form.country_id === 1">
                            <div class="col-span-6 sm:col-span-4">
                                <jet-label for="city" value="Şehir"/>

                                <select
                                    @change="districtLoad()"
                                    class="border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                    v-model="form.city_id">
                                    <option :value="city.id" v-for="city in cities">{{city.name}}</option>
                                </select>

                                <jet-input-error :message="form.errors.city_id" class="mt-2"/>
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <jet-label for="district_id" value="İlçe"/>
                                <select
                                    class="border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                    v-model="form.district_id">
                                    <option :value="district.id" v-for="district in districts">{{district.ilce}}
                                    </option>
                                </select>
                                <jet-input-error :message="form.errors.district_id" class="mt-2"/>
                            </div>
                        </template>


                    </template>
                    <template #actions>
                        <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                            Başarılı olarak kaydedildi
                        </jet-action-message>
                        <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
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
    import JetActionMessage from "@/Jetstream/ActionMessage";

    import ImageUpload from "@/Pages/Bids/ImageUpload";

    export default {
        name: "Update",
        components: {
            Textarea,
            AppLayout,
            JetButton,
            JetFormSection,
            JetActionMessage,
            JetInput,
            JetInputError,
            JetLabel,
            ImageUpload
        },
        methods: {
            updateBid() {
                this.form.put(route('bids.update', this.bid), {
                    errorBag: 'updateBid',
                    preserveScroll: true
                });
            },
            districtLoad() {
                this.districts = [];
                axios.get(route('location.district', this.form.city_id)).then(page => {

                    this.districts = page.data;
                });
            },
        },
        props: ['bid', 'sectors', 'categories', 'countries', 'cities', 'images'],
        mounted() {
            this.districtLoad();
        },
        data() {
            return {
                districts: [],
                form: this.$inertia.form({
                    title: this.bid.title,
                    description: this.bid.description,
                    sector_id: this.bid.sector_id,
                    city_id: this.bid.city_id,
                    country_id: this.bid.country_id,
                    district_id: this.bid.district_id,
                    category_id: this.bid.category_id,

                })
            }
        },

    }
</script>

