<!-- Form voor editten -->
<!-- Er staan al standaard values in -->
<h1>Edit Nieuws Item</h1>

<form method="post" action="{{ route('nieuws.update', $nieuwsitem->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="title">Title:</label>
    <input type="text" name="title" value="{{ old('title', $nieuwsitem->title) }}" required>

    <label for="beschrijving">Description:</label>
    <textarea name="beschrijving" required>{{ old('beschrijving', $nieuwsitem->beschrijving) }}</textarea>

    <label for="image">Image:</label>
    <input type="file" name="image">

    <label for="datum">Date:</label>
    <input type="date" name="datum" value="{{ old('datum', $nieuwsitem->datum) }}" required>

    <label for="postcode">Postcode:</label>
    <input type="text" name="postcode" value="{{ old('postcode', $nieuwsitem->postcode) }}" required>

    <button type="submit">Update</button>
</form>