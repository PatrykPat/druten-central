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
        @foreach($vragen as $vraag)
        <form method="POST" action="{{ route('verwerkantwoord') }}">
            @csrf
            <input type="hidden" name="vraag_id" value="{{$vraag->id}}">

            <label for="antwoord">{{ $vraag->beschrijving }}</label><br>
            <input type="text" id="antwoord" name="antwoord" required>

            <input type="submit" value="Beantwoorden">
        </form>
        @endforeach

    </body>

    </html>
</x-app-layout>