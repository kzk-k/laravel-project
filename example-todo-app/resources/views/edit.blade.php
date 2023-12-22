<x-layouts.app title="編集">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('update', ['id' => $todo->id]) }}" method="post">
                        <div class="flex flex-col gap-4 bg-gray-100 p-4 rounded-sm">
                            <div class="mb-4">
                                <x-input-label class="mb-1">タイトル</x-input-label>
                                <x-text-input class="w-full" name="title" value="{{ $todo->title }}"></x-text-input>
                            </div>
                            <div class="mb-4">
                                <x-input-label class="mb-1">内容</x-input-label>
                                <x-text-input class="w-full" name="body" value="{{ $todo->body }}"></x-text-input>
                            </div>
                        </div>
                        <div class="flex justify-between mt-4">
                            <a href="{{ route('show', ['id' => $todo->id]) }}"
                                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">戻る</a>
                            <div class="flex gap-2 justify-end">
                                <x-primary-button>送信</x-primary-button>
                                @csrf
                                @method('put')
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
