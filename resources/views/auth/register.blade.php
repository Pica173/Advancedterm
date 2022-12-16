<x-guest-layout>
    <!-- <x-header></x-header> -->
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>


        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h1 class="form__ttl">Registration</h1>
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mt-10" :errors="$errors" />
            <!-- Name -->
            <div class="mt-10 text-center">
                <label>
                    <img src="img/icon-user.svg" class="inline w-7" alt="">
                    <x-input id="name" class="inline border-bottom ml-2 mt-1 h-5 font-semibold w-88" type="text" name="name" :value="old('name')" placeholder="Username" required />
                </label>
            </div>

            <!-- Email Address -->
            <div class="mt-6 text-center">
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
                    {{ __('登録') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>