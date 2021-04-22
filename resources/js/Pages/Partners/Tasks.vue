<template>
    <div>
        <form @submit.prevent="createTasks">
            <input
                type="text"
                class="border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full dark:bg-gray-800 dark:text-white dark:border-gray-400 dark:bg-gray-800 dark:text-white dark:border-gray-400"
                placeholder="İş açıklama"
                v-model="form.body"
            />
        </form>
        <ul
            v-if="tasks.data"
            class="tasks mt-2 border rounded-md border-gray-300 dark:border-gray-500"
        >
            <li
                v-for="task in tasks.data"
                class="px-2 py-2 border-b  cursor-pointer text-gray-600 border-gray-200 dark:text-gray-300 hover:bg-gray-50 dark:bg-gray-700 text-sm  dark:border-gray-500 flex items-center"
                @click="statusChange(task)"
            >
                <template v-if="task.status_id === 1">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 text-blue-400 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            strokeWidth="{2}"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </svg>
                </template>
                <template v-else>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 text-gray-300"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            strokeWidth="{2}"
                            d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </svg>
                </template>

                {{ task.body }}
            </li>
        </ul>
        <div class="flex items-center flex-col" v-else  >

            <svg xmlns="http://www.w3.org/2000/svg" class="animate-spin h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
</svg>
Yükleniyor</div>
    </div>
</template>

<script>
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetButton from "@/Jetstream/Button";
import axios from "axios";

export default {
    name: "Tasks",
    props: ["project_id", "team_id"],

    components: {
        JetActionMessage,
        JetButton,
    },
    data() {
        return {
            tasks: [],
            form: this.$inertia.form({
                body: null,
                deadline: null,
                team_id: this.team_id,
                project_id: this.project_id,
            }),
        };
    },
    created() {
        this.getTasks();
    },

    methods: {
        statusChange(task) {
            axios
                .post(route("projectTasks.update", this.project_id), task)
                .then((e) => {
                    this.getTasks();
                });
        },
        getTasks() {
            axios.get(route("projectTasks.show", this.project_id)).then((e) => {
                this.tasks = e.data;
            });
        },
        createTasks() {
            this.form.post(route("projectTasks.store"), {
                errorBag: "createTasks",
                preserveScroll: true,
                onSuccess: () => {
                    this.form.reset();
                    this.getTasks();
                },
            });
        },
    },
};
</script>

<style scoped></style>
