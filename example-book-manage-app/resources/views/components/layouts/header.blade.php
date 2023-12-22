<header class="l-header bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto p-6">
        <div class="flex items-center gap-2">
            <a href="{{ route('bookManage.index') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
            </a>
            <p class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $title }}
            </p>
            <div class="ml-auto">
                <x-form action="{{ route('bookManage.index') }}" method="GET">
                    <div class="flex items-stretch gap-2">
                        <x-text-input name="search" type="search" />
                        <x-primary-button class="flex-none">検索</x-primary-button>
                    </div>
                </x-form>
            </div>
        </div>
    </div>
</header>
