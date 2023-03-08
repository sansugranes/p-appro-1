<x-guest-layout>
    <div>
        <a href="/" class="app-title-container">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            <span class="app-title">Inscription</span>
        </a>
    </div>

    <form class="login-form" method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="w-full">
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4 w-full">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 w-full">
            <x-input-label for="password" :value="__('Mot de passe')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 w-full">
            <x-input-label for="password_confirmation" :value="__('Confirmation')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-row w-full items-center justify-between">
            <a class="basic-link flex flex-col justify-center" href="{{ route('login') }}">
                {{ __('Déjà inscrit ?') }}
            </a>

            <button class="primary-button">
                {{ __("S'inscrire") }}
            </button>
        </div>
    </form>
</x-guest-layout>
