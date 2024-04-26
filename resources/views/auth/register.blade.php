<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <!-- <x-input-label for="name" :value="__('Name')" /> -->
            
            <x-text-input id="name" placeholder="gebruiksnaam..." class="block mt-1 rounded-3xl w-full placeholder:text-slate-400" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <!-- <x-input-label for="email" :value="__('Email')" /> -->
            <x-text-input id="email"  placeholder="Email..." class="block mt-1 rounded-3xl w-full placeholder:text-slate-400" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <!-- <x-input-label for="password" :value="__('Password')" /> -->

            <x-text-input id="password" placeholder="Wachtwoord..." class="block mt-1 rounded-3xl w-full placeholder:text-slate-400"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <!-- <x-input-label for="password_confirmation" :value="__('Confirm Password')" /> -->

            <x-text-input id="password_confirmation" placeholder=" Herhaal wachtwoord..." class="block mt-1 rounded-3xl w-full placeholder:text-slate-400"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="block mt-4 flex flex-col">
            <x-primary-button class="text-white justify-center w-full relative inset-x-0 bottom-0 h-12 bg-[var(--prime-color)] border-black rounded-3xl">
                {{ __('Registreer') }}
            </x-primary-button>

            <a class="underline text-sm text-gray-600 py-4 text-white hover:text- rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Al geregistreerd?') }}
            </a>

            
        </div>
    </form>
</x-guest-layout>
