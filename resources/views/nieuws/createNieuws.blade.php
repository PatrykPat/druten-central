<!-- Form voor het creëren van nieuwsitems -->
<x-app-layout>
    <x-slot name="header" class="bg-transparent">
        <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
            {{ __('Create nieuws') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl flex flex-col">



    <form method="post" action="{{ url('/newnieuws') }}" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col ">

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

        <div class="m-4 w-full flex flex-colm justify-center items-center">
            <button class="text-white w-[90%] justify-center  w-full relative inset-x-0 bottom-0 h-12 bg-[var(--prime-color)] border-black rounded-3xl" type="submit">Maken</button>
        </div> 
    </form>

</div>
</div>
</div>
</div>
    </x-app-layout>