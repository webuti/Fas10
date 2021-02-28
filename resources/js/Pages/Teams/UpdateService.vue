<template>
    <div>
        <jet-section-border/>

        <!-- Add Team Member -->
        <jet-form-section @submitted="updateService">
            <template #title>
                Servisler
            </template>

            <template #description>
                Şirketinizin sunduğu hizmetleri seçmelisiniz.
            </template>

            <template #form>
                <div class="col-span-6">
                    <div class="max-w-xl text-sm text-gray-600">
                        Doğru seçimler yapmanız şirketinizin bulunabilirliğini artıracaktır.

                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="sector" value="Sektör"/>

                            <select
                                 id="sector"
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                    v-model="form.category_id">
                                <option :value="sector.id" v-for="sector in sectors">{{sector.name}}</option>
                            </select>
                            <jet-input-error :message="form.errors.sector_id" class="mt-2"/>
                        </div>

                        {{sectors}}
                        {{services}}

                    </div>
                </div>
            </template>
        </jet-form-section>
    </div>


</template>

<script>


    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetActionSection from '@/Jetstream/ActionSection'
    import JetButton from '@/Jetstream/Button'
    import JetConfirmationModal from '@/Jetstream/ConfirmationModal'
    import JetDangerButton from '@/Jetstream/DangerButton'
    import JetDialogModal from '@/Jetstream/DialogModal'
    import JetFormSection from '@/Jetstream/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'
    import JetSectionBorder from '@/Jetstream/SectionBorder'

    export default {
        props: [
            'team',
            'availableRoles',
            'services',
            'sectors',
            'userPermissions'
        ],
        name: "update-service",
        components: {
            JetActionMessage,
            JetActionSection,
            JetButton,
            JetConfirmationModal,
            JetDangerButton,
            JetDialogModal,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
            JetSectionBorder,
        },
        data() {
            return {
                form: this.$inertia.form({
                    name: this.team.name,
                    description: this.team.description,
                    city_id: this.team.city_id,
                    country_id: this.team.country_id,
                    district_id: this.team.district_id,
                })
            }
        },
        methods: {
            updateService(data) {
                console.log(data, "data geldi");
            }
        },

    }
</script>

<style scoped>

</style>
