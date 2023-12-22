<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.home.create') }}">
                        <x-ui.logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-3 sm:-my-px sm:ms-10 sm:flex sm:h-fit">
                    <x-ui.nav-link :href="route('admin.home.create')" :active="request()->routeIs('admin.home.create')">
                        {{ __('Home') }}
                    </x-ui.nav-link>
                    <x-ui.nav-link :href="route('admin.imageList.create')" :active="request()->routeIs('admin.imageList.*')">
                        {{ __('Image list') }}
                    </x-ui.nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-ui.form action="{{ route('admin.logout') }}">
                    <button onclick="event.preventDefault(); this.closest('form').submit();"
                        class="relative w-full flex cursor-pointer hover:text-gray-700  select-none hover:bg-gray-100/70 items-center rounded-full py-2 px-4 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="w-4 h-4 mr-2">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" x2="9" y1="12" y2="12"></line>
                        </svg>
                        <span>{{ __('Log Out') }}</span>
                    </button>
                </x-ui.form>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-ui.responsive-nav-link :href="route('admin.imageList.create')" :active="request()->routeIs('imagelist')">
                {{ __('Image list') }}
            </x-ui.responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <x-ui.form action="{{ route('admin.logout') }}">
                    <x-ui.responsive-nav-link :href="route('admin.logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-ui.responsive-nav-link>
                </x-ui.form>
            </div>
        </div>
    </div>
</nav>
