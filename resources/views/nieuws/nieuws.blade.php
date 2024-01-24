<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
<h1> Nieuws: </h1>

<!-- Dropdown form om nieuwsitems te filteren -->
<form id="filterForm" action="{{ route('nieuws.filter') }}" method="GET">
    @csrf
    <label for="userFilter">Select User:</label>
    <select id="userFilter" name="user_id">
        <option value="" {{ empty($selectedUserId) ? 'selected' : '' }}>All Users</option>
        <!-- foreach die alle users laat zien met de role bedrijf -->
        @foreach ($users as $user)
            @foreach ($user->roles as $role)
                @if ($role->name == 'bedrijf')
                    <option value="{{ $user->id }}" {{ isset($selectedUserId) && $selectedUserId == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endif
            @endforeach
        @endforeach
    </select>
</form>

<script>
    // Filter met javascript automatisch
    document.getElementById('userFilter').addEventListener('change', function() {
        document.getElementById('filterForm').submit();
    });
</script>

<!-- foreach van alle nieuwsitems -->
@foreach ($nieuws as $nieuwsitem)
<div class="nieuwsitembox">
    <h3>user: {{$nieuwsitem->user_iduser}}</h3>
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
</x-app-layout>