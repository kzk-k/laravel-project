<x-layouts.app title="詳細">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col gap-4 bg-gray-100 p-4 rounded-sm">
                        <div class="mb-4">
                            <x-input-label class="mb-1">タイトル</x-input-label>
                            <p class="flex-1">{{ $todo->title }}</p>
                        </div>
                        <div class="mb-4">
                            <x-input-label class="mb-1">内容</x-input-label>
                            <p class="flex-1">{{ $todo->body }}</p>
                        </div>
                    </div>
                    <div class="flex justify-between mt-4">
                        <a href="{{ route('index') }}"
                            class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">戻る</a>
                        <div class="flex gap-2 justify-end">
                            <form action="{{ route('destroy', ['id' => $todo->id]) }}" method="post">
                                <x-danger-button>削除</x-danger-button>
                                @csrf
                                @method('delete')
                            </form>
                            <a href="{{ route('edit', ['id' => $todo->id]) }}"
                                class="inline-flex items-center px-4 py-2 bg-green-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">編集</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
