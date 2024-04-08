<x-app-layout>

    <head>
        <title>Page Title</title>
    </head>
    <style>
        .nieuwscontainer {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        /* Stijl voor elk nieuwsitem */
        .nieuwsitembox {
            flex: 0 0 calc(30% - 10px);
            /* 30% breedte met wat ruimte ertussen */
            box-sizing: border-box;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
        }

        .nieuwsitembox h3 {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .nieuwsitembox h4 {
            font-size: 14px;
            margin-bottom: 5px;
        }

        /* Optioneel: Voeg wat ruimte toe tussen de nieuwsitems */
        .nieuwsitembox+.nieuwsitembox {
            margin-top: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
    </style>

    <body>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

                <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p>welkom terug {{Auth::user()->name}}</p>
                        de feedbackvragen van vandaag: <br>
                         @foreach($feedbackvragen as $vraag)
                        <!-- Een formulier voor het verwerken van het antwoord -->
                        <form method="POST" action="{{ route('verwerkantwoord') }}">
                            @csrf
                            <!-- Cross-Site Request Forgery-beveiligingstoken -->

                            <!-- Verborgen veld om de vraag-ID door te geven -->
                            <input type="hidden" name="vraag_id" value="{{ $vraag->id }}">

                            <!-- Label voor het weergeven van de vraag -->
                            <label for="antwoord">{{ $vraag->beschrijving }}</label><br>

                            <!-- Invoerveld voor het beantwoorden van de vraag -->
                            <input type="text" id="antwoord" name="antwoord" required>

                            <!-- Een schuifregelaar voor het beoordelen van de vraag -->
                            <div class="slidecontainer">
                                <p>Standaard bereikschuifregelaar:</p>
                                <input type="range" id="rating" name="rating" required min="1" max="10" value="10"
                                    oninput="updateHiddenField(this.value)">

                                <!-- Verborgen veld om de geselecteerde waarde van de schuifregelaar bij te houden -->
                                <input type="hidden" id="hiddenValue" name="hiddenValue" value="10">

                                <!-- Knop om het antwoord in te dienen -->
                                <input type="submit" value="Beantwoorden">
                            </div>
                        </form>
                        @endforeach

                        <!-- Controleren of er nieuwsitems zijn -->
                        @if(count($recentNieuws) > 0)
                        <div class="nieuwscontainer">
                            @foreach ($recentNieuws as $nieuwsitem)
                            <div class="nieuwsitembox">
                                <h3>user: @if ($nieuwsitem->gebruiker)
                                    {{ $nieuwsitem->gebruiker->name }}
                                    @else
                                    Geen gebruiker gevonden
                                    @endif</h3>
                                <h3>title: {{$nieuwsitem->title}}</h3>
                                <h4>description: {{$nieuwsitem->beschrijving}}</h4>
                                <h4>date: {{$nieuwsitem->datum}}</h4>
                                <h4>postcode: {{$nieuwsitem->postcode}}</h4>
                            </div><br>
                            @endforeach
                        </div>
                        @else
                        <p>er zijn geen nieuws en of vragen voor nu</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </body>
</x-app-layout>