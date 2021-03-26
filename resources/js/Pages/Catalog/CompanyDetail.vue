<template>
    <MainLayout :title="company.name">
        <main class="   mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl   ">
            <section class="py-12">


                <div class="flex flex-wrap -mx-8">
                    <div class="lg:w-1/2 px-8 mt-6   lg:mt-0 order-2 lg:order-none">
                        <div class="mb-6">
                            <h2 class="text-4xl mb-2 font-semibold font-heading">{{company.name}}</h2>


                            <inertia-link method="post"
                                          as="button"
                                          type="button" v-if="partnerStatus.status == 1"
                                          class="border border-gray-400  text-gray-600  p-2 flex rounded items-center  ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8" viewBox="0 0 20 20"
                                     fill="currentColor">
                                    <path fillRule="evenodd"
                                          d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                          clipRule="evenodd"/>
                                </svg>
                                Talep Gönderildi
                            </inertia-link>
                            <inertia-link method="post"
                                          as="button"
                                          type="button" v-else-if="partnerStatus.status == 2"
                                          class="border border-gray-400  text-gray-600  p-2 flex rounded items-center  ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8" viewBox="0 0 20 20"
                                     fill="currentColor">
                                    <path fillRule="evenodd"
                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                          clipRule="evenodd"/>
                                </svg>
                                İş Ortaklarıma eklendi
                            </inertia-link>

                            <inertia-link v-else :href="route('partners.store')" :data="{team_id : company.id}"
                                          method="post"
                                          as="button"
                                          type="button"
                                          class="border border-gray-400  text-gray-600 px-2 font-bold   flex rounded-full text-sm items-center  ">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8" viewBox="0 0 20 20"
                                     fill="currentColor">
                                    <path fillRule="evenodd"
                                          d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                          clipRule="evenodd"/>
                                </svg>
                                İş Ortaklarıma ekle
                            </inertia-link>

                        </div>

                        <div class="flex flex-wrap">
                            <div class="w-full">
                                <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
                                    <li class="-mb-px last:mr-0 flex-auto text-center">
                                        <a class=" font-bold  px-5 py-3 shadow-lg rounded block leading-normal"
                                           v-on:click="toggleTabs(1)"
                                           v-bind:class="{'text-green-400 bg-white': openTab !== 1, 'text-white bg-green-400': openTab === 1}">
                                            Şirket Hakkında
                                        </a>
                                    </li>
                                    <li class="-mb-px last:mr-0 flex-auto text-center">
                                        <a class=" font-bold  px-5 py-3 shadow-lg rounded block leading-normal"
                                           v-on:click="toggleTabs(2)"
                                           v-bind:class="{'text-green-400 bg-white': openTab !== 2, 'text-white bg-green-400': openTab === 2}">
                                            Yorumlar ({{company.comments.length}})
                                        </a>
                                    </li>
                                    <li class="-mb-px last:mr-0 flex-auto text-center">
                                        <a class=" font-bold  px-5 py-3 shadow-lg rounded block leading-normal"
                                           v-on:click="toggleTabs(3)"
                                           v-bind:class="{'text-green-400 bg-white': openTab !== 3, 'text-white bg-green-400': openTab === 3}">
                                            Hizmetler
                                        </a>
                                    </li>
                                </ul>
                                <div
                                    class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                                    <div class="px-4 py-5 flex-auto">
                                        <div class="tab-content tab-space">
                                            <div v-bind:class="{'hidden': openTab !== 1, 'block': openTab === 1}">


                                                <p class="mb-8 text-gray-400 leading-relaxed">
                                                    {{company.description}}.</p>
                                                <table class="w-full mb-6">
                                                    <tbody>
                                                    <tr class="border-t">
                                                        <td class="py-3 text-gray-500">Çalışan Sayısı</td>
                                                        <td class="text-right">{{company.number_of_staff}}</td>
                                                    </tr>
                                                    <tr class="border-t">
                                                        <td class="py-3 text-gray-500">Ülke</td>
                                                        <td class="text-right">{{company.country.name}}</td>
                                                    </tr>
                                                    <tr class="border-t">
                                                        <td class="py-3 text-gray-500">Şehir</td>
                                                        <td class="text-right">{{company.city.name}} /
                                                            {{company.district_id}}
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>


                                            </div>
                                            <div v-bind:class="{'hidden': openTab !== 2, 'block': openTab === 2}">


                                                <div class="antialiased mx-auto max-w-screen-sm">
                                                    <h3 class="mb-4 text-lg font-semibold text-gray-900">Yorumlar</h3>

                                                    <div class="space-y-4">

                                                        <div class="flex" v-for="comment in company.comments">
                                                            <div class="flex-shrink-0 mr-3">
                                                                <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10"
                                                                     :src="comment.user.profile_photo_url"
                                                                     alt="">
                                                            </div>
                                                            <div
                                                                class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                                                                <strong>{{comment.user.name}}</strong> <span
                                                                class=" text-gray-400">{{comment.created_at }}</span>
                                                                <p class="text-sm">
                                                                    {{comment.body }}
                                                                </p>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <form @submit.prevent="submitComment()"
                                                      class="w-full max-w-xl bg-white rounded-lg  ">
                                                    <div class="flex flex-wrap -mx-3 mb-6">
                                                        <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">
                                                            {{company.name}} hakkındaki yorumlarınız</h2>
                                                        <div class="w-full md:w-full px-3 mb-2 mt-2">
                                                            <textarea
                                                                class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                                                                name="body" placeholder='Mesajınız' v-model="form.body"
                                                                required></textarea>
                                                            <div v-if="form.errors.body">{{ form.errors.body }}</div>

                                                        </div>
                                                        <div class="w-full md:w-full flex items-start md:w-full px-3">
                                                            <div
                                                                class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">

                                                            </div>
                                                            <div class="-mr-1">
                                                                <input type='submit' :disabled="form.processing"
                                                                       class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100"
                                                                       value='Gönder'>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                            <div v-bind:class="{'hidden': openTab !== 3, 'block': openTab === 3}">
                                                <div class="grid grid-cols-1 divide-y divide-gray-200">
                                                    <div v-for="services in company.services">
                                                        {{services.service.name}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </section>
        </main>

    </MainLayout>
</template>


<script>
    import Header from "../../Components/Header.vue";
    import MainLayout from "@/Layouts/MainLayout";
    import BidNavigation from "@/Pages/Catalog/BidNavigation";
    import Badge from "@/Components/UI/Badge";


    export default {
        components: {

            Badge,
            BidNavigation,
            Header,
            MainLayout
        },
        methods: {
            toggleTabs: function (tabNumber) {
                this.openTab = tabNumber
            },
            submitComment() {
                this.form.post(route('comments.store'), {
                    errorBag: 'createComment',
                    preserveScroll: true,
                });
            }
        },
        data() {
            return {
                openTab: 1,
                form: this.$inertia.form({
                    body: '',
                    team_id: this.company.id
                })
            }
        },
        props: {
            company: [],
            partnerStatus: [],
        }
    }
</script>
