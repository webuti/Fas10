<template>
    <div class=" mt-5">

        <form @submit.prevent="createNote">

            <textarea
                placeholder="Notunuz"
                class="border-gray-300 focus:border-green-300 mb-5 focus:ring focus:ring-green-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
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

                    body: '',
                    team_id: '',
                    project_id: '',
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
                    preserveScroll: true
                });
            },
        },

        props: ['teamId', 'projectId']
    }
</script>

<style scoped>

</style>
