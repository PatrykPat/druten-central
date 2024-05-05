<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
            {{ __('Recente nieuws') }}
        </h2>
    </x-slot>
    
    <html>
        <body>
            <h1>3 meest recente nieuwsartikelen:</h1>
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
                            <a href="{{ route('nieuws.NieuwsEdit', $nieuwsitem->id) }}">Bewerk</a>
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
        </body>
    </html>  
</x-app-layout>
