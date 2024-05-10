<x-app-layout>
<x-slot name="header" class="bg-transparent">
        <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
            {{ __('Bewerk nieuws') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl ">

        <form method="post" action="{{ route('nieuws.update', $nieuwsitem->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col ">
            @method('PUT')

            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" value="{{ old('title', $nieuwsitem->title) }}" required><br>

            <label for="beschrijving">Beschrijving:</label><br>
            <textarea id="beschrijving" name="beschrijving" required>{{ old('beschrijving', $nieuwsitem->beschrijving) }}</textarea><br>

            <label for="image">Foto:</label><br>
            <input type="file" id="image" name="image"><br>

            <label for="datum">Datum:</label><br>
            <input type="date" id="datum" name="datum" value="{{ old('datum', $nieuwsitem->datum) }}" required><br>

            <label for="postcode">Postcode:</label><br>
            <input type="text" id="postcode" name="postcode" value="{{ old('postcode', $nieuwsitem->postcode) }}" required><br>

            <div class="m-4 w-full flex flex-colm justify-center items-center">
	            <button class="text-white w-[90%] justify-center  w-full relative inset-x-0 bottom-0 h-12 bg-[var(--prime-color)] border-black rounded-3xl" type="submit">Update</button>
            </div> 
        </div>
    </form>

    </div>
</div>
</div>
</div>
</x-app-layout>