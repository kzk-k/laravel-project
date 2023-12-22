<x-layouts.app title="新規作成｜読書管理">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('message'))
                <div class="bg-green-600 text-white p-4 rounded mb-12">
                    {{ session('message') }}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-form action="{{ route('bookManage.store') }}">
                        <div class="mt-4">
                            <span class="text-sm text-gray-600">ジャンル</span>
                            <x-text-input name="genre" class="w-full" value="{{ @old('genre') }}" />
                            <x-input-error :messages="$errors->get('genre')" />
                        </div>
                        <div class="mt-4">
                            <span class="text-sm text-gray-600">本のタイトル</span>
                            <x-text-input name="title" class="w-full" value="{{ @old('title') }}" />
                            <x-input-error :messages="$errors->get('title')" />
                        </div>
                        <div class="mt-4">
                            <span class="text-sm text-gray-600">感想</span>
                            <textarea name="body" class="w-full min-h-[200px] border-gray-300 rounded-md" value="@old('body')">{{ @old('body') }}</textarea>
                            <x-input-error :messages="$errors->get('body')" />
                        </div>
                        <div class="mt-10 flex gap-4">
                            <a href="{{ $prevUrl }}"
                                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 whitespace-nowrap">戻る</a>
                            <x-primary-button>登録</x-primary-button>
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
