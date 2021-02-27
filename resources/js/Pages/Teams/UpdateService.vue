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
        methods: {
            updateService(data) {
                console.log(data, "data geldi");
            }
        },

    }
</script>

<style scoped>

</style>
