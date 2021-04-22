<template>

    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
                Müsaitlik olan tarihler
            </h2>
        </template>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">


            <div class="flex flex-col">
                <litepie-datepicker
                    :disable-date="dDate"
                    placeholder="Tarih aralığı seçiniz"
                    :disable-in-range="false"
                    :formatter="formatter"
                    ref="myRef"
                    :options="options"
                    v-model="dateValue"
                ></litepie-datepicker>


                <div v-if="dateValue.startDate"
                     class="bg-blue-50 dark:bg-gray-700 rounded-md shadow  text-white border-gray-300 flex flex-col space-y-3 items-center text-center p-3 mt-10">
                    <div>{{dateValue.startDate}} ve {{dateValue.endDate}} arasında müsait olduğunuzu belirttiniz
                        onaylıyormusunuz ?
                    </div>

                    <inertia-link :href="route('availableDay.store')"
                                  :data="{team_id :teamId,startDate:dateValue.startDate,endDate:dateValue.endDate}"
                                  method="post"
                                  as="button"
                                  type="button"
                                  class="border border-blue-400  bg-blue-200 text-blue-600 px-2 font-bold   flex rounded-full text-sm items-center  ">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fillRule="evenodd"
                                  d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                  clipRule="evenodd"/>
                        </svg>
                        Onayla
                    </inertia-link>

                </div>


                <div class="days">

                    <ul class="space-y-1 mt-1">
                        <li class="bg-white dark:bg-gray-600 border border-gray-300 shadow flex p-3  rounded-md justify-between"
                            v-for="item in dates.data">
                            <div class="justify-between items-center  space-x-1 flex">       <span
                                class="border border-blue-400  bg-blue-200 text-blue-600 px-2 font-bold   flex rounded-full text-sm items-center  ">
                            Müsait</span>
                                <h2 class="text-sm">{{item.date}}</h2>
                            </div>
                            <inertia-link :href="route('availableDay.destroy', item)"
                                          :data="item"
                                          method="DELETE"
                                          as="button"
                                          type="button"
                                          title="Sil"

                                       >


                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 text-red-300"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </inertia-link>


                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </app-layout>
</template>

<script>
    import LitepieDatepicker from 'litepie-datepicker';
    import AppLayout from "@/Layouts/AppLayout";
    import {ref} from 'vue';


    export default {
        name: "availableDaysIndex",
        components: {
            AppLayout,
            LitepieDatepicker
        },
        methods: {
            deleteDate(date) {
                axios.delete(route('availableDay.destroy', date)).then(e => {
                    console.log(e);
                });
            }
        },
        props: ['teamId', 'dates'],
        data() {

            const options = ref({
                shortcuts: {
                    today: 'Bugün',
                    yesterday: 'Yarın',
                    past: period => 'Geçmiş ' + period + ' gün ',
                    currentMonth: 'Bu ay',
                    pastMonth: 'Geçen ay'
                },
                footer: {
                    apply: 'Onayla',
                    cancel: 'İptal'
                }
            });


            const formatter = ref({
                date: 'YYYY-MM-DD',
                month: "MM"
            })
            const dDate = (date) => {
                return date < new Date() || date > new Date(2023, 0, 8);
            }
            const myRef = ref(null);
            const dateValue = ref({
                startDate: '',
                endDate: ''
            });
            return {
                dDate,
                options,
                formatter,
                myRef,
                dateValue,
            }
        }
    }
</script>

<style scoped>

</style>
