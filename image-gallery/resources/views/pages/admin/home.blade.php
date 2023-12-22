<x-layouts.admin>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-ui.form action="{{ route('admin.home.store') }}" enctype='multipart/form-data'>
                        <div class="space-y-6">
                            <input class="" type="file" name="image">
                            <div class="space-y-1">
                                <x-ui.input-label for="title_ja" class="text-sm text-gray-600">画像タイトル</x-ui.input-label>
                                <x-ui.text-input name="title_ja" class="w-full" value="{{ @old('title_ja') }}"
                                    id="title_ja" placeholder="例）XXがXXしている画像" />
                                <x-ui.input-error :messages="$errors->get('title_ja')" />
                            </div>
                            <div class="space-y-1">
                                <p class="block text-sm font-medium leading-5 text-gray-700">タグ</p>
                                <div class="flex flex-wrap gap-4">
                                    @foreach ($tags as $tag)
                                        <x-ui.checkbox label="{{ $tag->name_ja }}" value="{{ $tag->id }}"
                                            id="tag-{{ $tag->id }}" name="tags[]" />
                                    @endforeach
                                </div>
                            </div>
                            <div class="space-y-1">
                                <p class="block text-sm font-medium leading-5 text-gray-700">初期表示</p>
                                <div class="flex gap-6">
                                    <x-ui.radio label="表示" id="image_is_show" name="is_hidden" value="0"
                                        checked />
                                    <x-ui.radio label="非表示" id="image_is_hidden" name="is_hidden" value="1" />
                                </div>
                            </div>
                        </div>
                        <div class="w-fit mt-12">
                            <x-ui.button type="primary" submit="true">送信</x-ui.button>
                        </div>
                    </x-ui.form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
