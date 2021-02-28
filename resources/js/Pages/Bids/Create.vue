<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Yeni İlan
            </h2>
        </template>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                <jet-form-section @submitted="createBids">
                    <template #title>
                        İlan Bilgileri
                    </template>

                    <template #description>
                        İlanınızın onaylanabilmesi için lütfen geçerli bilgiler giriniz
                    </template>


                    <template #form>

                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="title" value="İlan Başlığı"/>
                            <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" autofocus/>
                            <jet-input-error :message="form.errors.title" class="mt-2"/>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="description" value="İlan Açıklaması"/>
                            <jet-input id="description" type="text" class="mt-1 block w-full" v-model="form.description"
                                       autofocus/>
                            <jet-input-error :message="form.errors.description" class="mt-2"/>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="sector_id" value="İlan sector_id"/>
                            <jet-input id="sector_id" type="text" class="mt-1 block w-full" v-model="form.sector_id"
                                       autofocus/>
                            <jet-input-error :message="form.errors.sector_id" class="mt-2"/>
                        </div>

                    </template>
                    <template #actions>
                        <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Gönder
                        </jet-button>
                    </template>

                </jet-form-section>

            </div>

        </div>
    </app-layout>
</template>


<script>

    import AppLayout from "@/Layouts/AppLayout";
    import JetButton from "@/Jetstream/Button";
    import JetFormSection from "@/Jetstream/FormSection";
    import JetInput from "@/Jetstream/Input";
    import JetInputError from "@/Jetstream/InputError";
    import JetLabel from "@/Jetstream/Label";

    export default {
        name: "Create",
        components: {
            AppLayout,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
        },
        methods: {
            createBids() {
                this.form.post(route('bids.store'), {
                    errorBag: 'createBids',
                    preserveScroll: true
                });
            }
        },
        data() {
            return {
                form: this.$inertia.form({
                    title: '',
                    description: '',
                    sector_id: '',

                })
            }
        },

    }
</script>

