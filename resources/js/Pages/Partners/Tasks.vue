<template>


    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                İşler
            </h2>
        </template>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="flex shadow overflow-hidden border-b border-gray-200 sm:rounded-lg border-t">


                <div class="flex flex-col min-h-screen flex-shrink-0 w-64  border-r border-l  bg-gray-50  ">


                    <div class="ortaklar ">
                        <div class="flex justify-between  p-3 items-center">
                            <h2 class="text-xs font-medium text-gray-500 uppercase">İş Ortaklarım</h2>
                            <div class="  items-center flex">
                                <svg @click="searchPartnerShow = !searchPartnerShow" xmlns="http://www.w3.org/2000/svg"
                                     class="h-5" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                          d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                            </div>
                        </div>


                        <input type="text" v-if="searchPartnerShow" v-model="form.searchPartner"
                               class="  p-2   bg-white  w-full "
                               placeholder="Şirket adıyla arama"/>
                        <div v-for="team in teams.data"
                             class="ortak  bg-white border-b hover:bg-gray-100  border-gray-300 p-2  "
                             @click="getProjects(team.receiver_team.id)">

                            <div class="flex items-center justify-between">
                                <h2 :class="{ 'font-bold' : teamId == team.receiver_team.id }" class=" text-gray-700">
                                    {{team.receiver_team.name}}</h2>
                                <div class="flex items-center">
                                    <div class="flex  items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5" fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                                  d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                        </svg>
                                        <span class="absolute"
                                              style="font-size:8px; margin-left:7px;margin-top:-1px;">2</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                              d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                    </svg>

                                </div>

                            </div>


                            <AvailableDates :dates="[0,0,0,0,2,2,1,1,1,1,2,1,0,1,2]"/>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col min-h-screen bg-gray-50 flex-shrink-0 w-64 border-r ">

                    <div class="flex justify-between  p-3 items-center">
                        <h2 class="text-xs font-medium text-gray-500 uppercase">Projeler</h2>
                        <div class=" items-center flex">
                            <svg @click="searchProjectShow = !searchProjectShow" xmlns="http://www.w3.org/2000/svg"
                                 class="h-5" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <svg @click="reloadProject()" xmlns="http://www.w3.org/2000/svg" class="h-5" fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                      d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            <svg @click="createProjectShow = !createProjectShow" xmlns="http://www.w3.org/2000/svg"
                                 class="h-5" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                      d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>

                        </div>
                    </div>

                    <CreateProjectForm v-if="createProjectShow" :team-id="teamId"></CreateProjectForm>

                    <div class="projects  bg-white " v-if="projects.data">
                        <input type="text" v-if="searchProjectShow" v-model="form.searchProject"
                               class="  p-2   bg-gray-200  w-full "
                               placeholder="Proje adıyla arama"/>

                        <div v-if="projects.data.length">

                            <project-list-item v-for="project in projects.data"
                                               @click="getProjectDetail(project.team_id,project.id)" :project="project"
                                               :project-id="projectId"></project-list-item>

                        </div>
                        <div v-else class=" p-2">

                            Proje mevcut değil
                        </div>

                    </div>
                </div>
                <div class="flex flex-col min-h-screen bg-gray-50 border-r  w-full ">

                    <div class="flex justify-between  p-3 items-center">
                        <h2 class="text-xs font-medium text-gray-500 uppercase">Proje Aşamaları</h2>


                    </div>

                    <p v-if="projectDetail" class="p-3 bg-white ">
                    <ul class=" pb-2 border-b flex mb-3 space-x-1">
                        <li v-on:click="toggleTabs(1)" class="bg-green-100 text-green-800 text-sm px-2  rounded-xl">İş
                            Aşamaları
                        </li>
                        <li v-on:click="toggleTabs(2)" class="bg-green-100 text-green-800 text-sm px-2  rounded-xl">
                            Notlar
                            ({{projectDetail.notes.length}})
                        </li>
                        <li v-on:click="toggleTabs(3)" class="bg-green-100 text-green-800 text-sm px-2  rounded-xl">
                            Yazışmalar
                        </li>
                    </ul>

                    <div v-bind:class="{'hidden': openTab !== 1, 'block': openTab === 1}">
                        <h3 class="mb-4 text-lg font-semibold text-gray-900">Proje Hakkında</h3>

                        <h1>{{projectDetail.title}}</h1>
                        {{projectDetail.description}}

                    </div>
                    <div v-bind:class="{'hidden': openTab !== 2, 'block': openTab === 2}">


                        <h3 class="mb-4 text-lg font-semibold text-gray-900">Notlar</h3>

                        <div class="space-y-4">

                            <div class="flex" v-for="note in projectDetail.notes">
                                <div class="flex-shrink-0 mr-3">
                                    <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10"
                                         :src="note.user.profile_photo_url"
                                         alt="">
                                </div>
                                <div
                                    class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                                    <strong>{{note.user.name}}</strong> <span
                                    class=" text-gray-400">{{note.created_at }}</span>
                                    <p class="text-sm">
                                        {{note.body }}
                                    </p>

                                </div>
                            </div>

                        </div>

                        <create-note :projectId="projectDetail.id" :teamId="projectDetail.team_id"/>
                    </div>
                    <div v-bind:class="{'hidden': openTab !== 3, 'block': openTab === 3}">
                        <h3 class="mb-4 text-lg font-semibold text-gray-900">Yazışmalar</h3>

                        <p>
                            Firmayla olan eposta trafiğinizin burada saklanmasını istiyorsanız
                            pr{{projectDetail.id}}@fas10.net eposta adresini cc ye ekleyiniz.
                        </p>


                    </div>
                    <div class="divide-solid"></div>


                    </p>
                </div>
            </div>
        </div>

    </app-layout>

</template>

<script>

    import AppLayout from "@/Layouts/AppLayout";
    import AvailableDates from "@/Components/UI/AvailableDates";
    import CreateProjectForm from "@/Pages/Partners/CreateProjectForm";
    import CreateNote from "@/Pages/Partners/CreateNote";
    import ProjectListItem from "@/Pages/Partners/ProjectListItem";


    export default {
        name: "Index",
        components: {
            ProjectListItem,
            CreateNote,
            CreateProjectForm,
            AvailableDates,
            AppLayout
        },
        data() {
            return {
                form: [],
                openTab: 1,
                activeProject: 0,
                searchPartnerShow: false,
                createProjectShow: false,
                searchProjectShow: false,
            }
        },
        methods: {
            toggleTabs: function (tabNumber) {
                this.openTab = tabNumber
            },
            getProjects(teamId) {

                this.$inertia.get(route('partners.projects', teamId));

            },
            getProjectDetail(teamId, projectId) {

                this.$inertia.get(route('partners.projectDetail', {projectId, teamId}));
                this.activeProject = projectId;

            },
            reloadProject() {
                this.getProjects(this.activePartner);
            },

        },
        props: ['teams', 'projects', 'projectDetail', 'teamId', 'projectId']
    }
</script>

<style scoped>

</style>
