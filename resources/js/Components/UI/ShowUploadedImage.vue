<template>
    <div>
        <jet-dialog-modal :show="removeImage" @close="closeModal">
            <template #title>
                Bu fotoğrafı silmek istediğinize eminmisiniz ?
            </template>

            <template #content>
                <img :src="removeImage.image" class="w-72 h-72 "/>

            </template>
            <template #footer>
                <jet-secondary-button @click="closeModal">
                    İptal
                </jet-secondary-button>


                <inertia-link v-if="removeImage" :href="route('imageUpload.destroy',removeImage)" :data="removeImage"
                              method="DELETE"
                              as="button"
                              class="inline-flex items-center px-4 py-2 bg-gray-800  dark:bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150 ml-2"
                              type="button">
                    Sil
                </inertia-link>

            </template>

        </jet-dialog-modal>


        <div class="flex space-x-1">
            <div v-for="img in images" class="border border-gray-100 p-1 flex flex-col items-center rounded-md">


                <img :src="img.image" class="w-12 h-12 "/>

                <div @click="removeImage = img" class="bg-red-100 flex-1 cursor-pointer rounded-full text-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6   w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import JetDialogModal from "@/Jetstream/DialogModal";
    import JetSecondaryButton from "@/Jetstream/SecondaryButton";
    import JetButton from "@/Jetstream/Button";


    export default {
        components: {
            JetDialogModal,
            JetSecondaryButton,
            JetButton
        },
        data() {
            return {
                removeImage: false,
            }
        },
        methods: {
            closeModal() {
                this.removeImage = false;
            },

        },

        name: "ShowUploadedImage",
        props: ['images']
    }
</script>

<style scoped>

</style>
