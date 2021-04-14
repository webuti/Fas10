<template>
    <jet-form-section @submitted="createTeam">
        <template #title>
            Şirket Bilgileri
        </template>

        <template #description>
            Şirketinizin onaylanması için bilgileri doğru ve eksiksiz giriniz.
        </template>

        <template #form>
            <div class="col-span-6">
                <jet-label value="Şirket Sahibi"/>

                <div class="flex items-center mt-2">
                    <img class="w-12 h-12 rounded-full object-cover" :src="$page.props.user.profile_photo_url"
                         :alt="$page.props.user.name">

                    <div class="ml-4 leading-tight">
                        <div>{{ $page.props.user.name }}</div>
                        <div class="text-gray-700 dark:text-white text-sm">{{ $page.props.user.email }}</div>
                    </div>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Şirket Adı"/>
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus/>
                <jet-input-error :message="form.errors.name" class="mt-2"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="description" value="Şirket Açıklaması"/>

                <jet-textarea id="description"
                           type="text"
                           class="mt-1 block w-full"
                           v-model="form.description"/>

                <jet-input-error :message="form.errors.description" class="mt-2"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="sector_id" value="Şirket Türü"/>

                <select
                        class="border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full dark:bg-gray-800 dark:text-white dark:border-gray-400 dark:bg-gray-800 dark:text-white dark:border-gray-400"
                        v-model="form.type_id">
                    <option :value="type.id" v-for="type in types">{{type.name}}</option>
                </select>


                <jet-input-error :message="form.errors.type_id" class="mt-2"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="sector_id" value="Sektör"/>

                <select
                    class="border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full dark:bg-gray-800 dark:text-white dark:border-gray-400 dark:bg-gray-800 dark:text-white dark:border-gray-400"
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
                           v-model="form.number_of_staff"/>

                <jet-input-error :message="form.errors.number_of_staff" class="mt-2"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="phone" value="Şirket telefon numarası"/>

                <jet-input id="phone"
                           type="number"
                           class="mt-1 block w-full"
                           v-model="form.phone"/>

                <jet-input-error :message="form.errors.phone" class="mt-2"/>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="country_id" value="Ülke"/>

                <select
                    class="border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full dark:bg-gray-800 dark:text-white dark:border-gray-400 dark:bg-gray-800 dark:text-white dark:border-gray-400"
                    v-model="form.country_id">
                    <option :value="country.id" v-for="country in countries">{{country.name}}</option>
                </select>


                <jet-input-error :message="form.errors.country_id" class="mt-2"/>
            </div>

            <template v-if="form.country_id === 1">
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="city" value="Şehir"/>

                    <select
                        class="border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full dark:bg-gray-800 dark:text-white dark:border-gray-400 dark:bg-gray-800 dark:text-white dark:border-gray-400"
                        v-model="form.city_id">
                        <option :value="city.id" v-for="city in cities">{{city.name}}</option>
                    </select>
                    <jet-input-error :message="form.errors.city" class="mt-2"/>
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="district_id" value="İlçe"/>
                    <select
                        class="border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full dark:bg-gray-800 dark:text-white dark:border-gray-400 dark:bg-gray-800 dark:text-white dark:border-gray-400"
                        v-model="form.district_id">
                        <option :value="district.id" v-for="district in districts">{{district.name}}</option>
                    </select>
                    <jet-input-error :message="form.errors.district_id" class="mt-2"/>
                </div>
            </template>


        </template>

        <template #actions>
            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Oluştur
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
    import JetButton from '@/Jetstream/Button'
    import JetFormSection from '@/Jetstream/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import axios from "axios";
    import JetTextarea from "@/Jetstream/Textarea";

    export default {
        components: {
            JetTextarea,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
        },
        props: [
            'cities',
            'countries',
            'districts',
            'services',
            'sectors',
            'types',
        ],
        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    description: '',
                    sector_id: 1,
                    number_of_staff: 1,
                    city_id: '',
                    country_id: 1,
                    district_id: '',
                    type_id: '',
                    phone: '',

                })
            }
        },

        methods: {
            districtLoad() {
                this.districts = [];
                axios.get(route('location.district', this.form.city_id)).then(page => {

                    this.districts = page.data;
                });
            },
            createTeam() {
                this.form.post(route('teams.store'), {
                    errorBag: 'createTeam',
                    preserveScroll: true
                });
            },
        },
    }
</script>
