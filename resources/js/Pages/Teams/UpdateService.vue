<template>
    <div>
        <jet-section-border/>

        <!-- Add Team Member -->
        <jet-form-section @submitted="updateService">
            <template #title>
                Hizmetler
            </template>

            <template #description>
                Şirketinizin sunduğu hizmetleri seçmelisiniz.
            </template>

            <template #form>
                <div class="col-span-6">
                    <div class="max-w-xl text-sm text-gray-600">

                        <div class="col-span-6 sm:col-span-4">


                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div v-for="service in services" :key="service.id">
                                    <label class="flex items-center">

                                        <jet-checkbox name="services[]" v-model:checked="form.services"
                                                      :value="service.id"/>
                                        <span class="ml-2 text-sm text-gray-600">{{ service.name}}</span>
                                    </label>
                                </div>
                            </div>


                            <jet-input-error :message="form.errors.service_id" class="mt-2"/>
                        </div>

                    </div>
                </div>
            </template>
            <template #actions>
                <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                    Kaydedildi
                </jet-action-message>

                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Kaydet
                </jet-button>
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
    import JetCheckbox from '@/Jetstream/Checkbox'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'
    import JetSectionBorder from '@/Jetstream/SectionBorder'

    export default {
        props: [
            'team',
            'availableRoles',
            'services',
            'sector',
            'userPermissions',
            'companyServices'
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
            JetCheckbox
        },
        data() {
            return {
                form: this.$inertia.form({
                    services: [],
                })
            }
        },
        created() {


            this.companyServices[0].map((key) => {

                this.form.services.push(key.service_id);
            });
        },
        methods: {

            updateService() {

                this.form.put(route('teams.service.update', {team: this.team, service: this.form.services}), {
                    errorBag: 'updateTeamService',
                    preserveScroll: true
                });
            },
        },

    }
</script>

<style scoped>

</style>
