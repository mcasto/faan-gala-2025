<div x-data="{ open: false }" class="relative">
    <button @click="open = !open" class="flex items-center gap-1">
        <span class="fi fi-{{ $currentLocale === 'es' ? 'es' : 'gb' }}"></span>
        {{ strtoupper($currentLocale) }}
    </button>

    <div x-show="open" @click.away="open = false"
        class="absolute right-0 mt-2 w-20 bg-white rounded-md shadow-lg py-1 z-10">
        @foreach ($availableLocales as $locale)
            @if ($locale !== $currentLocale)
                <a href="{{ route('language.set', $locale) }}"
                    class="px-4 py-2 text-sm hover:bg-gray-100 flex items-center gap-2">
                    <span class="fi fi-{{ $locale === 'es' ? 'es' : 'gb' }}"></span>
                    {{ strtoupper($locale) }}
                </a>
            @endif
        @endforeach
    </div>
</div>
