<template>
    <div class="flex flex-col w-64 h-screen px-4 py-8 bg-white   dark:bg-gray-800 dark:border-gray-600">

        <ul>
            <li><a href="">Yurtdışı</a></li>
            <li><a href="">Yurtiçi</a></li>
            <li><a href="">Satin Alma Ilanlari</a></li>
            <li><a href="">Son Eklenen Seri İlanlar</a></li>
            <li><a href="">Yurt Disindan Talepler</a></li>
            <li><a href="">Yurt Disindan Teklifler</a></li>
            <li><a href="">Fason Imalathane Arayanlar</a></li>
            <li><a href="">Fason Çalisan Imalathaneler</a></li>

        </ul>

        <div class="flex flex-col">
            <label class="text-gray-600">Ülke</label>
            <select class="rounded-lg border border-gray-300 py-2" v-model="form.country">
                <option v-for="country in countries" :value="country.id">{{country.name}}</option>
            </select>
            <template v-if="form.country == 1">
                <label class="text-gray-600">Şehir</label>
                <select class="rounded-lg border border-gray-300 py-2" v-model="form.city">
                    <option v-for="city in cities" :value="city.id">{{city.name}}</option>
                </select>
            </template>
            <label class="text-gray-600">Hizmet</label>
            <select class="rounded-lg  border border-gray-300 border py-2" v-model="form.services">
                <option v-for="service in services" :value="service.id">{{service.name}}</option>
            </select>
            <button type="submit" class="bg-green-400 mt-4 text-white rounded-lg py-2 ">Filtrele</button>

        </div>
    </div>

</template>

<script>
    export default {
        name: "Sidebar",
        props: ['countries', 'cities', 'services'],
        data() {
            return {
                form: {},
            }
        },
        created() {
            if (!this.form.country) {
                this.form.country = 1;
            }
        }
    }
</script>

<style scoped>

</style>
