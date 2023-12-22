<x-layouts.app title="TOP">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                @if (session('message'))
                    <div class="bg-green-600 text-white p-4 rounded mb-12">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                    <form action="{{ route('store') }}" method="POST">
                        @csrf
                        <div class="p-4 bg-gray-100">
                            <div class="mb-4">
                                <x-input-label class="mb-1">タイトル</x-input-label>
                                <x-text-input name="title" class="w-full mr-4" />
                                <span class="text-sm text-red-600">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-4">
                                <x-input-label class="mb-1">内容</x-input-label>
                                <x-text-input name="body" class="w-full mr-4" />
                                <span class="text-sm text-red-600">
                                    @error('body')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="text-right">
                                <x-primary-button>送信</x-primary-button>
                            </div>
                        </div>
                    </form>
                    @if (count($todos))
                        <ul class="flex flex-col gap-4 mt-10 list-disc list-inside">
                            @foreach ($todos as $todo)
                                <li class="">
                                    <a href="{{ route('show', ['id' => $todo->id]) }}" class="underline">
                                        {{ $todo->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
