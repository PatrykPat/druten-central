<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Wachtwoord aanpassen') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Zorg ervoor dat uw account een lang, willekeurig wachtwoord gebruikt om veilig te blijven.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('Huidige wachtwoord')" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block text-white rounded-xl bg-[var(--prime-color)] w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('New Password')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 text-white rounded-xl bg-[var(--prime-color)] block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 text-white rounded-xl bg-[var(--prime-color)] block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button class="text-white rounded-xl bg-[var(--prime-color)]">{{ __('Opslaan') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Opgeslagen.') }}</p>
            @endif
        </div>
    </form>
</section>
