<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Teamx
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                <create-team-form :cities="cities" :countries="countries" :districts="districts"
                                  :sectors="sectors"/>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import CreateTeamForm from './CreateTeamForm'

    export default {
        props: [
            'cities',
            'countries',
            'districts',
            'services',
            'sectors',
        ],
        components: {
            AppLayout,
            CreateTeamForm,
        },
    }
</script>
