<template>


    <MainLayout title="İlanlar">

        <div v-if="mobileMenuShow" @click="mobileMenuShow = false"
             class="bg-gray-200 z-10 h-screen w-full  opacity-25 absolute"></div>
        <div class="flex flex-row">

            <div
                class="flex flex-col w-64  pr-4  z-20  bg-white md:block lg:block xl:block absolute xs:absolute   sm:absolute md:static lg:static "

                :class="{ 'hidden': !mobileMenuShow }"
            >


                <form v-if="sector" @submit="submit()" action="javascript:void(0)">

                    <div class="flex justify-between">
                        <h2 class="text-green-400 font-bold mb-2">Kategoriler
                        </h2>
                        <span @click="mobileMenuShow = false" class="block md:hidden lg:hidden sm:block"><svg
                            class="h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
  <path fillRule="evenodd"
        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
        clipRule="evenodd"/>
</svg></span>
                    </div>
                    <ul>
                        <li class="text-md" v-for="cat in categories">

                            <a href="#" @click="urlBuilder(cat.seo_url,sector)">{{cat.name}}</a>

                        <li v-for="catc in cat.children" class="ml-2">
                            <a href="#" @click="urlBuilder(catc.seo_url,sector)">{{catc.name}}</a>
                        <li v-for="catcz in catc.children" class="ml-2"><a href="#"
                                                                           @click="urlBuilder(catcz.seo_url,sector)">{{catcz.name}}</a>
                        </li>
                        </li>
                        </li>
                    </ul>
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

                <div v-else>
                    <h2 class="text-green-400 font-bold mb-2">Sektörler
                    </h2>

                    <ul>
                        <li class="text-md" v-for="sector in sectors">


                            <inertia-link :href="route('bidCatalog',sector.seo_url)">{{sector.name}}</inertia-link>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="content  w-full">
                <h2 class="text-green-400 text-xl font-bold my-2">{{categoryInfo.name}}</h2>
                <div class="flex flex-wrap justify-between items-center  py-2 space-y-2 md:space-y-0">


                    <div
                        class="flex flex-wrap justify-start md:justify-end items-center space-x-0 space-y-2 sm:space-x-2 sm:space-y-0">
                        <div class="divide-x-2 border border-gray-300 shadow-sm rounded-md">
                            <button class="p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" class="h-4 w-4 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>
                                </svg>
                            </button>

                            <button class="p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" class="h-4 w-4 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                                </svg>
                            </button>

                            <button class="p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" class="h-4 w-4 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"/>
                                </svg>
                            </button>
                            <button @click="mobileMenuShow = !mobileMenuShow"
                                    class="p-2   lg:hidden md:hidden  sm:block xs:block">
                                <div class="flex   text-xs text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor" class="h-4 w-4 text-gray-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                                    </svg>
                                    <span>Filtre</span></div>
                            </button>
                        </div>


                    </div>
                </div>
                <!-- End Tools -->


                <div class="grid grid-cols-1 mt-5  md:grid-cols-1 sm:grid-cols-1 gap-4">
                    <BidItem v-if="bids.data.length" :item="bid" v-for="bid in bids.data"/>

                    <template v-else>

                        <div class="w-full px-6 py-3 rounded-sm border  " role="alert">

                            <div class="flex flex-col items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     class="text-yellow-400  w-16 h-16 mx-2 stroke-current"><!---->
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
                                    <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!----> <!---->
                                    <!----> <!----> <!----> <!---->
                                </svg>
                                <label>Bu kategoriye eklenmiş ilan bulunamadı</label></div>
                        </div>


                    </template>


                    <div class="flex flex-wrap -mb-1" v-if="bids.links.length > 3">
                        <template v-for="(link, bkey) in bids.links">

                            <div v-if="link.url === null" :key="key"
                                 class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded"
                                 v-html="link.label"/>

                            <inertia-link v-else :key="bkey"
                                          class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500"
                                          :class="{ 'bg-white': link.active }" :href="link.url"
                            ><span v-html="link.label"></span>
                            </inertia-link>

                        </template>
                    </div>

                </div>
            </div>
        </div>
    </MainLayout>
</template>


<script>
    import Header from "../../Components/Header.vue";
    import BidItem from "../../Components/Catalog/BidItem";
    import Sidebar from "@/Components/Catalog/Sidebar";
    import MainLayout from "@/Layouts/MainLayout";

    import qs from "qs";

    export default {
        components: {
            MainLayout,
            Sidebar,
            BidItem,
            Header
        },
        data() {
            return {
                itemStyle: 1,
                mobileMenuShow: false,
                form: {

                    country_id: this.formData.country_id,
                    services: this.formData.services || [],
                    city_id: this.formData.city_id,
                    category_id: this.category,
                    categories: this.category,
                    sector: this.sector
                },
            }
        },
        methods: {

            urlBuilder(cat, type) {
                let RouteParams = route('bidCatalog.cat', {cat, type});
                RouteParams = RouteParams + '/?' + qs.stringify({
                    city_id: this.form.city_id,
                    country_id: this.form.country_id,
                    services: this.form.services
                });
                this.$inertia.get(RouteParams)
            }
        },
        watch: {
            form: {
                handler: (function () {
                    this.urlBuilder(this.category, this.sector);
                }),
                deep: true,
            },
        },

        mounted() {
            console.log(this.form, "form");
        },
        created() {

            //     this.form = qs.parse(window.location.search.split('?')[1]);

        },
        props: {
            bids: Array,
            countries: Array,
            category: String,
            categories: Array,
            sectors: Array,
            categoryInfo: Array,
            sector: String,
            services: Array,
            cities: Array,
            formData: Array,
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        }
    }
</script>
