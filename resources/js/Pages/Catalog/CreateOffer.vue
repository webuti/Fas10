<template>
    <div>
        <form v-if="$page.props.user" @submit.prevent="createOffer">
            <h3>Teklif Yap</h3>
            <textarea
                placeholder="Teklif açıklaması"
                class="border-gray-300 focus:border-green-300 mb-5 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full dark:bg-gray-800 dark:text-white dark:border-gray-400"
                v-model="form.body"
            ></textarea>
            <input
                placeholder="Fiyat"
                type="number"
                class="border-gray-300 focus:border-green-300 mb-5 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full dark:bg-gray-800 dark:text-white dark:border-gray-400"
                v-model="form.price"
            />

            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Teklifiniz başarılı olarak kaydedildi
            </jet-action-message>
            <jet-button
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Gönder
            </jet-button>
        </form>
        <div v-else>
            <div
                class="flex bg-yellow-100 text-yellow-700 flex-col p-3 items-center"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-12 w-12"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth="{2}"
                        d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"
                    />
                </svg>

                <div v-if="type == 3">
                    Sadece üye girişi yapmış kişiler teklif verebilir.
                </div>
                <div v-else>
                    Sadece üye girişi yapmış iş ortakları teklif verebilir.
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetButton from "@/Jetstream/Button";

export default {
    components: {
        JetActionMessage,
        JetButton,
    },
    methods: {
        createOffer() {
            this.form.bid_id = this.id;
            this.form.post(route("bidOffer.store"), {
                errorBag: "createbidOffer",
                resetForm: true,
                preserveScroll: true,
                onSuccess: () => this.form.reset(),
            });
        },
    },
    props: ["id", "type"],
    data() {
        return {
            form: this.$inertia.form({
                body: null,
                price: null,
                bid_id: this.id,
            }),
        };
    },
};
</script>

<style></style>
