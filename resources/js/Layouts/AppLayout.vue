<template>
    <div class="bg-white dark:bg-black">
        <jet-banner/>
        <teleport to="head">
            <title>FAS10 | Panelim</title>
        </teleport>
        <nav class="bg-gray-800">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <div
                        class="flex-1 flex items-center "
                    >
                        <inertia-link
                            class="flex-shrink-0 flex items-center"
                            href="/"
                        >
                            <svg
                                class="w-8 text-white"
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
                                class="ml-2 text-lg font-bold tracking-wide text-white uppercase"
                            >FAS10</span
                            ></inertia-link
                        >

                        <div class="hidden sm:block sm:ml-6">
                            <div class="flex space-x-4">
                                <jet-nav-link
                                    :href="route('partners.tasks')"
                                    :active="route().current('partners.tasks')"
                                >
                                    İşler
                                </jet-nav-link>

                                <jet-nav-link
                                    :href="route('bids.index')"
                                    :active="route().current('bids.index')"
                                >
                                    İlanlar
                                </jet-nav-link>

                                <jet-nav-link
                                    :href="route('partners.index')"
                                    :active="route().current('partners.index')"
                                >
                                    İş Ortaklarım
                                </jet-nav-link>
                            </div>
                        </div>
                    </div>




                    <div
                        class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0"
                    >
                        <div class="relative inline-block text-left">
                            <jet-dropdown width="72" align="right">
                                <template #trigger>
                                    <span
                                        @click="newNotification = false"
                                        class="relative inline-flex rounded-md shadow-sm"
                                    >
                                        <button
                                            @click="
                                                showingNotificationDropdown = !showingNotificationDropdown
                                            "
                                            type="button"
                                            class="bg-gray-800 dark:bg-gray-600 p-1 rounded-full text-white hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                            id="options-menu"
                                            aria-expanded="true"
                                            aria-haspopup="true"
                                        >
                                            <svg
                                                class="h-6 w-6"
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                aria-hidden="true"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                                                />
                                            </svg>
                                        </button>
                                        <span
                                            v-if="newNotification"
                                            class="flex absolute h-3 w-3 top-0 right-0 -mt-1 -mr-1"
                                        >
                                            <span
                                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"
                                            ></span>
                                            <span
                                                class="relative inline-flex rounded-full h-3 w-3 bg-blue-50 dark:bg-gray-700"
                                            ></span>
                                        </span>
                                    </span>
                                </template>
                                <template #content>
                                    <h2 class="px-4 py-2">Bildirimler</h2>
                                    <div
                                        v-for="i in [2, 3, 4, 56, 7, 8]"
                                        class="block px-4 py-2 text-sm text-gray-700 dark:text-white border border-b border-gray-50 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:text-white"
                                    >
                                        <h2
                                            class="font-medium text-gray-800 dark:text-white"
                                        >
                                            title
                                        </h2>
                                        <span
                                            class="text-xs text-gray-600 dark:text-gray-300"
                                        >içerik erişle ilş title</span
                                        >
                                    </div>
                                </template>
                            </jet-dropdown>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <div class="ml-3 relative">
                                <!-- Teams Dropdown -->
                                <jet-dropdown
                                    align="right"
                                    width="60"
                                    v-if="$page.props.jetstream.hasTeamFeatures"
                                >
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-black hover:bg-gray-50 dark:bg-gray-700 hover:text-gray-700 dark:text-white focus:outline-none focus:bg-gray-50 dark:bg-gray-700 focus:text-gray-700 dark:text-white active:bg-gray-50 dark:bg-gray-700 transition ease-in-out duration-150"
                                            >
                                                {{
                                                    $page.props.user
                                                        .current_team.name
                                                }}

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <div class="w-60">
                                            <!-- Team Management -->
                                            <template
                                                v-if="
                                                    $page.props.jetstream
                                                        .hasTeamFeatures
                                                "
                                            >
                                                <div
                                                    class="block px-4 py-2 text-xs text-gray-400"
                                                >
                                                    Şirketlerim
                                                </div>

                                                <!-- Team Settings -->
                                                <jet-dropdown-link
                                                    :href="
                                                        route(
                                                            'teams.show',
                                                            $page.props.user
                                                                .current_team
                                                        )
                                                    "
                                                >
                                                    Şirket Ayarları
                                                </jet-dropdown-link>

                                                <jet-dropdown-link
                                                    :href="
                                                        route(
                                                            'availableday.set',
                                                            $page.props.user.current_team.id
                                                        )
                                                    "
                                                >
                                                    Şirket Müsaitlik tarihleri
                                                </jet-dropdown-link>

                                                <jet-dropdown-link
                                                    :href="
                                                        route('teams.create')
                                                    "
                                                    v-if="
                                                        $page.props.jetstream.canCreateTeams
                                                    "
                                                >
                                                    Yeni Şirket Oluştur
                                                </jet-dropdown-link>

                                                <div
                                                    class="border-t border-gray-100 dark:border-gray-700"
                                                ></div>

                                                <!-- Team Switcher -->
                                                <div
                                                    class="block px-4 py-2 text-xs text-gray-400"
                                                >
                                                    Şirket değiştir
                                                </div>

                                                <template
                                                    v-for="team in $page.props
                                                        .user.all_teams"
                                                    :key="team.id"
                                                >
                                                    <form
                                                        @submit.prevent="
                                                            switchToTeam(team)
                                                        "
                                                    >
                                                        <jet-dropdown-link
                                                            as="button"
                                                        >
                                                            <div
                                                                class="flex items-center"
                                                            >
                                                                <svg
                                                                    v-if="
                                                                        team.id ==
                                                                        $page
                                                                            .props
                                                                            .user
                                                                            .current_team_id
                                                                    "
                                                                    class="mr-2 h-5 w-5 text-blue-400"
                                                                    fill="none"
                                                                    stroke-linecap="round"
                                                                    stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    stroke="currentColor"
                                                                    viewBox="0 0 24 24"
                                                                >
                                                                    <path
                                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                                                    ></path>
                                                                </svg>
                                                                <div>
                                                                    {{
                                                                    team.name
                                                                    }}
                                                                </div>
                                                            </div>
                                                        </jet-dropdown-link>
                                                    </form>
                                                </template>
                                            </template>
                                        </div>
                                    </template>
                                </jet-dropdown>
                            </div>

                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative">
                                <jet-dropdown align="right" width="48">
                                    <template #trigger>
                                        <button
                                            v-if="
                                                $page.props.jetstream
                                                    .managesProfilePhotos
                                            "
                                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out"
                                        >
                                            <img
                                                class="h-8 w-8 rounded-full object-cover"
                                                :src="
                                                    $page.props.user
                                                        .profile_photo_url
                                                "
                                                :alt="$page.props.user.name"
                                            />
                                        </button>

                                        <span
                                            v-else
                                            class="inline-flex rounded-md"
                                        >
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-50 bg-white dark:bg-gray-600 hover:text-gray-700 dark:text-white focus:outline-none transition ease-in-out duration-150"
                                            >
                                                {{ $page.props.user.name }}

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <!-- Account Management -->
                                        <div
                                            class="block px-4 py-2 text-xs text-gray-400"
                                        >
                                            Hesap Yönetimi
                                        </div>

                                        <jet-dropdown-link
                                            :href="route('profile.show')"
                                        >
                                            Profilim
                                        </jet-dropdown-link>

                                        <jet-dropdown-link
                                            :href="route('api-tokens.index')"
                                            v-if="
                                                $page.props.jetstream
                                                    .hasApiFeatures
                                            "
                                        >
                                            API Erişimi
                                        </jet-dropdown-link>

                                        <div
                                            class="border-t border-gray-100 dark:border-gray-700"
                                        ></div>

                                        <!-- Authentication -->
                                        <form @submit.prevent="logout">
                                            <jet-dropdown-link as="button">
                                                Çıkış Yap
                                            </jet-dropdown-link>
                                        </form>
                                    </template>
                                </jet-dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button
                                @click="
                                    showingNavigationDropdown = !showingNavigationDropdown
                                "
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 dark:text-gray-50 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-100 focus:text-gray-500 dark:text-gray-50 transition duration-150 ease-in-out"
                            >
                                <svg
                                    class="h-6 w-6"
                                    stroke="currentColor"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex': !showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex': showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div
                :class="{
                    block: showingNavigationDropdown,
                    hidden: !showingNavigationDropdown,
                }"
                class="sm:hidden"
            >
                <div class="pt-2 pb-3 space-y-1">
                    <jet-responsive-nav-link
                        :href="route('partners.tasks')"
                        :active="route().current('partners.tasks')"
                    >
                        İşler
                    </jet-responsive-nav-link>
                </div>

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-600">
                    <div class="flex items-center px-4">
                        <div
                            v-if="$page.props.jetstream.managesProfilePhotos"
                            class="flex-shrink-0 mr-3"
                        >
                            <img
                                class="h-10 w-10 rounded-full object-cover"
                                :src="$page.props.user.profile_photo_url"
                                :alt="$page.props.user.name"
                            />
                        </div>

                        <div>
                            <div class="font-medium text-base text-gray-200">
                                {{ $page.props.user.name }}
                            </div>
                            <div class="font-medium text-sm text-gray-200">
                                {{ $page.props.user.email }}
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <jet-responsive-nav-link
                            :href="route('profile.show')"
                            :active="route().current('profile.show')"
                        >
                            Profil
                        </jet-responsive-nav-link>

                        <jet-responsive-nav-link
                            :href="route('api-tokens.index')"
                            :active="route().current('api-tokens.index')"
                            v-if="$page.props.jetstream.hasApiFeatures"
                        >
                            API Erişimi
                        </jet-responsive-nav-link>

                        <!-- Authentication -->
                        <form method="POST" @submit.prevent="logout">
                            <jet-responsive-nav-link as="button">
                                Çıkış Yap
                            </jet-responsive-nav-link>
                        </form>

                        <!-- Team Management -->
                        <template v-if="$page.props.jetstream.hasTeamFeatures">
                            <div class="border-t border-gray-600"></div>

                            <div class="block px-4 py-2 text-xs text-gray-400">
                                Şirketlerim
                            </div>

                            <!-- Team Settings -->
                            <jet-responsive-nav-link
                                :href="
                                    route(
                                        'teams.show',
                                        $page.props.user.current_team
                                    )
                                "
                                :active="route().current('teams.show')"
                            >
                                Şirket Ayarları
                            </jet-responsive-nav-link>

                            <jet-responsive-nav-link
                                :href="
                                    route(
                                        'availableday.set',
                                        $page.props.user.current_team.id
                                    )
                                "
                                :active="route().current('availableday.set')"
                            >
                                Şirket Müsaitlik tarihleri
                            </jet-responsive-nav-link>

                            <jet-responsive-nav-link
                                :href="route('teams.create')"
                                :active="route().current('teams.create')"
                            >
                                Yeni Şirket Oluştur
                            </jet-responsive-nav-link>

                            <div class="border-t border-gray-600"></div>

                            <!-- Team Switcher -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                Şirket değiştir
                            </div>

                            <template
                                v-for="team in $page.props.user.all_teams"
                                :key="team.id"
                            >
                                <form @submit.prevent="switchToTeam(team)">
                                    <jet-responsive-nav-link as="button">
                                        <div class="flex items-center">
                                            <svg
                                                v-if="
                                                    team.id ==
                                                    $page.props.user
                                                        .current_team_id
                                                "
                                                class="mr-2 h-5 w-5 text-blue-400"
                                                fill="none"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                            >
                                                <path
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                                ></path>
                                            </svg>
                                            <div>{{ team.name }}</div>
                                        </div>
                                    </jet-responsive-nav-link>
                                </form>
                            </template>
                        </template>
                    </div>
                </div>
            </div>
        </nav>

        <div class="min-h-screen bg-white  ">
            <!-- Page Heading -->

            <header
                class="border-b border-gray-200  "
                v-if="$slots.header"
            >
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot
                        class="text-3xl font-bold text-gray-900  dark:text-white"
                        name="header"
                    ></slot>
                </div>
            </header>

            <!-- Page Content -->
            <main class=" ">
                <slot></slot>
            </main>
        </div>
    </div>
