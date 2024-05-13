<x-app-layout>
    <x-slot name="header" class="bg-transparent">
        <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
            {{ __('Feedbackvragenformulier') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl ">
            <h2>Maak een feedbackvraag</h2>
            <div class="alert alert-success">
            @if( session('success'))
                <div class="alert alert-success bg-white p-3 mb-3 text-[color:var(--prime-color)] rounded-3xl">
                    {{ session('success') }}
                </div>
            @endif

            </div>
            <form method="POST" action="{{ route('feedback.send') }}">
                @csrf
                <label for="title">Titel:</label><br>
                <input type="text" id="title" name="title" required><br><br>

                <label for="beschrijving">Beschrijving:</label><br>
                <textarea id="beschrijving" name="beschrijving" required></textarea><br><br>

                <label for="puntenTeVerdienen">Punten te verdienen:</label><br>
                <input type="number" id="puntenTeVerdienen" name="puntenTeVerdienen" required><br><br>

                <label for="Begindatum">Begin datum</label><br>
                <input type="date" id="begindatum" name="begindatum" required><br><br>

                <label for="Einddatum">Eind datum</label><br>
                <input type="date" id="einddatum" name="einddatum" required><br><br>



                <div class="m-4 w-full flex flex-colm justify-center items-center">
	                <button class="text-white w-[90%] justify-center  w-full relative inset-x-0 bottom-0 h-12 bg-[var(--prime-color)] border-black rounded-3xl" type="submit">Maak vraag</button>
                </div> 
            </form>
        </div>
    </div>
</div>
</div>


</x-app-layout>
