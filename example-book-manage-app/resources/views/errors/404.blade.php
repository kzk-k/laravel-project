<x-layouts.app title="404｜読書管理">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-10">お探しのページは一時的にアクセスができない状況にあるか、移動もしくは削除された可能性があります。<br>
                        また、URLにタイプミスがないか再度ご確認ください。
                    </p>
                    <a class="underline" href="{{ route('bookManage.index') }}">トップページに戻る</a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
