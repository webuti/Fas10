<template>
    <MainLayout title="Şirketler">
        <div
            v-if="mobileMenuShow"
            @click="mobileMenuShow = false"
            class="bg-gray-200 z-10 h-screen w-full opacity-25 absolute"
        ></div>

        <div class="flex flex-row">
            <div
                :class="{ hidden: !mobileMenuShow }"
                class="flex flex-col w-64 pr-4 z-20 bg-white md:block lg:block xl:block absolute xs:absolute sm:absolute md:static lg:static"
            >
                <template v-if="sector">
                    <div class="flex justify-between">
                        <h2 class="text-green-400 font-bold mb-2">Filtreler</h2>
                        <span
                            @click="mobileMenuShow = false"
                            class="block md:hidden lg:hidden sm:block"
                            ><svg
                                class="h-8"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fillRule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clipRule="evenodd"
                                /></svg
                        ></span>
                    </div>

                    <Sidebar
                        :cities="cities"
                        :sector="sector"
                        :formData="formData"
                        :countries="countries"
                        :services="services"
                    />
                </template>

                <div v-else>
                    <h2 class="text-green-400 font-bold mb-2">Sektörler</h2>

                    <ul>
                        <li class="text-md" v-for="sector in sectors">
                            <inertia-link
                                :href="route('companyCatalog', sector.seo_url)"
                                >{{ sector.name }}
                            </inertia-link>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="content w-full">
                <h2 class="text-green-400 text-xl font-bold my-2">Şirketler</h2>

                <div
                    class="flex flex-wrap justify-between items-center py-2 space-y-2 md:space-y-0"
                >
                    <div
                        class="flex flex-wrap justify-start md:justify-end items-center space-x-0 space-y-2 sm:space-x-2 sm:space-y-0"
                    >
                        <div
                            class="divide-x-2 border border-gray-300 shadow-sm rounded-md"
                        >
                            <button @click="showTypeSet('card')" class="p-2">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    class="h-4 w-4 text-gray-500"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                                    />
                                </svg>
                            </button>

                            <button @click="showTypeSet('table')" class="p-2">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    class="h-4 w-4 text-gray-500"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"
                                    />
                                </svg>
                            </button>
                            <button
                                @click="mobileMenuShow = !mobileMenuShow"
                                class="p-2 lg:hidden md:hidden sm:block xs:block"
                            >
                                <div class="flex text-xs text-gray-500">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        class="h-4 w-4 text-gray-500"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"
                                        />
                                    </svg>
                                    <span>Filtre</span>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- End Tools -->

                <div v-if="companies.data.length">
                    <div
                        class="grid grid-cols-2 mt-5 md:grid-cols-3 sm:grid-cols-2 gap-10"
                        v-if="showType === 'card'"
                    >
                        <CompanyItem
                            :company="company"
                            v-for="company in companies.data"
                        />
                    </div>
                    <company-item-table v-else :companies="companies.data" />
                </div>
                <template v-else>
                    <div
                        class="w-full px-6 py-3 rounded-sm border"
                        role="alert"
                    >
                        <div class="flex flex-col items-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                class="text-yellow-400 w-16 h-16 mx-2 stroke-current"
                            >
                                <!---->
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                                ></path>
                            </svg>
                            <label
                                >Bu kategoriye eklenmiş ilan bulunamadı</label
                            >
                        </div>
                    </div>
                </template>
                <div
                    class="flex flex-wrap mt-10 -mb-1"
                    v-if="companies.links.length > 3"
                >
                    <template v-for="(link, bkey) in companies.links">
                        <div
                            v-if="link.url === null"
                            :key="key"
                            class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded"
                            v-html="link.label"
                        />

                        <inertia-link
                            v-else
                            :key="bkey"
                            class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500"
                            :class="{ 'bg-white': link.active }"
                            :href="link.url"
                            ><span v-html="link.label"></span>
                        </inertia-link>
                    </template>
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script>
import Header from "../../Components/Header.vue";
import CompanyItem from "@/Components/Catalog/CompanyItem";
import Sidebar from "@/Components/Catalog/Sidebar";
import MainLayout from "@/Layouts/MainLayout";
import CompanyItemTable from "../../Components/Catalog/CompanyItemTable.vue";

export default {
    components: {
        MainLayout,
        Sidebar,
        CompanyItem,
        Header,
        CompanyItemTable,
    },
    data() {
        return {
            mobileMenuShow: false,
            showType: "table",
        };
    },
    created() {
        this.showType = localStorage.getItem("company.showType");
    },
    methods: {
        showTypeSet(data) {
            this.showType = data;
            localStorage.setItem("company.showType", data);
        },
    },

    props: {
        companies: Array,
        countries: Array,
        formData: Object,
        cities: Array,
        services: Array,
        sector: String,
        sectors: Array,
    },
};
</script>
