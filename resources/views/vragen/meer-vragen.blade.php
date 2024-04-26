<x-app-layout>
    <x-slot name="header" class="bg-transparent">
        <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
            {{ __('Alle vragen') }}
        </h2>
    </x-slot>
    <div class="py-12 w-full">
        @foreach($vragen as $vraag)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-sm sm:rounded-lg bg-white p-6 text-gray-900">
                    <ul role="list" class="divide-y divide-gray-100">
                        <form method="POST" action="{{ route('verwerkantwoord') }}">
                            @csrf
                            <input type="hidden" name="vraag_id" value="{{ $vraag->id }}">
                            <label for="antwoord">{{ $vraag->beschrijving }}</label><br>
                            <input type="text" id="antwoord" name="antwoord" required>
                            <div class="slidecontainer">
                                <p>Standaard bereikschuifregelaar:</p>
                                <input type="range" id="rating" name="rating" required min="1" max="10" value="10" oninput="updateHiddenField(this.value)">
                                <input type="hidden" id="hiddenValue" name="hiddenValue" value="10">
                                @auth
                                    @role('bedrijf')
                                        <h3><a href="/nieuws/create">Create</a></h3>
                                    @endrole
                                @endauth
                                <input type="submit" value="Beantwoorden">
                            </div>
                        </form>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function updateHiddenField(value) {
            document.getElementById('hiddenValue').value = parseInt(value, 10);
        }
    </script>

</x-app-layout>
