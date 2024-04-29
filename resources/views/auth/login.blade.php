<x-guest-layout>
<div class="absolute inset-x-0 top-0 h-16">
    <p class="font-bold py-24 text-4xl text-center text-white">login</p>
</div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST"  action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <!-- <x-input-label for="email" :value="__('Email')" /> -->
            <x-text-input placeholder="Email..." id="email" class="block mt-1 rounded-3xl w-full placeholder:text-slate-400" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <!-- <x-input-label for="password" :value="__('Password')" /> -->
            <x-text-input placeholder="Wachtwoord..." id="password" class="block mt-1 rounded-3xl w-full placeholder:text-slate-400"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4 flex flex-col">
            <div class="flex flex-col items-center">
                <x-primary-button class="text-white justify-center w-full relative inset-x-0 bottom-0 h-12 bg-[var(--prime-color)] border-black rounded-3xl">
                    {{ __('Login') }}
                </x-primary-button>

                <div class="w-full mt-3 flex justify-between">

                    <a class="underline text-sm text-gray-600 py-4 text-white rounded-md focus:outline-none " href="{{ route('register') }}">
                        {{ __('Nog geen account?') }}
                    </a>

                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 py-4 text-white rounded-md focus:outline-none " href="{{ route('password.request') }}">
                            {{ __('Wachtwoord vergeten?') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>
