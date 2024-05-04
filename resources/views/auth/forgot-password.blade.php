<x-guest-layout>
    <div class="absolute inset-x-0 top-0 h-16">
        <p class="font-bold py-24 text-4xl text-center text-white">Wachtwoord vergeten</p>
    </div>

    <div class="p-4 mb-6 border rounded-3xl bg-white flex flex-col justify-center items-center">
        {{ __('Je wachtwoord vergeten? Geen probleem. Laat ons uw e-mailadres weten en wij sturen u per e-mail een link voor het opnieuw instellen van uw wachtwoord waarmee u een nieuw wachtwoord kunt kiezen.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-text-input id="email" placeholder="email" class="block mt-1 rounded-3xl w-full placeholder:text-slate-400" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <x-primary-button class="text-white justify-center w-full inset-x-0 bottom-0 h-12 mt-4 bg-[var(--prime-color)] border-black rounded-3xl">
            {{ __('Email Password Reset Link') }}
        </x-primary-button>

    </form>
</x-guest-layout>
