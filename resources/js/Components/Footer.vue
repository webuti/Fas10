<template>
    <div class="px-4 pt-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
        <div class="grid gap-10 row-gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-4">
            <div class="sm:col-span-2">
                <logo/>
                <div class="mt-6 lg:max-w-sm">
                    <p class="text-sm text-gray-800 dark:text-white">
                        Teknolojiyi fayda odaklı kullanmak üzere özenle oluşturulmuştur.
                    </p>

                </div>
            </div>
            <div class="space-y-2 text-sm">
                <p class="text-base font-bold tracking-wide text-gray-900 dark:text-white">İletişim</p>
                <div class="flex">
                    <p class="mr-1 text-gray-800 dark:text-white">Telefon:</p>
                    <a href="tel:850-123-5021" aria-label="Telefon" title="Telefon"
                       class="transition-colors duration-300 text-blue-400 hover:text-deep-purple-800">888-555-0087</a>
                </div>
                <div class="flex">
                    <p class="mr-1 text-gray-800 dark:text-white">Eposta:</p>
                    <a href="mailto:info@fas10.net" aria-label="E-Posta" title="E-Posta"
                       class="transition-colors duration-300 text-blue-400 hover:text-deep-purple-800">info@fas10.net</a>
                </div>
            </div>
            <div>
                <span class="text-base font-bold tracking-wide text-gray-900 dark:text-white">Sosyal Medya</span>
                <div class="flex items-center mt-1 space-x-3">
                    <a href="/" class="text-gray-500 dark:text-gray-50 transition-colors duration-300 hover:text-blue-400">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                            <path
                                d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z"
                            ></path>
                        </svg>
                    </a>
                    <a href="/" class="text-gray-500 dark:text-gray-50 transition-colors duration-300 hover:text-blue-400">
                        <svg viewBox="0 0 30 30" fill="currentColor" class="h-6">
                            <circle cx="15" cy="15" r="4"></circle>
                            <path
                                d="M19.999,3h-10C6.14,3,3,6.141,3,10.001v10C3,23.86,6.141,27,10.001,27h10C23.86,27,27,23.859,27,19.999v-10   C27,6.14,23.859,3,19.999,3z M15,21c-3.309,0-6-2.691-6-6s2.691-6,6-6s6,2.691,6,6S18.309,21,15,21z M22,9c-0.552,0-1-0.448-1-1   c0-0.552,0.448-1,1-1s1,0.448,1,1C23,8.552,22.552,9,22,9z"
                            ></path>
                        </svg>
                    </a>
                    <a href="/" class="text-gray-500 dark:text-gray-50 transition-colors duration-300 hover:text-blue-400">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                            <path
                                d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z"
                            ></path>
                        </svg>
                    </a>
                </div>

            </div>
        </div>
        <div class="flex flex-col-reverse justify-between pt-5 pb-10 border-t dark:border-gray-600 lg:flex-row">
            <p class="text-sm text-gray-600  dark:text-gray-300">
                © Copyright 2021 | Tüm hakları saklıdır.
            </p>
            <ul class="flex flex-col mb-3 space-y-2 lg:mb-0 sm:space-y-0 sm:space-x-5 sm:flex-row">

                <li>
                    <a href="/privacy-policy"
                       class="text-sm text-gray-600  dark:text-gray-300 transition-colors duration-300 hover:text-blue-400">Gizlilik
                        polikamız</a>
                </li>
                <li>
                    <a href="/terms-of-service"
                       class="text-sm text-gray-600  dark:text-gray-300 transition-colors duration-300 hover:text-blue-400">Kullanım
                        şartları</a>
                </li>
            </ul>
        </div>

        <!-- <section id="bottom-navigation" class="md:hidden block fixed inset-x-0 bottom-0 z-10 bg-white dark:bg-gray-600 shadow"> // if shown only tablet/mobile-->
        <section id="bottom-navigation" class="md:hidden  block fixed inset-x-0 bottom-0 z-10 bg-white dark:bg-gray-600 shadow">
            <div id="tabs" class="flex justify-between">
                <inertia-link href="/"
                              class="w-full focus:text-blue-500 hover:text-blue-500 justify-center inline-block text-center pt-2 pb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 inline-block mb-1" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span class="tab tab-home block text-xs">Ana Sayfa</span>
                </inertia-link>
                <inertia-link :href="route('companyCatalogMain')"
                              class="w-full focus:text-blue-500 hover:text-blue-500 justify-center inline-block text-center pt-2 pb-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 inline-block mb-1" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                              d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <span class="tab tab-kategori block text-xs">Şirketler</span>
                </inertia-link>
                <inertia-link
                    :href="route('bidCatalogMain')"
                    class="w-full focus:text-blue-500 hover:text-blue-500 justify-center inline-block text-center pt-2 pb-1">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 inline-block mb-1" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                              d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                    </svg>

                    <span class="tab tab-explore block text-xs">İlanlar</span>
                </inertia-link>
                <inertia-link href="/dashboard"
                              class="w-full focus:text-blue-500 hover:text-blue-500 justify-center inline-block text-center pt-2 pb-1">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 inline-block mb-1" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                              d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>

                    <span class="tab tab-account block text-xs">Hesabım</span>
                </inertia-link>
            </div>
        </section>
    </div>
</template>

<script>
    /*route().current('bids.index')*/
    import Logo from "@/Components/UI/Logo";

    export default {
        name: "Footer",
        components: {Logo}
    }
</script>

<style scoped>

</style>
