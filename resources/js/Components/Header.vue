<template>
    <div
        class="px-4 py-5 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8"
    >
        <div class="relative flex items-center justify-between">
            <div class="flex items-center">
                <logo />
                <ul class="flex items-center hidden space-x-8 lg:flex">
                    <li>
                        <inertia-link
                            :href="route('companyCatalogMain')"
                            aria-label="Şirketler"
                            title="Şirketler"
                            class="font-medium tracking-wide text-gray-700 dark:text-white transition-colors duration-200 hover:text-green-400"
                            >Şirketler
                        </inertia-link>
                    </li>
                    <li>
                        <inertia-link
                            :href="route('bidCatalogMain')"
                            aria-label="İlanlar"
                            title="İlanlar"
                            class="font-medium tracking-wide text-gray-700 dark:text-white transition-colors duration-200 hover:text-green-400"
                            >İlanlar
                        </inertia-link>
                    </li>
                    <li>
                        <a
                            href="/career"
                            aria-label="Kariyer"
                            title="Kariyer"
                            class="font-medium tracking-wide text-gray-700 dark:text-white transition-colors duration-200 hover:text-green-400"
                            >Kariyer</a
                        >
                    </li>
                </ul>
            </div>
            <ul class="flex items-center hidden space-x-8 lg:flex">
                <button
                    id="switchTheme"
                    @click="lightTheme = !lightTheme"
                    class="h-10 w-10 flex justify-center items-center focus:outline-none"
                >
                    <svg
                        v-if="lightTheme"
                        class="w-6 text-yellow-500 h-6"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        v-else
                        class="w-6 text-gray-500 h-6"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
                        />
                    </svg>
                </button>
                <inertia-link
                    v-if="$page.props.user"
                    href="/dashboard"
                    class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border rounded-lg shadow-sm text-base font-medium text-white bg-green-500 dark:bg-gray-700 hover:bg-green-700"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            strokeWidth="{2}"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </svg>
                    Panelim
                </inertia-link>

                <template v-else>
                    <inertia-link
                        :href="route('login')"
                        class="font-medium flex tracking-wide text-gray-700 dark:text-white transition-colors duration-200 hover:text-green-400"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                strokeLinecap="round"
                                strokeLinejoin="round"
                                strokeWidth="{2}"
                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>
                        Giriş Yap
                    </inertia-link>

                    <inertia-link
                        :href="route('register')"
                        class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-green-600 hover:bg-green-700"
                    >
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
                    <svg
                        class="w-5 text-gray-600 dark:text-gray-300"
                        viewBox="0 0 24 24"
                    >
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
                <div
                    v-if="isMenuOpen"
                    class="absolute top-0 z-20 left-0 w-full"
                >
                    <div
                        class="p-5 bg-white dark:bg-gray-600 border rounded shadow-sm"
                    >
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
                                        <rect
                                            x="3"
                                            y="1"
                                            width="7"
                                            height="12"
                                        ></rect>
                                        <rect
                                            x="3"
                                            y="17"
                                            width="7"
                                            height="6"
                                        ></rect>
                                        <rect
                                            x="14"
                                            y="1"
                                            width="7"
                                            height="6"
                                        ></rect>
                                    </svg>
                                    <span
                                        class="ml-2 text-xl font-bold tracking-wide text-gray-800 dark:text-white uppercase"
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
                                    <svg
                                        class="w-5 text-gray-600 dark:text-gray-300"
                                        viewBox="0 0 24 24"
                                    >
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
                                        :href="route('companyCatalogMain')"
                                        aria-label="Şirketler"
                                        title="Şirketler"
                                        class="font-medium tracking-wide text-gray-700 dark:text-white transition-colors duration-200 hover:text-green-400"
                                        >Şirketler
                                    </inertia-link>
                                </li>
                                <li>
                                    <inertia-link
                                        :href="route('bidCatalogMain')"
                                        aria-label="İlanlar"
                                        title="İlanlar"
                                        class="font-medium tracking-wide text-gray-700 dark:text-white transition-colors duration-200 hover:text-green-400"
                                        >İlanlar
                                    </inertia-link>
                                </li>
                                <li>
                                    <a
                                        href="/career"
                                        aria-label="Product pricing"
                                        title="Product pricing"
                                        class="font-medium tracking-wide text-gray-700 dark:text-white transition-colors duration-200 hover:text-green-400"
                                        >Kariyer</a
                                    >
                                </li>

                                <inertia-link
                                    v-if="$page.props.user"
                                    href="/dashboard"
                                    class="inline-flex items-center justify-center w-full h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-green-600 hover:bg-green-700 focus:shadow-outline focus:outline-none"
                                    aria-label="Kayıt ol"
                                    title="Kayıt ol"
                                >
                                    Panelim
                                </inertia-link>

                                <template v-else>
                                    <li>
                                        <inertia-link
                                            :href="route('login')"
                                            class="inline-flex items-center justify-center w-full h-12 px-6 font-medium tracking-wide text-green-700 transition duration-200 hover:text-white rounded shadow-md bg-green-200 hover:bg-green-700 focus:shadow-outline focus:outline-none"
                                            aria-label=" Giriş yap  "
                                            title=" Giriş yap  "
                                        >
                                            Giriş yap
                                        </inertia-link>
                                    </li>

                                    <li>
                                        <inertia-link
                                            :href="route('register')"
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
    components: { Logo },
    data() {
        return {
            moreShow: false,
            sectorMenu: false,
            solutions: false,
            lightTheme: false,
            mobileMenu: false,
            isMenuOpen: false,
        };
    },
    mounted() {
        if (
            localStorage.theme === "dark" ||
            (!"theme" in localStorage &&
                window.matchMedia("(prefers-color-scheme: dark)").matches)
        ) {
            this.lightTheme = true;
            document.querySelector("html").classList.add("dark");
        } else if (localStorage.theme === "dark") {
            this.lightTheme = false;
            document.querySelector("html").classList.add("dark");
        }

        document
            .getElementById("switchTheme")
            .addEventListener("click", function () {
                let htmlClasses = document.querySelector("html").classList;
                if (localStorage.theme == "dark") {
                    htmlClasses.remove("dark");
                    localStorage.removeItem("theme");
                } else {
                    htmlClasses.add("dark");
                    this.lightTheme = true;
                    localStorage.theme = "dark";
                }
            });
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
    },
};
</script>
