<x-app-layout>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
<style>
        body {
            background-color: #2b2b2b;
            color: #fff;
            font-family: 'Arial', sans-serif;
            margin: 50px auto;
        }

        form {
            width: 70%;
            margin: 0 auto;
            padding: 20px;
            background: #444;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        label, input[type="text"] {
            display: block;
            margin: 10px 0;
        }

        input[type="text"] {
            width: 80%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #666;
            color: #fff;
        }

        .optie {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .optie input[type="text"] {
            margin-right: 10px;
        }

        input[type="checkbox"] {
            margin-top: 3px; /* Aanpassing aan de checkbox-uitlijning */
        }

        input[type="submit"] {
            padding: 10px;
            background: #ff6f00;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #ff8c00;
        }
    </style>
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
            <input type="submit" value="Verstuur">
        </form>
</body>
    </html>
</x-app-layout>