</template>
<script>
    import JetApplicationMark from "@/Jetstream/ApplicationMark";
    import JetBanner from "@/Jetstream/Banner";
    import JetDropdown from "@/Jetstream/Dropdown";
    import JetDropdownLink from "@/Jetstream/DropdownLink";
    import JetNavLink from "@/Jetstream/NavLink";
    import JetResponsiveNavLink from "@/Jetstream/ResponsiveNavLink";

    export default {
        components: {
            JetApplicationMark,
            JetBanner,
            JetDropdown,
            JetDropdownLink,
            JetNavLink,
            JetResponsiveNavLink,
        },

        mounted() {


            window.Pusher.logToConsole = true;

            let pusher = new window.Pusher("6e2a4cde923cdd8b7019", {
                cluster: "eu",
            });

            let channel = pusher.subscribe("my-channel");
            channel.bind("my-event", function (data) {

                this.newNotification = true;
            });
        },
        data() {
            return {
                showingNavigationDropdown: false,
                showingNotificationDropdown: false,
                newNotification: true,
            };
        },

        methods: {
            switchToTeam(team) {
                this.$inertia.put(
                    route("current-team.update"),
                    {
                        team_id: team.id,
                    },
                    {
                        preserveState: false,
                    }
                );
            },

            logout() {
                this.$inertia.post(route("logout"));
            },
        },
    };
</script>
