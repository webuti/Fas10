<template>
    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo/>
        </template>

        <div class="mb-4 text-sm text-gray-600  dark:text-gray-300">
            Şifrenizi unuttuysanız, sistemde kayıtlı olan eposta adresinizi aşağıdaki forma yazıp göndere tıkladığınıza
            eposta adresinize
            şifre sıfırlama linki göndereceğiz.
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-blue-400">
            {{ status }}
        </div>

        <jet-validation-errors class="mb-4"/>

        <form @submit.prevent="submit">
            <div>
                <jet-label for="email" value="Eposta"/>
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Gönder
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    export default {
        components: {
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetLabel,
            JetValidationErrors
        },

        props: {
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: ''
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('password.email'))
            }
        }
    }
</script>
