<template>
    <jet-action-section>
        <template #title>
            Tarayıcı Oturumları
        </template>

        <template #description>
            Diğer tarayıcılarda ve cihazlarda aktif oturumlarınızı yönetin ve oturumu kapatın.
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600  dark:text-gray-300">
                Gerekirse, tüm cihazlarınızdaki diğer tüm tarayıcı oturumlarınızdan çıkabilirsiniz. Son seanslarınızdan bazıları aşağıda listelenmiştir; ancak bu liste kapsamlı olmayabilir. Hesabınızın ele geçirildiğini düşünüyorsanız, şifrenizi de güncellemelisiniz. </div>

            <!-- Other Browser Sessions -->
            <div class="mt-5 space-y-6" v-if="sessions.length > 0">
                <div class="flex items-center" v-for="(session, i) in sessions" :key="i">
                    <div>
                        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500 dark:text-gray-50" v-if="session.agent.is_desktop">
                            <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-gray-500 dark:text-gray-50" v-else>
                            <path d="M0 0h24v24H0z" stroke="none"></path><rect x="7" y="4" width="10" height="16" rx="1"></rect><path d="M11 5h2M12 17v.01"></path>
                        </svg>
                    </div>

                    <div class="ml-3">
                        <div class="text-sm text-gray-600  dark:text-gray-300">
                            {{ session.agent.platform }} - {{ session.agent.browser }}
                        </div>

                        <div>
                            <div class="text-xs text-gray-500 dark:text-gray-50">
                                {{ session.ip_address }},

                                <span class="text-blue-500 font-semibold" v-if="session.is_current_device">Bu cihaz</span>
                                <span v-else>Last active {{ session.last_active }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center mt-5">
                <jet-button @click="confirmLogout">
                    Diğer Tarayıcı Oturumlarını Kapatın
                </jet-button>

                <jet-action-message :on="form.recentlySuccessful" class="ml-3">
                    Bitti
                </jet-action-message>
            </div>

            <!-- Log Out Other Devices Confirmation Modal -->
            <jet-dialog-modal :show="confirmingLogout" @close="closeModal">
                <template #title>
                    Diğer Tarayıcı Oturumlarını Kapatın
                </template>

                <template #content>
                    Lütfen tüm cihazlarınızdaki diğer tarayıcı oturumlarınızdan çıkmak istediğinizi onaylamak için şifrenizi girin.
                    <div class="mt-4">
                        <jet-input type="password" class="mt-1 block w-3/4" placeholder="Şifreniz"
                                    ref="password"
                                    v-model="form.password"
                                    @keyup.enter="logoutOtherBrowserSessions" />

                        <jet-input-error :message="form.errors.password" class="mt-2" />
                    </div>
                </template>

                <template #footer>
                    <jet-secondary-button @click="closeModal">
                        İptal
                    </jet-secondary-button>

                    <jet-button class="ml-2" @click="logoutOtherBrowserSessions" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Diğer Tarayıcı Oturumlarını Kapatın
                    </jet-button>
                </template>
            </jet-dialog-modal>
        </template>
    </jet-action-section>
</template>

<script>
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetActionSection from '@/Jetstream/ActionSection'
    import JetButton from '@/Jetstream/Button'
    import JetDialogModal from '@/Jetstream/DialogModal'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'

    export default {
        props: ['sessions'],

        components: {
            JetActionMessage,
            JetActionSection,
            JetButton,
            JetDialogModal,
            JetInput,
            JetInputError,
            JetSecondaryButton,
        },

        data() {
            return {
                confirmingLogout: false,

                form: this.$inertia.form({
                    password: '',
                })
            }
        },

        methods: {
            confirmLogout() {
                this.confirmingLogout = true

                setTimeout(() => this.$refs.password.focus(), 250)
            },

            logoutOtherBrowserSessions() {
                this.form.delete(route('other-browser-sessions.destroy'), {
                    preserveScroll: true,
                    onSuccess: () => this.closeModal(),
                    onError: () => this.$refs.password.focus(),
                    onFinish: () => this.form.reset(),
                })
            },

            closeModal() {
                this.confirmingLogout = false

                this.form.reset()
            },
        },
    }
</script>
