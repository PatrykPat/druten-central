<html>
    <x-slot name="header" class="bg-transparent">
        <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
            {{ __('Edit nieuws') }}
        </h2>
    </x-slot>
    <body>
        <form method="post" action="{{ route('nieuws.update', $nieuwsitem->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" value="{{ old('title', $nieuwsitem->title) }}" required><br>

            <label for="beschrijving">Description:</label><br>
            <textarea id="beschrijving" name="beschrijving" required>{{ old('beschrijving', $nieuwsitem->beschrijving) }}</textarea><br>

            <label for="image">Image:</label><br>
            <input type="file" id="image" name="image"><br>

            <label for="datum">Date:</label><br>
            <input type="date" id="datum" name="datum" value="{{ old('datum', $nieuwsitem->datum) }}" required><br>

            <label for="postcode">Postcode:</label><br>
            <input type="text" id="postcode" name="postcode" value="{{ old('postcode', $nieuwsitem->postcode) }}" required><br>

            <button type="submit">Update</button>
        </form>
    </body >
</html>
