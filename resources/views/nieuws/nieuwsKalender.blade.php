<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
            {{ __('Kalender') }}
        </h2>
    </x-slot>
    
    <html>
        <body>
            <h1>Aankomende nieuwsberichten:</h1>
            <form id="filterForm" action="{{ route('nieuws.filterkalender') }}" method="GET">
                @csrf
                <label for="userFilter">Selecteer gebruiker:</label>
                <select id="userFilter" name="user_postcode">
                    <option value="" {{ empty($selectedUserPostcode) ? 'selected' : '' }}>Alle gebruikers</option>
                    @foreach ($users as $user)
                        @foreach ($user->roles as $role)
                            @if ($role->name == 'bedrijf')
                                <option value="{{ $user->postcode }}" {{ isset($selectedUserPostcode) && $selectedUserPostcode == $user->postcode ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endif
                        @endforeach
                    @endforeach
                </select>
            </form>

            @foreach ($nieuws as $nieuwsitem)
                <div class="nieuwsitembox">
                    <h3>User: @if ($nieuwsitem->gebruiker)
                        {{ $nieuwsitem->gebruiker->name }}
                    @else
                        Geen gebruiker gevonden
                    @endif</h3>
                    <h3>Title: {{$nieuwsitem->title}}</h3>
                    <h4>Description: {{$nieuwsitem->beschrijving}}</h4>
                    <h4>Date: {{$nieuwsitem->datum}}</h4>
                    <h4>Postcode: {{$nieuwsitem->postcode}}</h4>
                    @auth
                        @role('bedrijf')
                            <a href="{{ route('nieuws.NieuwsEdit', $nieuwsitem->id) }}">Edit</a>

                            <form method="post" action="{{ route('nieuws.destroy', $nieuwsitem->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this news item?')">Delete</button>
                            </form>
                        @endrole
                    @endauth
                </div><br>
            @endforeach

            @auth
                @role('bedrijf')
                    <h3><a href="/nieuws/create">Create</a></h3>
                @endrole
            @endauth

            <script>
                document.getElementById('userFilter').addEventListener('change', function () {
                    document.getElementById('filterForm').submit();
                });
            </script>
        </body>
    </html>  
</x-app-layout>
