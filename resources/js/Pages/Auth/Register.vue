<template>
    <jet-authentication-card>
        <template #logo>
            <logo/>
        </template>

        <jet-validation-errors class="mb-4"/>

        <form @submit.prevent="submit">
            <div>
                <jet-label for="name" value="İsim"/>
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus
                           autocomplete="name"/>
            </div>

            <div class="mt-4">
                <jet-label for="email" value="Eposta"/>
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required/>
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Şifre"/>
                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                           autocomplete="new-password"/>
            </div>

            <div class="mt-4">
                <jet-label for="password_confirmation" value="Şifre (tekrar)"/>
                <jet-input id="password_confirmation" type="password" class="mt-1 block w-full"
                           v-model="form.password_confirmation" required autocomplete="new-password"/>
            </div>

            <div class="mt-4" v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
                <jet-label for="terms">
                    <div class="flex items-center">
                        <jet-checkbox name="terms" id="terms" v-model:checked="form.terms"/>

                        <div class="ml-2">
                            Sözleşmeleri kabul ediyorum <a target="_blank" :href="route('terms.show')"
                                                           class="underline text-sm text-gray-600  dark:text-gray-300 hover:text-gray-900 dark:text-white">Kullanım
                            sözleşmesi</a> ve <a target="_blank" :href="route('policy.show')"
                                                 class="underline text-sm text-gray-600  dark:text-gray-300 hover:text-gray-900 dark:text-white">Gizlilik
                            sözleşmesi</a>
                        </div>
                    </div>
                </jet-label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <inertia-link :href="route('login')" class="underline text-sm text-gray-600  dark:text-gray-300 hover:text-gray-900 dark:text-white">
                    Üyeliğiniz varsa buraya tıklayın
                </inertia-link>

                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Kayıt ol
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
    import JetCheckbox from "@/Jetstream/Checkbox";
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'
    import logo from "@/Components/UI/Logo.vue";

    export default {
        components: {
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            logo,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    }
</script>
