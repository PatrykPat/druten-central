<x-app-layout>
<!-- Form voor het creëren van nieuwsitems -->
<x-slot name="header" class="bg-transparent">
        <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
            {{ __('Create nieuws') }}
        </h2>
    </x-slot>

    <form method="post" action="{{ url('/newnieuws') }}" enctype="multipart/form-data">
    @csrf

        <label for="title">Title:</label>
        <input type="text" name="title" required>

        <label for="beschrijving">Description:</label>
        <textarea name="beschrijving" required></textarea>

        <label for="image">Image:</label>
        <input type="file" name="image">

        <label for="datum">Date:</label>
        <input type="date" name="datum" required>

        <label for="postcode">Postcode:</label>
        <input type="text" name="postcode" required>

        <button type="submit">Submit</button>
    </form>
    </x-app-layout>