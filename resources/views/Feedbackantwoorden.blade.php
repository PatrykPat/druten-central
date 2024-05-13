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
                                @php
                                    $totalRating = 0;
                                    $answerCount = 0;
                                @endphp
                                @foreach ($antwoorden as $antwoord)
                                    @if ($antwoord->Vragen_idVragen == $vraag->id) 
                                        <p>{{ $antwoord->gebruiker->name }} zegt: {{ $antwoord->antwoord }}<br>
                                            Rating: {{ $antwoord->rating }}
                                            @if ($antwoord->rating > 5)
                                                <span class="text-sm leading-6 font-bold text-green-400">Positief</span>
                                            @else
                                                <span class="text-sm leading-6 font-bold text-red-400">Negatief</span>
                                            @endif
                                            <br><br>
                                        </p>
                                        @php
                                            $totalRating += $antwoord->rating;
                                            $answerCount++;
                                        @endphp
                                    @endif
                                @endforeach
                                @if ($answerCount > 0)
                                    Gemiddelde : {{ round($totalRating / $answerCount, 0) }}
                                @endif
                            </p>
                        </div>
                        <div>
                        <div class="gap-8 sm:grid sm:grid-cols-2">
    <div class="flex">
        <dl class="p-10">
            <dt class="text-sm font-bold text-red-400 dark:text-red-400">Negatief</dt>
            <dd class="flex items-center mb-3">
                <div class="flex flex-col flex-nowrap justify-end w-2 h-32 bg-red-400 rounded-full overflow-hidden dark:bg-red-700" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                    <div class=" overflow-hidden bg-green-500" style="height: {{ round($totalRating / $answerCount)}}0%"></div>
                </div>
            </dd>
            <dt class="text-sm font-bold text-gray-500 dark:text-green-400">Positief</dt>
        </dl>
    </div>
</div>
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