<x-app-layout>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Overzicht van beantwoorde vragen</title>
    </head>

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
                @foreach ($beantwoordeVragen as $vraag)
                <tr>
                    <td>{{ $vraag->titels }}</td>
                    <td>{{ $vraag->aantalBeantwoordeVragen }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>

    </html>
</x-app-layout>