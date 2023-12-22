<x-layouts.app title="詳細｜読書管理">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('message'))
                <div class="bg-green-600 text-white p-4 rounded mb-12">
                    {{ session('message') }}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex gap-8">
                        <p class="">No：{{ $book->id }}</p>
                        <p class="">ジャンル：{{ $book->genre }}</p>
                    </div>
                    <div class="mt-8">
                        <div class="mt-4">
                            <span class="text-sm text-gray-600">本のタイトル</span>
                            <p class="">{{ $book->title }}</p>
                        </div>
                        <div class="mt-4">
                            <span class="text-sm text-gray-600">感想</span>
                            <p class="">{{ $book->body }}</p>
                        </div>
                        <div class="mt-10 flex justify-between">
                            <a href="{{ $prevUrl }}"
                                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 whitespace-nowrap">戻る</a>
                            <div class="flex gap-4">
                                <a href="{{ route('bookManage.edit', ['id' => $book->id]) }}"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 whitespace-nowrap">編集</a>
                                <x-form method="DELETE" action="{{ route('bookManage.destroy', ['id' => $book->id]) }}">
                                    <x-danger-button>削除</x-danger-button>
                                </x-form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
