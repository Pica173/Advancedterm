<x-guest-layout>
    <!-- <x-header></x-header> -->
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />


        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1 class="form__ttl-login">Login</h1>
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mt-10" :errors="$errors" />
            <!-- Email Address -->
            <div class="mt-8 text-center">
                <label>
                    <img src="img/icon-email.svg" class="inline w-7" alt="">
                    <x-input id="email" class="inline border-bottom mt-1 ml-2 h-5 font-semibold w-88" type="email" name="email" :value="old('email')" placeholder="Email" required />
                </label>
            </div>

            <!-- Password -->
            <div class="mt-6 text-center">
                <label>
                    <img src="img/icon-password.svg" class="inline w-7" alt="">
                    <x-input id="password" class="inline border-bottom mt-1 ml-2 h-5 font-semibold w-88" type="password" name="password" placeholder="Password" required autocomplete="new-password" />
                </label>
            </div>
            <div class="items-center justify-end mt-6">
                <x-button class="ml-4">
                    {{ __('ログイン') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>