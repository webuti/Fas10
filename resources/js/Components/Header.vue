<template>
    <div
        class="px-4 py-5 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8"
    >
        <div class="relative flex items-center justify-between">
            <div class="flex items-center">
                <logo/>
                <ul class="flex items-center hidden space-x-8 lg:flex">
                    <li>
                        <inertia-link
                            :href="route('companyCatalogMain')"
                            aria-label="Our product"
                            title="Our product"
                            class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-green-400"
                        >Şirketler
                        </inertia-link
                        >
                    </li>
                      <li>
                        <inertia-link
                            :href="route('bidCatalogMain')"
                            aria-label="Our product"
                            title="Our product"
                            class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-green-400"
                        >İlanlar
                        </inertia-link
                        >
                    </li>
                    <li>
                        <a
                            href="/career"
                            aria-label="Product pricing"
                            title="Product pricing"
                            class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-green-400"
                        >Kariyer</a
                        >
                    </li>
                </ul>
            </div>
            <ul class="flex items-center hidden space-x-8 lg:flex">

                <inertia-link v-if="$page.props.user" href="/dashboard"
                              class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-green-600 hover:bg-green-700">
                    Panelim
                </inertia-link>


                <template v-else>
                    <inertia-link :href="route('login')"
                                  class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-green-400">
                        Giriş Yap
                    </inertia-link>

                    <inertia-link :href="route('register')"
                                  class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-green-600 hover:bg-green-700">
                        Kayıt Ol
                    </inertia-link>
                </template>
            </ul>
            <div class="lg:hidden">
                <button
                    aria-label="Open Menu"
                    title="Open Menu"
                    class="p-2 -mr-1 transition duration-200 rounded focus:outline-none focus:shadow-outline hover:bg-deep-purple-50 focus:bg-deep-purple-50"
                    @click="isMenuOpen = true"
                >
                    <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
                        <path
                            fill="currentColor"
                            d="M23,13H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,13,23,13z"
                        ></path>
                        <path
                            fill="currentColor"
                            d="M23,6H1C0.4,6,0,5.6,0,5s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,6,23,6z"
                        ></path>
                        <path
                            fill="currentColor"
                            d="M23,20H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,20,23,20z"
                        ></path>
                    </svg>
                </button>
                <div v-if="isMenuOpen" class="absolute top-0 left-0 w-full">
                    <div class="p-5 bg-white border rounded shadow-sm">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <a
                                    href="/"
                                    aria-label="FAS10"
                                    title="FAS10"
                                    class="inline-flex items-center"
                                >
                                    <svg
                                        class="w-8 text-green-400"
                                        viewBox="0 0 24 24"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-miterlimit="10"
                                        stroke="currentColor"
                                        fill="none"
                                    >
                                        <rect x="3" y="1" width="7" height="12"></rect>
                                        <rect x="3" y="17" width="7" height="6"></rect>
                                        <rect x="14" y="1" width="7" height="6"></rect>
                                    </svg>
                                    <span
                                        class="ml-2 text-xl font-bold tracking-wide text-gray-800 uppercase"
                                    >FAS10</span
                                    >
                                </a>
                            </div>
                            <div>
                                <button
                                    aria-label="Close Menu"
                                    title="Close Menu"
                                    class="p-2 -mt-2 -mr-2 transition duration-200 rounded hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                    @click="isMenuOpen = false"
                                >
                                    <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
                                        <path
                                            fill="currentColor"
                                            d="M19.7,4.3c-0.4-0.4-1-0.4-1.4,0L12,10.6L5.7,4.3c-0.4-0.4-1-0.4-1.4,0s-0.4,1,0,1.4l6.3,6.3l-6.3,6.3 c-0.4,0.4-0.4,1,0,1.4C4.5,19.9,4.7,20,5,20s0.5-0.1,0.7-0.3l6.3-6.3l6.3,6.3c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3 c0.4-0.4,0.4-1,0-1.4L13.4,12l6.3-6.3C20.1,5.3,20.1,4.7,19.7,4.3z"
                                        ></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <nav>
                            <ul class="space-y-4">
                                <li>
                                    <inertia-link
                                        :href="route('companyCatalog','tekstil')"
                                        aria-label="Our product"
                                        title="Our product"
                                        class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-green-400"
                                    >Firmalar
                                    </inertia-link
                                    >
                                </li>
                                <li>
                                    <inertia-link
                                        :href="route('bidCatalog','tekstil')"
                                        aria-label="Our product"
                                        title="Our product"
                                        class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-green-400"
                                    >İlanlar
                                    </inertia-link
                                    >
                                </li>
                                <li>
                                    <a
                                        href="/career"
                                        aria-label="Product pricing"
                                        title="Product pricing"
                                        class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-green-400"
                                    >Kariyer</a
                                    >
                                </li>


                                <inertia-link v-if="$page.props.user" href="/dashboard"

                                              class="inline-flex items-center justify-center w-full h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-green-600 hover:bg-green-700 focus:shadow-outline focus:outline-none"
                                              aria-label="Kayıt ol"
                                              title="Kayıt ol"
                                >
                                    Panelim
                                </inertia-link>


                                <template v-else>

                                    <li>
                                        <inertia-link :href="route('login')"

                                                      class="inline-flex items-center justify-center w-full h-12 px-6 font-medium tracking-wide text-green-700 transition duration-200 hover:text-white rounded shadow-md bg-green-200 hover:bg-green-700 focus:shadow-outline focus:outline-none"
                                                      aria-label=" Giriş yap  "
                                                      title=" Giriş yap  "
                                        >
                                            Giriş yap
                                        </inertia-link>
                                    </li>

                                    <li>
                                        <inertia-link :href="route('register')"

                                                      class="inline-flex items-center justify-center w-full h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-green-600 hover:bg-green-700 focus:shadow-outline focus:outline-none"
                                                      aria-label="Kayıt ol"
                                                      title="Kayıt ol"
                                        >
                                            Kayıt ol
                                        </inertia-link>
                                    </li>
                                </template>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import Logo from "@/Components/UI/Logo";

    export default {
        components: {Logo},
        data() {
            return {
                moreShow: false,
                sectorMenu: false,
                solutions: false,
                mobileMenu: false,
                isMenuOpen: false,
            }
        },
        props: {

            canLogin: Boolean,
            canRegister: Boolean,
        }
    }
</script>
