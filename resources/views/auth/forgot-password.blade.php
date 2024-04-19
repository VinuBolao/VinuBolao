<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" class="flex items-center justify-center py-4">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 dark:text-slate-500">
            {{ __('Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail e enviaremos a você um link de redefinição de senha por e-mail que permitirá que você escolha uma nova senha.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Enviar Link de Redefinição') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
