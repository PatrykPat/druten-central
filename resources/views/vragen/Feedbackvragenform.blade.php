<x-app-layout>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Overzicht van beantwoorde vragen</title>
    </head>
    <style>
        td {
            border: 1px solid black;
        }

        td {
            padding: 10px;
            /* Voeg padding toe aan de cel voor extra ruimte */
        }
    </style>

    <body>
 <h2>maak een feedbackvraag</h2>
 <div class="alert alert-success">
        {{ session('success') }}
    </div>
    <form method="POST" action="{{ route('feedback.send') }}">
        @csrf
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title"><br><br>

        <label for="beschrijving">Beschrijving:</label><br>
        <textarea id="beschrijving" name="beschrijving"></textarea><br><br>

        <label for="puntenTeVerdienen">Punten te verdienen:</label><br>
        <input type="number" id="puntenTeVerdienen" name="puntenTeVerdienen"><br><br>

        <button type="submit">Verzenden</button>
    </form>
    </html>
</x-app-layout>