<x-app-layout>
    <x-slot name="header" class="bg-transparent">
        <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
            {{ __('Meerkeuzevraag') }}
        </h2>
    </x-slot>

    <!-- <div class="alert alert-success">
        {{ session('niks') }}
    </div> -->

    <div class="py-12 min-h-screen flex flex-col justify-center items-center pt-6 pt-0 bg-transparent">
            <div class="max-w-7xl mx-auto px-8">
                <div class="bg-transparent overflow-hidden">
                    <div class="p-6 text-black">
                        @if( session('error') ) 
                            <div class="alert alert-error bg-white p-3 mb-3 text-[#ff0000] rounded-3xl">
                                {{ session('error') }}
                            </div>
                            @elseif( session('success'))
                                <div class="alert alert-success bg-white p-3 mb-3 text-[color:var(--prime-color)] rounded-3xl">
                                    {{ session('success') }}
                                </div>
                            @endif
                            
                        <!-- meerkeuzevraag loop-->
                        @if(count($vragenMetAntwoorden) > 0)
                            @foreach ($vragenMetAntwoorden as $vraag)
                                <form method="POST" class="p-4 mb-6 border rounded-3xl bg-white flex flex-col justify-center items-center" action="{{ route('meerkeuzevragen.control') }}">
                                    @csrf
                                    <h2 class="font-bold text-xl">{{ $vraag->vraag }}</h2>
                                    <div class="grid w-full grid-rows-2 grid-flow-col gap-4 bg-[color:var(--prime-color)] p-8 rounded-3xl">
                                        @foreach ($vraag->antwoorden as $antwoord)
                                            <div class="block">
                                            <input class="peer hidden" type="checkbox" id="antwoord[{{ $antwoord->antwoordID }}]" name="antwoord[{{ $antwoord->antwoordID }}]" value="{{ $antwoord->antwoordID }}"> 
                                                <label for="antwoord[{{ $antwoord->antwoordID }}]" class="select-none block bg-[color:var(--sec-color)] rounded-3xl cursor-pointer p-4 font-bold text-white text-center transition-colors duration-200 ease-in-out peer-checked:bg-white peer-checked:text-[color:var(--prime-color)]">{{ $antwoord->AntwoordTekst }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <input type="hidden" name="vraag_id" value="{{ $vraag->id }}">

                                    <div class="m-4 w-full flex flex-colm justify-center items-center">
                                        <button class="text-white w-[90%] justify-center  w-full relative inset-x-0 bottom-0 h-12 bg-[var(--prime-color)] border-black rounded-3xl" type="submit">Controleer antwoord</button>
                                    </div>        
                                </form>
                            @endforeach

                        <!--melding dat er geen berichten zijn-->
                        @else
                            <p class="p-4 mb-6 border rounded-3xl bg-white flex flex-col justify-center items-center">er zijn geen openstaande meerkeuzevragen</p>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
