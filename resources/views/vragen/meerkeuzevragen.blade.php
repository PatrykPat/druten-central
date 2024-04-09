<x-app-layout>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
    <body>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
        <form method="POST" action="{{ route('verwerk_vraag') }}">
            @csrf

            <label for="vraag">Vraag:</label>
            <input type="text" id="vraag" name="vraag" required>
            <br>

            <label for="opties">Opties:</label>
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
</body>
    </html>
</x-app-layout>