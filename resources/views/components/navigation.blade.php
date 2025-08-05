<nav class="w-full bg-slate-800 text-white p-4 fixed top-0 left-0 z-50 shadow">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <span class="font-bold text-lg">Gala FAAN-tastica 2025</span>
        <div class="hidden md:flex md:items-center md:space-x-4">
            <a href="{{ route('home') }}"
                class="px-4 py-2 rounded bg-yellow-500 text-slate-800 font-semibold hover:bg-yellow-600 hover:text-white transition
                {{ Route::currentRouteName() === 'home' ? 'border-1 border-white font-bold underline' : '' }}">
                {{ __('navigation.home') }}
            </a>

            <!-- Get Involved Dropdown -->
            <div class="relative group">
                <button
                    class="px-4 py-2 rounded bg-yellow-500 text-slate-800 font-semibold hover:bg-yellow-600 hover:text-white transition flex items-center
                    {{ in_array(Route::currentRouteName(), ['sponsorship-opportunities', 'join-us', 'meet-faantastics']) ? 'border-1 border-white font-bold underline' : '' }}">
                    {{ __('navigation.get_involved') }}
                    <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div
                    class="absolute left-0 mt-2 w-64 bg-slate-800 rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                    <div class="py-2">
                        <a href="{{ route('sponsorship-opportunities') }}"
                            class="block px-4 py-2 text-white hover:bg-slate-700 transition
                            {{ Route::currentRouteName() === 'sponsorship-opportunities' ? 'bg-slate-700 font-bold' : '' }}">
                            {{ __('navigation.sponsorship') }}
                        </a>
                        <a href="{{ route('join-us') }}"
                            class="block px-4 py-2 text-white hover:bg-slate-700 transition
                            {{ Route::currentRouteName() === 'join-us' ? 'bg-slate-700 font-bold' : '' }}">
                            {{ __('navigation.join') }}
                        </a>
                        <a href="{{ route('meet-faantastics') }}"
                            class="block px-4 py-2 text-white hover:bg-slate-700 transition
                            {{ Route::currentRouteName() === 'meet-faantastics' ? 'bg-slate-700 font-bold' : '' }}">
                            {{ __('navigation.meet_faantastics') }}
                        </a>
                    </div>
                </div>
            </div>

            <a href="{{ route('auction-palooza') }}"
                class="px-4 py-2 rounded bg-yellow-500 text-slate-800 font-semibold hover:bg-yellow-600 hover:text-white transition
                {{ Route::currentRouteName() === 'auction-palooza' ? 'border-1 border-white font-bold underline' : '' }}">
                {{ __('navigation.auction') }}
            </a>

            <a href="{{ app()->getLocale() === 'en' ? '/set-language/es' : '/set-language/en' }}"
                class="px-4 py-2 rounded bg-yellow-500 text-slate-800 font-semibold hover:bg-yellow-600 hover:text-white transition ml-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-5 w-5 mr-2" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" />
                    <path stroke="currentColor" stroke-width="2"
                        d="M2 12h20M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20" />
                </svg>
                {{ __('navigation.change_language') }}
            </a>

            <a href="/admin" class="px-4 py-2 rounded text-slate-800 hover:text-white transition">
                <i class="fas fa-cog"></i>
            </a>
        </div>
        <!-- Hamburger Button -->
        <button class="md:hidden text-white focus:outline-none" onclick="toggleMobileMenu()">
            <i class="fas fa-bars text-2xl"></i>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu"
        class="md:hidden fixed inset-0 bg-slate-800 bg-opacity-95 transform translate-x-full transition-transform duration-300 ease-in-out z-40">
        <div class="flex flex-col h-full p-6">
            <!-- Close Button -->
            <button class="self-end text-white mb-8 focus:outline-none" onclick="toggleMobileMenu()">
                <i class="fas fa-times text-2xl"></i>
            </button>

            <!-- Mobile Navigation Links -->
            <div class="flex flex-col space-y-3">
                <a href="{{ route('home') }}"
                    class="px-4 py-2 rounded bg-yellow-500 text-slate-800 font-semibold hover:bg-yellow-600 hover:text-white transition text-center
                    {{ Route::currentRouteName() === 'home' ? 'border border-white font-bold' : '' }}">
                    {{ __('navigation.home') }}
                </a>

                <!-- Get Involved Section -->
                <div class="space-y-2">
                    <div class="px-4 py-2 text-yellow-400 font-semibold text-center border-b border-slate-600">
                        {{ __('navigation.get_involved') }}
                    </div>
                    <a href="{{ route('sponsorship-opportunities') }}"
                        class="px-4 py-2 rounded bg-yellow-500 text-slate-800 font-semibold hover:bg-yellow-600 hover:text-white transition text-center text-sm
                        {{ Route::currentRouteName() === 'sponsorship-opportunities' ? 'border border-white font-bold' : '' }}">
                        {{ __('navigation.sponsorship') }}
                    </a>
                    <a href="{{ route('join-us') }}"
                        class="px-4 py-2 rounded bg-yellow-500 text-slate-800 font-semibold hover:bg-yellow-600 hover:text-white transition text-center text-sm
                        {{ Route::currentRouteName() === 'join-us' ? 'border border-white font-bold' : '' }}">
                        {{ __('navigation.join') }}
                    </a>
                    <a href="{{ route('meet-faantastics') }}"
                        class="px-4 py-2 rounded bg-yellow-500 text-slate-800 font-semibold hover:bg-yellow-600 hover:text-white transition text-center text-sm
                        {{ Route::currentRouteName() === 'meet-faantastics' ? 'border border-white font-bold' : '' }}">
                        {{ __('navigation.meet_faantastics') }}
                    </a>
                </div>

                <a href="{{ route('auction-palooza') }}"
                    class="px-4 py-2 rounded bg-yellow-500 text-slate-800 font-semibold hover:bg-yellow-600 hover:text-white transition text-center
                    {{ Route::currentRouteName() === 'auction-palooza' ? 'border border-white font-bold' : '' }}">
                    {{ __('navigation.auction') }}
                </a>

                <div class="pt-4 border-t border-slate-600">
                    <a href="{{ app()->getLocale() === 'en' ? '/set-language/es' : '/set-language/en' }}"
                        class="px-4 py-3 rounded bg-yellow-500 text-slate-800 font-semibold hover:bg-yellow-600 hover:text-white transition text-center flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" />
                            <path stroke="currentColor" stroke-width="2"
                                d="M2 12h20M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20" />
                        </svg>
                        {{ __('navigation.change_language') }}
                    </a>
                </div>

                <a href="/admin" class="px-4 py-3 text-white hover:text-yellow-500 transition text-center mt-2">
                    <i class="fas fa-cog mr-2"></i>
                    Admin
                </a>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Script -->
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('translate-x-full');
            menu.classList.toggle('translate-x-0');
        }
    </script>
</nav>
