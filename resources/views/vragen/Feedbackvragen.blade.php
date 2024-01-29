<x-admin-layout>
    

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="flex justify-end">
                </div>
                    <ul role="list" class="divide-y divide-gray-100">
                </div>
                @foreach($vragen as $vraag)
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
            <input type="submit" value="Beantwoorden">
        </div>
    </form>
@endforeach

<!-- JavaScript-functie om het verborgen veld bij te werken wanneer de schuifregelaar wordt gewijzigd -->
<script>
    function updateHiddenField(value) {
        document.getElementById('hiddenValue').value = parseInt(value, 10);
    }
</script>
            </div>
        </div>
    </div>
</x-app-layout>