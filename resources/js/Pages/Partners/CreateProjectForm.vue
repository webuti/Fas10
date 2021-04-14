<template>
    <div class="bg-white dark:bg-gray-600  border-b shadow-inner   p-3">

        <div v-if="teamId">
            <h3 class="font-bold">Yeni Proje</h3>
            <form @submit.prevent="createProject">
                <input type="text"
                       class="border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full dark:bg-gray-800 dark:text-white dark:border-gray-400 dark:bg-gray-800 dark:text-white dark:border-gray-400"
                       placeholder="Proje adı" v-model="form.title"/>
                <textarea
                    placeholder="Proje Açıklaması"
                    class="border-gray-300 focus:border-green-300 mb-5 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full dark:bg-gray-800 dark:text-white dark:border-gray-400"
                    v-model="form.description"></textarea>


                <label class="text-xs">Teslim Tarihi</label>
                <input type="date" id="deadline" placeholder="Teslim Tarihi" v-model="form.deadline"

                       class="border-gray-300 mb-3 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full dark:bg-gray-800 dark:text-white dark:border-gray-400"
                >


                <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                    Başarılı olarak kaydedildi
                </jet-action-message>
                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Ekle
                </jet-button>

            </form>
        </div>
        <div v-else>
            <div class="flex flex-col items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-10" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <h3 class="font-bold">Yeni Proje</h3>
                Önce Şirket seçiniz
            </div>
        </div>
    </div>

</template>

<script>

    import JetActionMessage from "@/Jetstream/ActionMessage";
    import JetButton from "@/Jetstream/Button";

    export default {
        name: "CreateProjectForm",
        components: {
            JetActionMessage,
            JetButton,
        },
        data() {
            return {
                form: this.$inertia.form({
                    title: null,
                    description: null,
                    deadline: null,
                    team_id: null,
                }),
            }
        },
        methods: {
            createProject() {

                this.form.team_id = this.teamId;
                this.form.post(route('projects.store'), {
                    errorBag: 'createProjects',

                    preserveScroll: true,
                    onSuccess: () => this.form.reset(),
                });
            },
        },

        props: ['teamId']
    }
</script>

<style scoped>

</style>
