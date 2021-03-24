<template>


    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                İş Ortaklarım
            </h2>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex  text-gray-700">


                <div class="flex flex-col min-h-screen flex-shrink-0 w-64  border-r border-l    ">


                    <div class="ortaklar">
                        <div class="flex justify-between  p-3 items-center">
                            <h2 class="text-gray-400">İş Ortaklarım</h2>
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
                             @click="getProjects(team.id)">
                            <div class="flex items-center justify-between">
                                <h2 class=" text-gray-700">{{team.name}}</h2>
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
                <div class="flex flex-col min-h-screen  flex-shrink-0 w-64 border-r ">

                    <div class="flex justify-between  p-3 items-center">
                        <h2 class="text-gray-400">Projeler</h2>
                        <div class="  items-center flex">
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

                    <div class="projects" v-if="projects.data">
                        <input type="text" v-if="searchProjectShow" v-model="form.searchProject"
                               class="  p-2   bg-gray-200  w-full "
                               placeholder="Proje adıyla arama"/>

                        <div v-for="project in projects.data" @click="getProjectDetail(project.team_id,project.id)"
                             class="project   border-b border-gray-300 p-2">
                            <h3>{{project.title}}</h3>
                            <h4>Proje bitiş tarihi: 30/04/2021</h4>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col min-h-screen border-r  w-full ">

                    <div class="flex justify-between  p-3 items-center">
                        <h2 class="text-gray-400">Proje Aşamaları</h2>


                    </div>

                    <p v-if="projectDetail" class="p-3 bg-white ">
                    <ul class=" pb-2 border-b flex space-x-1">
                        <li class=" bg-gray-500 text-white text-sm px-2   rounded-xl">İş Aşamaları</li>
                        <li class=" bg-gray-500 text-white text-sm px-2   rounded-xl">Notlar</li>
                        <li class=" bg-gray-500 text-white text-sm px-2   rounded-xl">Yazışmalar</li>
                    </ul>
                    <div class="divide-solid"></div>

                    <h1>{{projectDetail.title}}</h1>
                    {{projectDetail.description}}
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


    export default {
        name: "Index",
        components: {
            CreateProjectForm,
            AvailableDates,
            AppLayout
        },
        data() {
            return {
                form: [],
                activeProject: 0,
                searchPartnerShow: false,
                createProjectShow: false,
                searchProjectShow: false,
            }
        },
        methods: {
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
        props: ['teams', 'projects', 'projectDetail', 'teamId']
    }
</script>

<style scoped>

</style>
