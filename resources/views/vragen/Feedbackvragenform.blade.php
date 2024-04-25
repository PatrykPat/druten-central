<x-app-layout>

<x-slot name="header" class="bg-transparent">
        <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
            {{ __('Feedbackvragenformulier') }}
        </h2>
    </x-slot>

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