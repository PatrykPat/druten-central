<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen flex flex-col justify-center items-center pt-6 pt-0 bg-transparent">
        <div class="max-w-7xl mx-auto px-8">
            <div class="bg-transparent overflow-hidden">
                <div class="p-6 text-black">
                    <!-- meerkeuzevraag loop-->
                    @if(count($meerkeuzevragen) > 0)
                        @foreach ($meerkeuzevragen as $vraag)
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

                                <div class="m-4 w-full flex flex-col justify-center items-center">
                                    <button class="text-white w-[90%] justify-center  w-full relative inset-x-0 bottom-0 h-12 bg-[var(--prime-color)] border-black rounded-3xl" type="submit">Controleer antwoord</button>
                                </div>        
                            </form>
                        @endforeach

                        <!--melding dat er geen berichten zijn-->
                    @else
                        <p class="p-4 mb-6 border rounded-3xl bg-white flex flex-col justify-center items-center">er zijn geen openstaande meerkeuzevragen</p>
                    @endif

                    <!-- hier beginnen de feedbackvragen-->
                    @if(count($feedbackvragen) > 0)
                        <div class="p-6 text-black mb-6 border rounded-3xl bg-white flex flex-col justify-center items-center">
                            <h2 class="font-bold text-xl">De feedbackvragen van vandaag:</h2><br>
                            @foreach($feedbackvragen as $vraag)
                                <div class="p-6 w-full sm:w-full max-w-[600px]">
                                    <form method="POST" class="" action="{{ route('verwerkantwoord') }}">
                                    @csrf
                                        <input type="hidden" name="vraag_id" value="{{ $vraag->id }}">
                                        <div class="font-bold text-xl">
                                            <label for="antwoord">{{ $vraag->beschrijving }}?</label>
                                        </div>
                                        <div class="">
                                            <input type="text" maxlength="40" placeholder="Jouw antwoord..." class="text-white mt-6 mb-3 p-3 placeholder:text-white justify-center inline-block w-full h-12 bg-[var(--prime-color)] border-none rounded-xl" id="antwoord" name="antwoord" required>
                                        </div>
                                        <div class="text-white  justify-center w-full p-3 bg-[var(--prime-color)] border-black rounded-xl">
                                            <p class="text-white">rating: 1-10</p>
                                            <input type="range" class="w-full slider" id="rating" name="rating" min="1" max="10" value="10"
                                                oninput="updateHiddenField(this.value)">
                                            <input type="hidden" id="hiddenValue" name="hiddenValue" value="10">
                                        </div>
                                        <input type="submit" class="text-white p-3 bg-[var(--prime-color)] hover:bg-[var(--sec-color)] rounded-xl mt-3" value="Beantwoorden">
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="p-4 mb-6 border rounded-3xl bg-white flex flex-col justify-center items-center">er zijn geen feedbackvragen die je kan beantwoorden</p>
                    @endif

                    <!-- hier beginnen de nieuwsberichten-->
                    @if(count($recentNieuws) > 0)
                        <div class="p-6 text-black border rounded-3xl bg-white flex flex-col justify-center items-center ">
                            <h3 class="font-bold text-xl">Nieuws</h3>
                            @foreach ($recentNieuws as $nieuwsitem)
                                <div class="font-bold text-base block sm:flex">
                                    @if ($nieuwsitem->image)
                                        <div class="font-bold text-base block sm:flex">
                                            <img class="w-full max-w-[300px] rounded-xl" src="data:image/png;base64,{{ chunk_split(base64_encode($nieuwsitem->image)) }}">
                                        </div>
                                    @endif

                                    <div class="w-full p-3 flex flex-col">
                                        <h3 class="uppercase text-xl pb-2">{{$nieuwsitem->title}}</h3>
                                        <h4 class="capitalize pb-12">{{$nieuwsitem->beschrijving}}</h4>
                                        <h3>Gebruiker: @if ($nieuwsitem->gebruiker)
                                            {{ $nieuwsitem->gebruiker->name }}
                                        @else
                                            <p class="text-[#FF0000]">Geen gebruiker gevonden<p>
                                        @endif
                                        </h3>
                                    <h4>date: {{$nieuwsitem->datum}}</h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>Er is geen nieuws</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
