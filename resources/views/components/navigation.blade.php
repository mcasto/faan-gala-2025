<nav class="w-full bg-slate-800 text-white p-4 fixed top-0 left-0 z-50 shadow">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <span class="font-bold text-lg">Gala FAAN-tastica 2025</span>
        <div class="hidden md:flex md:items-center md:space-x-4">
            @for ($index = 0; $index < count($links); $index++)
                <a href="{{ route($links[$index]['name']) }}"
                    class="px-4 py-2 rounded bg-yellow-500 text-slate-800 font-semibold hover:bg-yellow-600 hover:text-white transition
              {{ Route::currentRouteName() === $links[$index]['name'] ? 'border-1 border-white font-bold underline' : '' }}">
                    {{ $links[$index]['title'] }}
                </a>
            @endfor

            <a href="{{ app()->getLocale() === 'en' ? '/set-language/es' : '/set-language/en' }}"
                class="px-4 py-2 rounded bg-yellow-500 text-slate-800 font-semibold hover:bg-yellow-600 hover:text-white transition ml-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-5 w-5 mr-2" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" />
                    <path stroke="currentColor" stroke-width="2"
                        d="M2 12h20M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20" />
                </svg>
                {{ app()->getLocale() === 'en' ? 'ES' : 'EN' }}
            </a>
        </div>
        <span class="md:hidden">[Hamburger]</span>
    </div>
</nav>
