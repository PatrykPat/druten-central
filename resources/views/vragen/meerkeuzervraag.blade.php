<x-app-layout>
<x-slot name="header" class="bg-transparent">
        <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
            {{ __('Meerkeuzevraag') }}
        </h2>
    </x-slot>

    <div class="alert alert-danger">
        {{ session('error') }}
    </div>

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

    <div class="alert alert-success">
        {{ session('niks') }}
    </div>

    <div class="py-12 min-h-screen flex flex-col justify-center items-center pt-6 pt-0 bg-transparent">
            <div class="max-w-7xl mx-auto px-8">
                <div class="bg-transparent overflow-hidden">
                    <div class="p-6 text-black">

        @if(count($vragenMetAntwoorden) > 0)
                            @foreach ($vragenMetAntwoorden as $vraag)
                                <form method="POST" class="p-4 mb-6 border rounded-3xl bg-white flex flex-col justify-center items-center" action="{{ route('meerkeuzevragen.control') }}">
                                    @csrf
                                    <h2 class="font-bold text-xl">{{ $vraag->vraag }}</h2>
                                    <div class="grid w-full grid-rows-2 grid-flow-col gap-4 bg-[color:var(--prime-color)] p-8 rounded-3xl">
                                        @foreach ($vraag->antwoorden as $antwoord)
                                            <div class="bg-[color:var(--sec-color)] p-4 rounded-3xl">
                                                <label>{{ $antwoord->AntwoordTekst }}
                                                    <input type="checkbox" name="antwoord[{{ $antwoord->antwoordID }}]" value="{{ $antwoord->antwoordID }}"> 
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
                            <p>er zijn geen openstaande meerkeuzevragen</p>
                        @endif
                        </div>
                    </div>
                </div>
            </div>



</x-app-layout>