<x-layouts.admin>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Image list') }}
            </h2>
            <x-ui.session-status :status="session('message')" />
        </div>
    </x-slot>

    <div class="py-12" id="test">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <x-ui.session-status class="mb-4" :status="session('message')" /> --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-ui.form action="{{ route('admin.imageList.store') }}">
                        <div class="flex items-end">
                            <div class="flex-1 space-y-1">
                                <x-ui.input-label for="name_ja" class="text-sm text-gray-600">新規タグ追加</x-ui.input-label>
                                <x-ui.text-input name="name_ja" class="w-full" value="{{ @old('name_ja') }}"
                                    placeholder="例）ビジネス" />
                                <x-ui.input-error :messages="$errors->get('title_ja')" />
                            </div>
                            <div class="ms-4 pb-0.5">
                                <x-ui.button type="primary" rounded="md" submit="true">追加</x-ui.button>
                            </div>
                        </div>
                    </x-ui.form>

                    <div class="mt-12">
                        <form>
                            <div class="flex items-end">
                                <div class="flex-1 space-y-1">
                                    <x-ui.input-label for="search"
                                        class="text-sm text-gray-600">画像検索</x-ui.input-label>
                                    <x-ui.text-input type="search" name="search" class="w-full"
                                        value="{{ request('search') }}" placeholder="例）タイトル、タグ名、非表示など" />
                                </div>
                                <div class="ms-4 pb-0.5">
                                    <x-ui.button type="primary" rounded="md" submit="true">検索</x-ui.button>
                                </div>
                            </div>
                        </form>
                        <table class="w-full mt-4">
                            <thead class="border-b font-medium">
                                <tr>
                                    <th class="px-6 py-4 text-left font-normal text-gray-600">ID</th>
                                    <th class="px-6 py-4 text-left font-normal text-gray-600">タイトル</th>
                                    <th class="px-6 py-4 text-left font-normal text-gray-600">タグ</th>
                                    <th class="px-6 py-4 text-left font-normal text-gray-600"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($images as $image)
                                    <tr @if (!$loop->last) class="border-b" @endif>
                                        <td class="px-6 py-4">{{ $image->id }}</td>
                                        <td class="px-6 py-4">{{ $image->title_ja }}</td>
                                        <td class="px-6 py-4">
                                            @foreach ($image->tags as $tag)
                                                {{ $tag->name_ja }}{{ !$loop->last ? ', ' : '' }}
                                            @endforeach
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex">
                                                <div class="ms-auto flex-none">
                                                    <x-ui.button tag="a"
                                                        href="{{ route('admin.imageList.edit', ['id' => $image->id]) }}"
                                                        rounded="md">編集</x-ui.button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $images->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
