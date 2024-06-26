<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
            {{ __('Profiel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl ">
                    <div class="font-medium text-sm text-black">
                        <p class="font-bold pb-6 text-xl">Hallo {{ Auth::user()->name }}, je hebt {{ Auth::user()->punten }} punten</p>
                    </div>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
