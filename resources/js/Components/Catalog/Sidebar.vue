<template>
    <div class="flex flex-col w-64 h-screen  pr-4 bg-white   dark:bg-gray-800 dark:border-gray-600">

        <form @submit.prevent="submit()">

            <h2 class="text-green-400 font-bold mt-2 mb-2">Filtreler</h2>
            <div class="flex flex-col">
                <label class="text-gray-600  my-2">Ülke</label>
                <select class="rounded-lg border border-gray-300 py-2" v-model="form.country_id">
                    <option v-for="country in countries" :value="country.id">{{country.name}}</option>
                </select>
                <template v-if="form.country_id == 1">
                    <label class="text-gray-600  my-2">Şehir</label>
                    <select class="rounded-lg border border-gray-300 py-2" v-model="form.city_id">
                        <option v-for="city in cities" :value="city.id">{{city.name}}</option>
                    </select>
                </template>
                <label class="text-gray-600  my-2">Hizmet</label>
                <label v-for="service in services" class="text-gray-600">
                    <input type="checkbox" v-model="form.services" :value="service.id" :id="service.id"
                           class="rounded border-gray-300  shadow-sm focus:border-green-300
                   focus:ring focus:ring-green-200 focus:ring-opacity-50"/> {{service.name}}
                </label>
                <button type="submit"
                        class="bg-green-400 focus:outline-none focus:ring focus:border-green-300 mt-4 text-white rounded-lg py-2 ">
                    Filtrele
                </button>
            </div>

        </form>
    </div>

</template>

<script>
    import qs from "qs";

    export default {
        name: "Sidebar",
        props: ['countries', 'cities', 'services', 'categories', 'sector', 'formData'],
        data() {
            return {
                form: {
                    country_id: this.formData.country_id,
                    services: this.formData.services || [],
                    city_id: this.formData.city_id,
                },
            }
        },

        methods: {
            submit() {
                this.urlBuilder(this.sector);
            },

            urlBuilder(type) {
                let RouteParams = route('companyCatalog', {type: type});
                RouteParams = RouteParams + '/?' + qs.stringify({
                    city_id: this.form.city_id,
                    country_id: this.form.country_id,
                    services: this.form.services
                });
                this.$inertia.get(RouteParams)
            }
        },

    }
</script>

<style scoped></style>
