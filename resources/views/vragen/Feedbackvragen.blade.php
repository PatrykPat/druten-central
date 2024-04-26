<x-app-layout>
    
<x-slot name="header" class="bg-transparent">
            <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
                {{ __('Feedbackvragen') }}
            </h2>
        </x-slot>

    <div class="py-12 min-h-screen flex flex-col justify-center items-center pt-6 pt-0 bg-transparent">
            <div class="max-w-7xl mx-auto px-8">
                <div class="bg-transparent overflow-hidden">
                    <div class="p-6 text-black">

                <!-- feedbackvraag loop-->
                        @if(count($vragen) > 0)
                            <div class="p-6 text-black mb-6 border rounded-3xl bg-white flex flex-col justify-center items-center">
                                <h2 class="font-bold text-xl">De feedbackvragen van vandaag:</h2><br>

                                @foreach($vragen as $vraag)
                                <div class="py-6 w-full sm:w-full max-w-[600px]">
                                    <!-- Een formulier voor het verwerken van het antwoord -->
                                    <form method="POST" class="" action="{{ route('verwerkantwoord') }}">

                                        <!-- Cross-Site Request Forgery-beveiligingstoken -->
                                        @csrf

                                        <!-- Verborgen veld om de vraag-ID door te geven -->
                                        <input type="hidden" name="vraag_id" value="{{ $vraag->id }}">

                                        <div class="pb-4 font-bold text-base">
                                        <!-- Label voor het weergeven van de vraag -->
                                            <label for="antwoord">{{ $vraag->beschrijving }}:</label>
                                        </div>

                                        <div class="">
                                        <!-- Invoerveld voor het beantwoorden van de vraag -->
                                            <input type="text" maxlength="40" placeholder="Jouw antwoord..." class="text-white mt-6 mb-3 p-3 placeholder:text-white justify-center inline-block w-full h-12 bg-[var(--prime-color)] border-none rounded-xl" id="antwoord" name="antwoord" required>
                                        </div>
                                        <!-- Een schuifregelaar voor het beoordelen -->
                                        <div class="text-white  justify-center w-full p-3 bg-[var(--prime-color)] border-black rounded-xl">
                                            <p class="text-white">rating: 1-10</p>
                                            <input type="range" class="w-full slider" id="rating" name="rating" required min="1" max="10" value="10"
                                                oninput="updateHiddenField(this.value)">
                                            <!-- Verborgen veld om de geselecteerde waarde van de schuifregelaar bij te houden -->
                                            <input type="hidden" id="hiddenValue" name="hiddenValue" value="10">
                                        </div>

                                        <!-- Knop om het antwoord in te dienen -->
                                        <input type="submit" class="text-white p-3 bg-[var(--prime-color)] hover:bg-[var(--sec-color)] rounded-xl mt-3" value="Beantwoorden">
                                    </form>
                                </div>
                                @endforeach
                            </div>

                            @else
                                <p>er zijn geen feedbackvragen die je kan beantwoorden</p>
                            @endif



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