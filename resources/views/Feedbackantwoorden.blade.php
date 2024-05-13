<x-app-layout>

<x-slot name="header" class="bg-transparent">
        <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
            {{ __('feedbackvraag antwoorden') }}
        </h2>
    </x-slot>
    <!-- voor elke vraag die geplaats is door specifiek een bedrijf krijg je de vragen die horen bij het bedrijf waarop je bent ingelogged,
    zodat je niet een andere bedrijf zijn vragen en antwoorden krijgt tezien. -->
    @foreach ($vragen as $vraag)
        @if ($vraag->user_userid == auth()->id())
                        
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">               
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
                            <div class="">
                                <h2>Gebruikers reactie:</h2>
                                <!-- Een loop om de antwoorden bij een vraag te krijgen zodat je niet onder 1 vraag de antwoorden van een andere vraag krijgt.  -->
                                <p class="text-sm leading-6 text-gray-900">
                                    @foreach ($antwoorden as $antwoord)
                                        @if ($antwoord->Vragen_idVragen == $vraag->id) <p >{{ $antwoord ->gebruiker->name }}
                                        
                                        zegt: {{ $antwoord->antwoord }}<br>
                                        Rating:
                                        @if ($antwoord->rating > 5)
                                            <span class="text-sm leading-6 font-bold text-green-400">Positief</span>
                                            @else
                                            <span class="text-sm leading-6 font-bold text-red-400">Negatief</span>
                                            @endif
                                            <br><br>
                                        @endif
                                    @endforeach
                                </p></br>
                            </div>
                            <div class="flex min-w-0 gap-x-4">
                                <div class="min-w-0 flex-auto">
                                    <!-- Weergave van de vraagtitel -->
                                    <!-- {{ dump($vraag) }} -->
                                    <p class="text-sm leading-6 text-gray-900">begon op: {{ $vraag->Begindatum }} </p>
                                    <p class="text-sm leading-6 text-gray-900">eindigt op: {{ $vraag->Einddatum }} </p>
                                </div>
                            </div>               
                </div>
            </div>
        </div>
    </div>
@endif
@endforeach

</x-app-layout>