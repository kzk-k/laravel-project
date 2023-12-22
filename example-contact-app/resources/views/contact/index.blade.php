<x-layouts.app title="お問い合わせ">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-form action="{{ route('contact.confirm') }}">
                        <div class="mb-5">
                            <span class="block font-medium text-sm text-gray-700 mb-1">お名前</span>
                            <input name="username" type="text" value="{{ old('username') }}"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                            <x-input-error :messages="$errors->get('username')" />
                        </div>
                        <div class="mb-5">
                            <span class="block font-medium text-sm text-gray-700 mb-1">電話番号</span>
                            <input name="tel" type="tel" value="{{ old('tel') }}"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                            <x-input-error :messages="$errors->get('tel')" />
                        </div>
                        <div class="mb-5">
                            <span class="block font-medium text-sm text-gray-700 mb-1">メールアドレス</span>
                            <input name="email" type="email" value="{{ old('email') }}"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                            <x-input-error :messages="$errors->get('email')" />
                        </div>
                        <div class="mb-5">
                            <span class="block font-medium text-sm text-gray-700 mb-1">お問い合わせの種類</span>
                            <div class="flex flex-wrap">
                                @foreach (config('const.CONTACT_TYPE') as $key => $value)
                                    <label class="flex items-center mr-4">
                                        <input type="checkbox" name="{{ 'type_' . $key }}" value="1"
                                            @checked(old('type_' . $key, 'type_' . $key) == '1')
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded">
                                        <span class="ml-2 mb-1">{{ $value }}について</span>
                                    </label>
                                @endforeach
                            </div>
                            @foreach (config('const.CONTACT_TYPE') as $key => $value)
                                <x-input-error :messages="$errors->get('type_' . $key)" />
                            @endforeach
                        </div>
                        <div class="mb-5">
                            <span class="block font-medium text-sm text-gray-700 mb-1">都道府県</span>
                            <div class="flex flex-wrap">
                                <select name="prefecture_id" class="border-gray-300 rounded">
                                    <option value='' disabled selected style='display: none;'>選択してください
                                    </option>
                                    @foreach ($prefectures as $pref)
                                        <option @selected(old('prefecture_id') == $pref->id) value="{{ $pref->id }}">
                                            {{ $pref->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <x-input-error :messages="$errors->get('prefecture_id')" />
                        </div>
                        <div class="mb-5">
                            <span class="block font-medium text-sm text-gray-700 mb-1">お知らせを受信しますか？</span>
                            <div class="flex flex-wrap">
                                <label class="flex items-center mr-4">
                                    <input type="radio" name="receive_notification"
                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded-full" value="1"
                                        @checked(old('receive_notification', '1') == '1')>
                                    <span class="ml-2 mb-1">はい</span>
                                </label>
                                <label class="flex items-center mr-4">
                                    <input type="radio" name="receive_notification"
                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded-full" value="0"
                                        @checked(old('receive_notification') == '0')>
                                    <span class="ml-2 mb-1">いいえ</span>
                                </label>
                            </div>
                            <x-input-error :messages="$errors->get('receive_notification')" />
                        </div>
                        <div class="mb-5">
                            <span class="block font-medium text-sm text-gray-700 mb-1">お問い合わせ内容</span>
                            <div class="flex flex-wrap">
                                <textarea name="contact_detail" class="w-full min-h-[200px] border-gray-300 rounded">{{ old('contact_detail') }}</textarea>
                            </div>
                            <x-input-error :messages="$errors->get('contact_detail')" />
                        </div>
                        <x-primary-button>送信する</x-primary-button>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
