<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
                Şirket Ayarları
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                <update-team-name-form :cities="cities" :countries="countries" :districts="districts"
                                       :team="team" :sectors="sectors" :types="types" :permissions="permissions" :images="images"/>
                <update-service :team="team" :sector="team.sector_id" :services="services"
                                :companyServices="companyServices"
                                :user-permissions="permissions"/>

                <team-member-manager class="mt-10 sm:mt-0"
                                     :team="team"
                                     :available-roles="availableRoles"
                                     :user-permissions="permissions"/>

                <template v-if="permissions.canDeleteTeam && ! team.personal_team">
                    <jet-section-border/>

                    <delete-team-form class="mt-10 sm:mt-0" :team="team"/>
                </template>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import TeamMemberManager from './TeamMemberManager'
    import AppLayout from '@/Layouts/AppLayout'
    import DeleteTeamForm from './DeleteTeamForm'
    import JetSectionBorder from '@/Jetstream/SectionBorder'
    import UpdateTeamNameForm from './UpdateTeamNameForm'
    import UpdateService from "@/Pages/Teams/UpdateService";

    export default {
        props: [
            'team',
            'availableRoles',
            'permissions',
            'cities',
            'images',
            'countries',
            'districts',
            'services',
            'sectors',
            'types',
            'companyServices'
        ],

        components: {

            UpdateService,
            AppLayout,
            DeleteTeamForm,
            JetSectionBorder,
            TeamMemberManager,
            UpdateTeamNameForm,
        },
    }
</script>
