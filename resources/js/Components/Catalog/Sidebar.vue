<template>


    <form @submit.prevent="submit()">

        <div class="flex flex-col divide-y space-y-5 divide-gray-200">
            <div class="flex flex-col  ">
                <label class="text-gray-800  font-bold my-2">Ülke</label>
                <select class="rounded-lg border text-sm  border-gray-300 py-2" v-model="form.country_id">
                    <option v-for="country in countries" :value="country.id">{{country.name}}</option>
                </select>
            </div>
            <div class="flex flex-col mt-5">
                <template v-if="form.country_id == 1">
                    <label class="text-gray-800  font-bold my-2">Şehir</label>
                    <select class="rounded-lg border text-sm border-gray-300 py-2" v-model="form.city_id">
                        <option v-for="city in cities" :value="city.id">{{city.name}}</option>
                    </select>
                </template>
            </div>

            <div class="flex flex-col mt-5">
                <label class="text-gray-800  font-bold my-2">Hizmet</label>
                <span class="flex flex-col space-y-2">
                <label v-for="service in services" class="text-gray-600  text-sm dark:text-gray-300">
                  <input type="checkbox" v-model="form.services" :value="service.id" :id="service.id"
                         class="rounded border-gray-300  shadow-sm focus:border-blue-300
                   focus:ring focus:ring-blue-200 focus:ring-opacity-50 "/> {{service.name}}
                </label>
                </span>
            </div>

            <button type="submit"
                    class="bg-blue-600 focus:outline-none focus:ring focus:border-blue-300 mt-4 text-white rounded-lg py-2 ">
                Filtrele
            </button>
        </div>

    </form>

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
