<x-app-layout>

<x-slot name="header" class="bg-transparent">
        <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
            {{ __('feedbackvraag antwoorden') }}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-end"></div>
                    <ul role="list" class="divide-y divide-gray-100">
                        @foreach ($vragen as $vraag)
                            @if ($vraag->user_userid == auth()->id())
                                @foreach ($antwoorden as $antwoord)
                                    @if ($antwoord->Vragen_idVragen == $vraag->id)
                        <!-- Een lijstitem voor de weergave van vraag en bijbehorend antwoord -->
                        <li class="flex justify-between gap-x-6 py-5">
                            <!-- Gedeelte voor vraaginformatie -->
                            <div class="flex min-w-0 gap-x-4">
                                <div class="min-w-0 flex-auto">
                                    <!-- Weergave van de vraagtitel -->
                                    <p class="text-sm leading-6 text-gray-900">Vraag: {{ $vraag->title }} </p></br>
                                </div>
                            </div>
                            <div class="flex min-w-0 gap-x-4">
                                <div class="min-w-0 flex-auto">
                                    <!-- Weergave van de vraagtitel -->
                                    <p class="text-sm leading-6 text-gray-900">komt van: {{ Auth::user()->name}} </p>
                                    </br>
                                </div>
                            </div>
                            <!-- Gedeelte voor antwoordinformatie -->
                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                <!-- Weergave van gebruikersantwoord en gebruikers-ID -->
                                <p class="text-sm leading-6 text-gray-900">{{ $antwoord->gebruiker->name }} zegt: {{
                                    $antwoord->antwoord }}</p></br>
                            </div>
                            <!-- Gedeelte voor beoordelingsinformatie -->
                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                <!-- Weergave van de beoordeling (positief/negatief) -->
                                <p class="text-sm leading-6 text-gray-900">Rating:
                                    @if ($antwoord->rating > 5)
                                    <span class="text-sm leading-6 text-gray-900">Positief</span>
                                    @else
                                    <span class="text-sm leading-6 text-gray-900">Negatief</span>
                                    @endif
                                </p>
                            </div>
                        </li>
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>