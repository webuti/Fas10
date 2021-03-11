<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Yeni İlan
            </h2>
        </template>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                <jet-form-section @submitted="updateBid">
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



                            <Textarea class="mt-1 block w-full" v-model="form.description"></Textarea>

                            <jet-input-error :message="form.errors.description" class="mt-2"/>
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <jet-label for="sector_id" value="Sektör"/>

                            <select
                                class="border-gray-300 focus:border-green-300 focus:ring
                                 focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                v-model="form.sector_id">
                                <option :value="sector.id" v-for="sector in sectors">{{sector.name}}</option>
                            </select>

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
    import Textarea from "@/Jetstream/Textarea";

    export default {
        name: "Update",
        components: {
            Textarea,
            AppLayout,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
        },
        methods: {
            updateBid() {
                this.form.put(route('bids.update', this.bid), {
                    errorBag: 'updateBid',
                    preserveScroll: true
                });
            }
        },
        props: ['bid','sectors'],
        data() {
            return {
                form: this.$inertia.form({
                    title: this.bid.title,
                    description: this.bid.description,
                    sector_id: this.bid.sector_id,

                })
            }
        },

    }
</script>

