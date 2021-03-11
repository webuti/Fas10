<template>
    <MainLayout>
        <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
            <section class="py-12 px-4">
                <div class="flex flex-wrap -mx-8">
                    <div class="lg:w-1/2 px-8 mt-6 lg:mt-0 order-2 lg:order-none">
                        <h2 class="text-4xl mb-2 font-semibold font-heading">{{company.name}}</h2>

                        <div class="flex mb-6">
                            <ul class="flex list-reset">
                                <li><a class="block py-2 px-3 mr-2 bg-gray-100 rounded" href="#">Şirket Hakkında
                                    Bilgi</a>
                                </li>
                                <li><a class="block py-2 px-3 mr-2 hover:bg-gray-100 rounded" href="#">Yorumlar</a></li>
                                <li><a class="block py-2 px-3 mr-2 hover:bg-gray-100 rounded" href="#">Referanslar</a>
                                </li>
                                <li><a class="block py-2 px-3 mr-2 hover:bg-gray-100 rounded" href="#">Hizmetleri</a>
                                </li>
                            </ul>
                        </div>
                        <p class="mb-8 text-gray-400 leading-relaxed">
                            {{company.description}}.</p>
                        <table class="w-full mb-6">
                            <tbody>
                            <tr class="border-t">
                                <td class="py-3">Çalışan Sayısı</td>
                                <td class="text-right">{{company.number_of_staff}}</td>
                            </tr>
                            <tr class="border-t">
                                <td class="py-3">Şehir</td>
                                <td class="text-right">{{company.city_id}} / {{company.district_id}}</td>
                            </tr>
                            <tr class="border-t">
                                <td class="py-3">Ülke</td>
                                <td class="text-right">{{company.country_id}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <button
                            class="inline-block py-4 px-8 leading-none text-white bg-green-600 hover:bg-green-700 font-semibold rounded">
                            İletişime geç
                        </button>
                    </div>

                </div>
            </section>
        </main>
    </MainLayout>
</template>


<script>
    import Header from "../../Components/Header.vue";
    import MainLayout from "@/Layouts/MainLayout";


    export default {
        components: {
            Header,
            MainLayout
        },

        props: {
            company: [],
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        }
    }
</script>
