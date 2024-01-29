<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
<h1> Nieuws: </h1>

<!-- foreach van alle nieuwsitems -->
@foreach ($nieuws as $nieuwsitem)
<div class="nieuwsitembox">
    <h3>title: {{$nieuwsitem->title}}</h3>
    <h4>description: {{$nieuwsitem->beschrijving}}</h4>
    <h4>date: {{$nieuwsitem->datum}}</h4>
    @auth
        @role('bedrijf')
            <!-- Edit Form -->
            <a href="{{ route('nieuws.NieuwsEdit', $nieuwsitem->id) }}">Edit</a>

            <!-- Delete Form -->
            <form method="post" action="{{ route('nieuws.destroy', $nieuwsitem->id) }}" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure you want to delete this news item?')">Delete</button>
            </form>
        @endrole
    @endauth
</div>
@endforeach

<!-- Link naar create form -->
@auth
    @role('bedrijf')
        <h3><a href="/nieuws/create">Create</a></h3>
    @endrole
@endauth