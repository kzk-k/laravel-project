<x-layouts.app title="読書管理">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('message'))
                <div class="bg-green-600 text-white p-4 rounded mb-12">
                    {{ session('message') }}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center">
                        @unless (url()->current() === route('bookManage.index'))
                            <a href="{{ route('bookManage.index') }}"
                                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 whitespace-nowrap">トップに戻る</a>
                        @endunless
                        <div class="ml-auto">
                            <a href="{{ route('bookManage.create') }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 whitespace-nowrap">新規作成</a>
                        </div>
                    </div>

                    @if ($books->isEmpty())
                        <p class="my-10 text-center">まだ登録がありません。</p>
                    @else
                        <table class="w-full text-left">
                            <thead>
                                <tr>
                                    <td class="px-6 py-4">No.</td>
                                    <th class="px-6 py-4 font-normal">タイトル</th>
                                    <td class="px-6 py-4">ジャンル</td>
                                    <td class="px-6 py-4"></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr class="border-t border-neutral-100">
                                        <td class="px-6 py-4">{{ $book->id }}</td>
                                        <th class="px-6 py-4 font-normal">{{ $book->title }}</th>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('bookManage.genre', ['genre' => $book->genre]) }}"
                                                class="underline">
                                                {{ $book->genre }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-right">
                                                <a href="{{ route('bookManage.show', ['id' => $book->id]) }}"
                                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 whitespace-nowrap">詳細</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
            <div class="my-10">
                {{ $books->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</x-layouts.app>
