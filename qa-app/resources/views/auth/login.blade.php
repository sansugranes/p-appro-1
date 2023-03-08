<x-guest-layout>
    <div>
        <a href="/" class="app-title-container">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            <span class="app-title">Connexion</span>
        </a>
    </div>

    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf

        <!-- Email Address -->
        <div class="w-full">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="" />
        </div>

        <!-- Password -->
        <div class="w-full">
            <x-input-label for="password" :value="__('Mot de passe')" />

            <x-text-input id="password" class=""
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="" />
        </div>

        <!-- Remember Me -->
        <div class="w-full">
            <label for="remember_me" class="">
                <input id="remember_me" type="checkbox" class="" name="remember">
                <span class="">{{ __('Rester connecté') }}</span>
            </label>
        </div>

        <div class="w-full flex flex-row justify-between">
            @if (Route::has('password.request'))
                <a class="basic-link flex flex-col justify-center" href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié ?') }}
                </a>
            @endif

            <button class="primary-button">
                {{ __('Se connecter') }}
            </button>
        </div>
    </form>
</x-guest-layout>
