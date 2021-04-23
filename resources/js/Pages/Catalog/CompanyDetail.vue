<template>
    <MainLayout :title="company.name">


        <div class="flex items-center   justify-between">
            <div>
                <h2 class="text-4xl sm:text-md xs:text-md text-gray-800 dark:text-white mb-2 font-semibold font-heading">{{company.name}}</h2>
                <div class="buttons">
                    <inertia-link method="post"
                                  as="button"
                                  type="button" v-if="partnerStatus.status == 1"
                                  class="border border-gray-200  hover:text-blue-500 hover:border-blue-500 flex  p-1 px-2 text-sm font-medium rounded-md items-center  ">
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
                                  class="border border-gray-200 hover:text-blue-500 hover:border-blue-500 flex  p-1 px-2 text-sm font-medium rounded-md items-center  ">
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
                                  class="border border-gray-200 hover:text-blue-500 hover:border-blue-500 flex  p-1 px-2 text-sm font-medium rounded-md items-center  ">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8  " viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fillRule="evenodd"
                                  d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                  clipRule="evenodd"/>
                        </svg>
                        İş Ortaklarıma ekle
                    </inertia-link>

                </div>


            </div>

            <a href="#" @click="back()" class="text-blue-600 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                          d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Geri</a>

        </div>


        <div class="border border-gray-200 mt-5 mb-5 p-10 rounded-md">

            <h2 class="text-lg">Şirket Hakkında</h2>

            <div class="mb-8 text-gray-400 leading-relaxed">
                {{company.description}}.
            </div>
            <table class="w-full mb-6">
                <tbody>
                <tr class="border-t">
                    <td class="py-3 text-gray-500 dark:text-gray-50">Çalışan Sayısı</td>
                    <td class="text-right">{{company.number_of_staff}}</td>
                </tr>
                <tr class="border-t" v-if="company.country">
                    <td class="py-3 text-gray-500 dark:text-gray-50">Ülke</td>
                    <td class="text-right">{{company.country.name}}</td>
                </tr>
                <tr class="border-t" v-if="company.city">
                    <td class="py-3 text-gray-500 dark:text-gray-50">Şehir</td>
                    <td class="text-right">{{company.city.name}} /
                        {{company.district_id}}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="border border-gray-200 mt-5 mb-5 p-10 rounded-md">

            <h2 class="mb-4 text-lg">Şirket Yorumları</h2>


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
                        class=" text-gray-400 text-xs">{{comment.created_at }}</span>
                        <p class="text-sm">
                            {{comment.body }}
                        </p>

                    </div>
                </div>

            </div>

            <form @submit.prevent="submitComment()"
                  class="w-full  bg-white dark:bg-gray-600 rounded-lg  ">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <h2 class="px-4 pt-3 pb-2 text-gray-800 dark:text-white text-lg">
                        {{company.name}} hakkındaki yorumlarınız</h2>
                    <div class="w-full md:w-full px-3 mb-2 mt-2">
                                                            <textarea
                                                                class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white dark:bg-gray-600"
                                                                name="body" placeholder='Mesajınız' v-model="form.body"
                                                                required></textarea>
                        <div v-if="form.errors.body">{{ form.errors.body }}</div>

                    </div>
                    <div class="w-full md:w-full flex items-start md:w-full px-3">
                        <div
                            class="flex items-start w-1/2 text-gray-700 dark:text-white px-2 mr-auto">

                        </div>
                        <div class="-mr-1">
                            <input type='submit' :disabled="form.processing"
                                   class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700"
                                   value='Gönder' />
                        </div>
                    </div>
                </div>
            </form>
        </div>

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
            },
            back() {
                window.history.back();

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
