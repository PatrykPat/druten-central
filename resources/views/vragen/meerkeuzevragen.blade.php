<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
            {{ __('Maak meerkeuzevraag') }}
        </h2>
    </x-slot>

            <div class="alert alert-error">
                {{ session('error') }}
            </div>

            <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl ">
                <form method="POST"  action="{{ route('verwerk_vraag') }}">
                @csrf
                <div class="flex flex-col ">
                    <label for="vraag">Vraag:</label>
                        <input type="text" id="vraag" name="vraag" required>
                        <br>
                        <label for="opties">vink het juiste antwoord(en) aan. voer hier de opties in:</label>

                        <div id="opties-container">
                            <div class="optie">
                                <input type="text" name="opties[0][tekst]" required>
                                <input type="checkbox" name="opties[0][is_correct]" value="1">
                            </div>
                            <div class="optie">
                                <input type="text" name="opties[1][tekst]" required>
                                <input type="checkbox" name="opties[1][is_correct]" value="1">
                            </div>
                            <div class="optie">
                                <input type="text" name="opties[2][tekst]" required>
                                <input type="checkbox" name="opties[2][is_correct]" value="1">
                            </div>
                            <div class="optie">
                                <input type="text" name="opties[3][tekst]" required>
                                <input type="checkbox" name="opties[3][is_correct]" value="1">
                            </div>
                        </div>
                    <label for="punten">hoeveel punten moet de gebruiker krijgen:</label>

                    <input type="number" id="punten" name="punten" required><br>
                        <div class="w-full flex flex-colm justify-center items-center">
	                        <button class="text-white w-[90%] justify-center  w-full relative inset-x-0 bottom-0 h-12 bg-[var(--prime-color)] border-black rounded-3xl" type="submit">verstuur</button>
                        </div> 
                    </div>
                </form>
            </div>
            </div>
            </div>
            </div>

</x-app-layout>
