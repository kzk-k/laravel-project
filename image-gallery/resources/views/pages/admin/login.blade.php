<x-layouts.main>
    <div class="flex flex-col items-stretch justify-center w-screen min-h-screen py-10 sm:items-center">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <x-ui.logo class="w-auto h-10 mx-auto text-gray-700 fill-current" />
            <h2 class="mt-1 mb-5 text-2xl font-extrabold leading-9 text-center text-gray-800">{{ __('Log in') }}</h2>
            <div class="px-10 py-0 sm:py-8 sm:shadow-sm sm:bg-white sm:border sm:rounded-lg border-gray-200/60">
                <x-ui.form action="{{ route('admin.login') }}">
                    <div class="space-y-8">
                        <x-ui.input :label="__('Email')" type="email" id="email" name="email" />
                        <x-ui.input :label="__('Password')" type="password" id="password" name="password" />
                        <div class="flex items-center justify-end">
                            <div>
                                <x-ui.button type="primary" rounded="md"
                                    submit="true">{{ __('Log in') }}</x-ui.button>
                            </div>
                        </div>
                    </div>
                </x-ui.form>
            </div>
        </div>
    </div>
</x-layouts.main>
