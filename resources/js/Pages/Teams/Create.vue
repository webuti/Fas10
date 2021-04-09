<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Yeni Şirket
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                <create-team-form :cities="cities" :countries="countries" :types="types" :districts="districts"
                                  :sectors="sectors"/>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import CreateTeamForm from './CreateTeamForm'

    export default {
        data() {
            return {
                cities: null,
                countries: null,
                services: null,
                sectors: null,
                types: null,

            }
        },

        created() {

            axios.get(route('team.ajax.index')).then(resp => {

                console.log(resp, "datalar");

                this.cities = resp.data.cities;
                this.countries = resp.data.countries;
                this.districts = resp.data.districts;
                this.services = resp.data.services;
                this.sectors = resp.data.sectors;
                this.types = resp.data.types;

            });
        },
        components: {
            AppLayout,
            CreateTeamForm,
        },
    }
</script>
