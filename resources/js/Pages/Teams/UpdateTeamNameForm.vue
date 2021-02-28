<template>
    <jet-form-section @submitted="updateTeamName">
        <template #title>
            Şirket Adı
        </template>

        <template #description>
            The team's name and owner information.
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
                        <div class="text-gray-700 text-sm">{{ team.owner.email }}</div>
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

                <jet-input id="description"
                           type="text"
                           class="mt-1 block w-full"
                           v-model="form.description"
                           :disabled="!permissions.canUpdateTeam"/>

                <jet-input-error :message="form.errors.description" class="mt-2"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <jet-label for="sector_id" value="Sektör"/>

                <select @change="districtLoad()" :disabled="!permissions.canUpdateTeam"
                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
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
                <jet-label for="country_id" value="Ülke"/>

                <select :disabled="!permissions.canUpdateTeam"
                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                        v-model="form.country_id">
                    <option :value="country.id" v-for="country in countries">{{country.name}}</option>
                </select>


                <jet-input-error :message="form.errors.country_id" class="mt-2"/>
            </div>

            <template v-if="form.country_id === 1">
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="city" value="Şehir"/>

                    <select @change="districtLoad()" :disabled="!permissions.canUpdateTeam"
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                            v-model="form.city_id">
                        <option :value="city.id" v-for="city in cities">{{city.name}}</option>
                    </select>
                    <jet-input-error :message="form.errors.city" class="mt-2"/>
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <jet-label for="district_id" value="İlçe"/>
                    <select @change="districtLoad()" :disabled="!permissions.canUpdateTeam"
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                            v-model="form.district_id">
                        <option :value="district.id" v-for="district in districts">{{district.name}}</option>
                    </select>
                    <jet-input-error :message="form.errors.district_id" class="mt-2"/>
                </div>
            </template>
        </template>

        <template #actions v-if="permissions.canUpdateTeam">
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
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

    export default {
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
        },

        props: ['team', 'permissions', 'cities', 'countries', 'districts', 'sectors'],

        data() {
            return {
                form: this.$inertia.form({
                    name: this.team.name,
                    description: this.team.description,
                    sector_id: this.team.sector_id,
                    number_of_staff: this.team.number_of_staff,
                    city_id: this.team.city_id,
                    country_id: this.team.country_id,
                    district_id: this.team.district_id,
                })
            }
        },
        methods: {
            districtLoad() {
                Inertia.reload({only: ['districts']})
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
