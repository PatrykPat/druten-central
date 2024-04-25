<x-app-layout>
<x-slot name="header" class="bg-transparent">
        <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
            {{ __('Alle vragen') }}
        </h2>
    </x-slot>
    <div class="py-12 w-full">
        @foreach($vragen as $vraag)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class= " bg-white p-6 text-gray-900" >
                    <div class="flex">
                        </div>
                            <ul role="list" class="divide-y divide-gray-100">
                        </div>    
                            <!-- Een formulier voor het verwerken van het antwoord -->
                            <form method="POST" action="{{ route('verwerkantwoord') }}">
                                @csrf <!-- Cross-Site Request Forgery-beveiligingstoken -->

                                <!-- Verborgen veld om de vraag-ID door te geven -->
                                <input type="hidden" name="vraag_id" value="{{ $vraag->id }}">

                                <!-- Label voor het weergeven van de vraag -->
                                <label for="antwoord">{{ $vraag->beschrijving }}</label><br>

                                <!-- Invoerveld voor het beantwoorden van de vraag -->
                                <input type="text" id="antwoord" name="antwoord" required>

                                <!-- Een schuifregelaar voor het beoordelen van de vraag -->
                                <div class="slidecontainer">
                                    <p>Standaard bereikschuifregelaar:</p>
                                    <input type="range" id="rating" name="rating" required min="1" max="10" value="10" oninput="updateHiddenField(this.value)">
                                    <!-- Verborgen veld om de geselecteerde waarde van de schuifregelaar bij te houden -->
                                    <input type="hidden" id="hiddenValue" name="hiddenValue" value="10">
                                    <!-- Knop om het antwoord in te dienen -->

                                    @auth
            @role('bedrijf')
                <h3><a href="/nieuws/create">Create</a></h3>
            @endrole
        @endauth
                                            <input type="submit" value="Beantwoorden">
                                </div>
                            </form>
</div>                  
</div>
</div>                  
</div>
@endforeach
</div>


<!-- JavaScript-functie om het verborgen veld bij te werken wanneer de schuifregelaar wordt gewijzigd -->
<script>
    function updateHiddenField(value) {
        document.getElementById('hiddenValue').value = parseInt(value, 10);
    }
</script>

</x-app-layout>