<template>
    <jet-action-section>
        <template #title>
            Hesabı sil
        </template>

        <template #description>
            Hesabınızı kalıcı olarak siler
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600  dark:text-gray-300">
                Hesabınız silindikten sonra tüm kaynakları ve verileri kalıcı olarak silinecektir. Hesabınızı silmeden önce, lütfen saklamak istediğiniz tüm verileri veya bilgileri indirin.
            </div>

            <div class="mt-5">
                <jet-danger-button @click="confirmUserDeletion">
                    Hesabı sil
                </jet-danger-button>
            </div>

            <!-- Hesabı sil Confirmation Modal -->
            <jet-dialog-modal :show="confirmingUserDeletion" @close="closeModal">
                <template #title>
                    Hesabı sil
                </template>

                <template #content>
                    Hesabınızı silmek istediğinizden emin misiniz? Hesabınız silindikten sonra tüm kaynakları ve verileri kalıcı olarak silinecektir. Lütfen hesabınızı kalıcı olarak silmek istediğinizi onaylamak için şifrenizi girin.
                    <div class="mt-4">
                        <jet-input type="password" class="mt-1 block w-3/4" placeholder="Şifreniz"
                                    ref="password"
                                    v-model="form.password"
                                    @keyup.enter="deleteUser" />

                        <jet-input-error :message="form.errors.password" class="mt-2" />
                    </div>
                </template>

                <template #footer>
                    <jet-secondary-button @click="closeModal">
                        İptal
                    </jet-secondary-button>

                    <jet-danger-button class="ml-2" @click="deleteUser" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Hesabı sil
                    </jet-danger-button>
                </template>
            </jet-dialog-modal>
        </template>
    </jet-action-section>
</template>

<script>
    import JetActionSection from '@/Jetstream/ActionSection'
    import JetDialogModal from '@/Jetstream/DialogModal'
    import JetDangerButton from '@/Jetstream/DangerButton'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'

    export default {
        components: {
            JetActionSection,
            JetDangerButton,
            JetDialogModal,
            JetInput,
            JetInputError,
            JetSecondaryButton,
        },

        data() {
            return {
                confirmingUserDeletion: false,

                form: this.$inertia.form({
                    password: '',
                })
            }
        },

        methods: {
            confirmUserDeletion() {
                this.confirmingUserDeletion = true;

                setTimeout(() => this.$refs.password.focus(), 250)
            },

            deleteUser() {
                this.form.delete(route('current-user.destroy'), {
                    preserveScroll: true,
                    onSuccess: () => this.closeModal(),
                    onError: () => this.$refs.password.focus(),
                    onFinish: () => this.form.reset(),
                })
            },

            closeModal() {
                this.confirmingUserDeletion = false

                this.form.reset()
            },
        },
    }
</script>
