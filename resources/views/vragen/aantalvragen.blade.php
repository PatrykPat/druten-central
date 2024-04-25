<x-app-layout>

<x-slot name="header" class="bg-transparent">
        <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
            {{ __('Jouw vragen') }}
        </h2>
    </x-slot>

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