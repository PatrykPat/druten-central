<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
        {{ __('Recente nieuws') }}
    </h2>
</x-slot>
<h1>3 meest recente nieuws artikelen:</h1>

@foreach ($nieuws as $nieuwsitem)
<div class="nieuwsitembox">
    <h3>user: @if ($nieuwsitem->gebruiker)
            {{ $nieuwsitem->gebruiker->name }}
            @else
            Geen gebruiker gevonden
            @endif</h3>
    <h3>title: {{$nieuwsitem->title}}</h3>
    <h4>description: {{$nieuwsitem->beschrijving}}</h4>
    <h4>date: {{$nieuwsitem->datum}}</h4>
    <h4>postcode: {{$nieuwsitem->postcode}}</h4>
    @auth
    @role('bedrijf')
    <!-- Edit Form -->
    <a href="{{ route('nieuws.NieuwsEdit', $nieuwsitem->id) }}">Edit</a>

    <!-- Delete Form -->
    <form method="post" action="{{ route('nieuws.destroy', $nieuwsitem->id) }}" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit"
            onclick="return confirm('Are you sure you want to delete this news item?')">Delete</button>
    </form>
    @endrole
    @endauth
</div><br>
@endforeach

<!-- Link naar create form -->
@auth
    @role('bedrijf')
        <h3><a href="/nieuws/create">Create</a></h3>
    @endrole
@endauth

</x-app-layout>