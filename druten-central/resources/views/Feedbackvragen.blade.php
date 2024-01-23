<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @foreach($vragen as $vraag)
    <form method="POST" action="{{ route('verwerkantwoord') }}">
        @csrf
        <input type="hidden" name="vraag_id" value="{{$vraag->idVragen}}">

        <label for="antwoord">{{ $vraag->beschrijving }}</label><br>
        <input type="text" id="antwoord" name="antwoord" required>

        <input type="submit" value="Beantwoorden">
    </form>
    @endforeach

</body>

</html>