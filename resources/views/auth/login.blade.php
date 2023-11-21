<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" class="grid place-content-center">
                <x-application-logo class="w-60 h-60 fill-slate-400" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-input-label for="username" :value="__('Usuário')" class="dark:text-slate-300" />

                <x-text-input id="username" class="block mt-1 w-full dark:bg-slate-800 dark:text-slate-300" type="text" name="username" :value="old('username')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Senha')" class="dark:text-slate-300" />

                <x-text-input id="password" class="block mt-1 w-full dark:bg-slate-800 dark:text-slate-300" type="password" name="password" required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-slate-800" name="remember">
                    <span class="ml-2 text-sm text-gray-600 dark:text-slate-400">{{ __('Lembrar-me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
{{--                @if (Route::has('password.request'))--}}
{{--                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
{{--                        {{ __('Esqueceu sua senha?') }}--}}
{{--                    </a>--}}
{{--                @endif--}}

                <x-primary-button class="w-full justify-center dark:bg-slate-900">
                    {{ __('Entrar') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
