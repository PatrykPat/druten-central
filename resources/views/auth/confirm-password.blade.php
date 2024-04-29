<x-guest-layout>
    <div class="absolute inset-x-0 top-0 h-16">
        <p class="font-bold py-24 text-4xl text-center text-white">Bevestig wachtwoord</p>
    </div>
    
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Dit is een beveiligd gedeelte van de applicatie. Bevestig uw wachtwoord voordat u doorgaat.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
