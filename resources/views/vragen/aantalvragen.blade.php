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
        <h3>Overzicht van beantwoorde vragen</h3>
        <table>
            <thead>
                <tr>
                    <th>Vragen</th>
                    <th>Aantal beantwoorde keren</th>
                </tr>
            </thead>
            <tbody>
                <div class='nieuws'>
                    @foreach ($vragen as $index => $vraag)
                    <tr>
                        <td>{{ $vraag->title }}</td>
                        <td>{{ $beantwoordeVragen[$index]->aantalBeantwoordeVragen }}</td>
                    </tr>
                    @endforeach
                </div>
            </tbody>
        </table>

    </body>

    </html>
</x-app-layout>