<template>
    <jet-form-section @submitted="updateTeamName">
        <template #title>
            Şirket Adı
        </template>

        <template #description>
            Şirketin adı ve sahibi bilgileri.
        </template>

        <template #form>
            <!-- Şirket Sahibi Information -->
            <div class="col-span-6">
                <jet-label value="Şirket Sahibi"/>

                <div class="flex items-center mt-2">
                    <img class="w-12 h-12 rounded-full object-cover" :src="team.owner.profile_photo_url"
                         :alt="team.owner.name">

                    <div class="ml-4 leading-tight">
                        <div>{{ team.owner.name }}</div>
                        <div class="text-gray-700 dark:text-white text-sm">{{ team.owner.email }}</div>
                    </div>
                </div>
            </div>

            <!-- Şirket Adı -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Şirket Adı"/>

                <jet-input id="name"
                           type="text"
                           class="mt-1 block w-full"
                           v-model="form.name"
                           :disabled="! permissions.canUpdateTeam"/>

                <jet-input-error :message="form.errors.name" class="mt-2"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="description" value="Şirket Açıklaması"/>

                <jet-textarea id="description"
                              type="text"
                              class="mt-1 block w-full min-h-200"
                              v-model="form.description"
                              :disabled="!permissions.canUpdateTeam"/>

                <jet-input-error :message="form.errors.description" class="mt-2"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="sector_id" value="Şirket Türü"/>

                <select :disabled="!permissions.canUpdateTeam"
                        class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full dark:bg-gray-800 dark:text-white dark:border-gray-400 dark:bg-gray-800 dark:text-white dark:border-gray-400"
                        v-model="form.type_id">
                    <option :value="type.id" v-for="type in types">{{type.name}}</option>
                </select>


                <jet-input-error :message="form.errors.type_id" class="mt-2"/>
            </div>

            <div class="col-span-6 sm:col-span-4">


                <image-upload @imageLoaded="imageLoaded"/>
                <show-uploaded-image :images="images"/>

            </div>


            <div class="col-span-6 sm:col-span-4">
                <jet-label for="sector_id" value="Sektör"/>

                <select :disabled="!permissions.canUpdateTeam"
                        class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full dark:bg-gray-800 dark:text-white dark:border-gray-400 dark:bg-gray-800 dark:text-white dark:border-gray-400"
                        v-model="form.sector_id">
                    <option :value="sector.id" v-for="sector in sectors">{{sector.name}}</option>
                </select>


                <jet-input-error :message="form.errors.sector_id" class="mt-2"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="number_of_staff" value="Çalışan personel sayısı"/>

                <jet-input id="number_of_staff"
                           type="number"
                           class="mt-1 block w-full"
                           v-model="form.number_of_staff"
                           :disabled="!permissions.canUpdateTeam"/>

                <jet-input-error :message="form.errors.number_of_staff" class="mt-2"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="phone" value="Şirket telefon numarası"/>

                <jet-input id="phone"
                           type="number"
                           class="mt-1 block w-full"
                           v-model="form.phone"
                           :disabled="!permissions.canUpdateTeam"/>

                <jet-input-error :message="form.errors.phone" class="mt-2"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="country_id" value="Ülke"/>

                <select :disabled="!permissions.canUpdateTeam"
                        class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full dark:bg-gray-800 dark:text-white dark:border-gray-400 dark:bg-gray-800 dark:text-white dark:border-gray-400"
                        v-model="form.country_id">
                    <option :value="country.id" v-for="country in countries">{{country.name}}</option>
                </select>


                <jet-input-error :message="form.errors.country_id" class="mt-2"/>
            </div>

            <template v-if="form.country_id === 1">
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="city" value="Şehir"/>

                    <select @change="districtLoad()" :disabled="!permissions.canUpdateTeam"
                            class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full dark:bg-gray-800 dark:text-white dark:border-gray-400 dark:bg-gray-800 dark:text-white dark:border-gray-400"
                            v-model="form.city_id">
                        <option :value="city.id" v-for="city in cities">{{city.name}}</option>
                    </select>
                    <jet-input-error :message="form.errors.city" class="mt-2"/>
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="district_id" value="İlçe"/>
                    <select :disabled="!permissions.canUpdateTeam"
                            class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full dark:bg-gray-800 dark:text-white dark:border-gray-400 dark:bg-gray-800 dark:text-white dark:border-gray-400"
                            v-model="form.district_id">
                        <option :value="district.id" v-for="district in districts">{{district.ilce}}
                        </option>
                    </select>
                    <jet-input-error :message="form.errors.district_id" class="mt-2"/>
                </div>
            </template>
        </template>

        <template #actions v-if="permissions.canUpdateTeam">
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Kaydedildi
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Kaydet
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetButton from '@/Jetstream/Button'
    import JetFormSection from '@/Jetstream/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import {Inertia} from '@inertiajs/inertia'

    import axios from "axios";
    import JetTextarea from "@/Jetstream/Textarea";
    import ImageUpload from "@/Pages/Bids/ImageUpload";
    import ShowUploadedImage from "@/Components/UI/ShowUploadedImage";

    export default {
        components: {
            ShowUploadedImage,
            ImageUpload,
            JetTextarea,
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
        },

        props: ['team', 'permissions', 'types', 'cities', 'countries', 'sectors', 'images'],

        data() {
            return {
                districts: [],
                form: this.$inertia.form({
                    name: this.team.name,
                    description: this.team.description,
                    sector_id: this.team.sector_id,
                    number_of_staff: this.team.number_of_staff,
                    phone: this.team.phone,
                    city_id: this.team.city_id,
                    country_id: this.team.country_id,
                    type_id: this.team.type_id,
                    district_id: this.team.district_id,
                    files: [],
                })
            }
        },
        created() {
            if (this.form.district_id > 0) {
                this.districtLoad();

            }

        },
        methods: {
            imageLoaded(files) {
                this.form.files = files;
            },
            districtLoad() {
                this.districts = [];
                axios.get(route('location.district', this.form.city_id)).then(page => {

                    this.districts = page.data;
                });
            },
            updateTeamName() {
                this.form.put(route('teams.update', this.team), {
                    errorBag: 'updateTeamName',
                    preserveScroll: true
                });
            },
        },
    }
</script>
