<x-app-layout>

<x-slot name="header" class="bg-transparent">
        <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
            {{ __('Meerkeuzevragen') }}
        </h2>
    </x-slot>
    <body>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Maak meerkeuzevraag') }}
                </h2>
            </x-slot>
            <div class="alert alert-error">
                {{ session('error') }}
            </div>

            <div class="p-4 mb-6 border rounded-3xl bg-white flex flex-col justify-center items-center">
                <form method="POST"  action="{{ route('verwerk_vraag') }}">
                @csrf

                    <label for="vraag">Vraag:</label>
                        <input type="text" id="vraag" name="vraag" required>
                        <br>
                        <label for="opties">vink het juiste antwoord(en) aan. voer hier de opties in:</label>

                        <div id="opties-container">
                            <div class="optie">
                                <input type="text" name="opties[0][tekst]" required>
                                <input type="checkbox" name="opties[0][is_correct]" value="1">
                            </div>
                            <div class="optie">
                                <input type="text" name="opties[1][tekst]" required>
                                <input type="checkbox" name="opties[1][is_correct]" value="1">
                            </div>
                            <div class="optie">
                                <input type="text" name="opties[2][tekst]" required>
                                <input type="checkbox" name="opties[2][is_correct]" value="1">
                            </div>
                            <div class="optie">
                                <input type="text" name="opties[3][tekst]" required>
                                <input type="checkbox" name="opties[3][is_correct]" value="1">
                            </div>
                        </div>
                    <label for="punten">hoeveel punten moet de gebruiker krijgen:</label>

                    <input type="number" id="punten" name="punten" required><br>
                    <input type="submit" value="Verstuur">
                </form>
            </div>
        </body>
    </html>
</x-app-layout>