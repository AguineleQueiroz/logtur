<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 whitespace-normal">
        {{ __('Esqueceu a sua senha? Fique tranquilo. Basta nos informar seu endereço de e-mail e te enviaremos por e-mail um link de redefinição de senha que permitirá que você escolha uma nova.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                          :value="old('email')" required autofocus placeholder="ex:johndoe@email.com"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="justify-center w-full rounded-md">
                {{ __('Link de redefinição de senha de e-mail') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
