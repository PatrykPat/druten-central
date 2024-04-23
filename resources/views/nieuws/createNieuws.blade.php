<!-- Form voor het creëren van nieuwsitems -->
<x-app-layout>
    
    <h1> Create Test </h1>
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