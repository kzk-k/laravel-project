<x-layouts.app title="お問い合わせ 確認">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-form action="{{ route('contact.complete') }}">
                        <div class="mb-10">
                            <div class="mb-5">
                                <span class="block font-medium text-sm text-gray-700 mb-1">お名前</span>
                                {{ $username }}
                                <input value="{{ $username }}" name="username" type="hidden">
                            </div>
                            <div class="mb-5">
                                <span class="block font-medium text-sm text-gray-700 mb-1">電話番号</span>
                                {{ $tel }}
                                <input value="{{ $tel }}" name="tel" type="hidden">
                            </div>
                            <div class="mb-5">
                                <span class="block font-medium text-sm text-gray-700 mb-1">メールアドレス</span>
                                {{ $email }}
                                <input value="{{ $email }}" name="email" type="hidden">
                            </div>
                            <div class="mb-5">
                                <span class="block font-medium text-sm text-gray-700 mb-1">お問い合わせの種類</span>
                                @isset($type_design)
                                    {{ config('const.CONTACT_TYPE.design') }}
                                    <input value="{{ $type_design }}" name="type_design" type="hidden">
                                @endisset
                                @isset($type_frontend)
                                    {{ config('const.CONTACT_TYPE.frontend') }}
                                    <input value="{{ $type_frontend }}" name="type_frontend" type="hidden">
                                @endisset
                                @isset($type_backend)
                                    {{ config('const.CONTACT_TYPE.backend') }}
                                    <input value="{{ $type_backend }}" name="type_backend" type="hidden">
                                @endisset
                            </div>
                            <div class="mb-5">
                                <span class="block font-medium text-sm text-gray-700 mb-1">都道府県</span>
                                {{ $prefectureName }}
                                <input value="{{ $prefecture_id }}" name="prefecture_id" type="hidden">
                            </div>
                            <div class="mb-5">
                                <span class="block font-medium text-sm text-gray-700 mb-1">お知らせを受信しますか？</span>
                                {{ $receive_notification ? 'はい' : 'いいえ' }}
                                <input value="{{ $receive_notification }}" name="receive_notification" type="hidden">
                            </div>
                            <div class="mb-5">
                                <span class="block font-medium text-sm text-gray-700 mb-1">お問い合わせ内容</span>
                                {!! nl2br(e($contact_detail)) !!}
                                <input value="{{ $contact_detail }}" name="contact_detail" type="hidden">
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <x-secondary-button name="action" value="back" type="submit">修正する</x-secondary-button>
                            <x-primary-button name="action" value="submit">送信する</x-primary-button>
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
