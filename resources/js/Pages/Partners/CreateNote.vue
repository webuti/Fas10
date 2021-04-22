<template>
    <div class=" mt-5">

        <form @submit.prevent="createNote">

            <textarea
                placeholder="Notunuz"
                class="border-gray-300 focus:border-blue-300 mb-5 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full dark:bg-gray-800 dark:text-white dark:border-gray-400"
                v-model="form.body"></textarea>

            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Başarılı olarak kaydedildi
            </jet-action-message>
            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Gönder
            </jet-button>

        </form>
    </div>


</template>

<script>

    import JetActionMessage from "@/Jetstream/ActionMessage";
    import JetButton from "@/Jetstream/Button";

    export default {
        name: "CreateNote",
        components: {
            JetActionMessage,
            JetButton,
        },
        data() {
            return {
                form: this.$inertia.form({

                    body: null,
                    team_id: null,
                    project_id: null,
                }),
            }
        },
        methods: {
            createNote() {

                this.form.team_id = this.teamId;
                this.form.project_id = this.projectId;
                this.form.post(route('projectNotes.store'), {
                    errorBag: 'createprojectNotes',
                    resetForm: true,
                    preserveScroll: true,
                    onSuccess: () => this.form.reset(),
                });
            },
        },

        props: ['teamId', 'projectId']
    }
</script>

<style scoped>

</style>
