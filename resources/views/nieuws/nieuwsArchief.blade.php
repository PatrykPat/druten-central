 <x-app-layout>
        <x-slot name="header" class="bg-transparent">
            <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
                {{ __('Nieuws') }}
            </h2>
        </x-slot>
            <div class="max-w-7xl mx-auto px-8 pb-12">
                <!-- Dropdown-formulier om nieuwsitems te filteren -->
                <form id="filterForm" action="{{ route('nieuws.filter') }}" class="m-6 bg-[color:var(--prime-color)] rounded-xl" method="GET">
                    @csrf
                    <label class="p-3 text-white" for="userFilter">Kies een gebruiker:</label>
                    <select id="userFilter" name="user_postcode">
                        <option value="{{ empty($selectedUserPostcode) ? 'selected' : '' }}">Alle gebruikers</option>
                        <!-- foreach die alle gebruikers laat zien met de rol bedrijf -->
                        @foreach ($users as $user)
                            @foreach ($user->roles as $role)
                                @if ($role->name == 'bedrijf')
                                    <option value="{{ $user->postcode }}" {{ isset($selectedUserPostcode) && $selectedUserPostcode == $user->
                postcode ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endif
                            @endforeach
                        @endforeach
                    </select>
                </form>

                <script>
                    // Filter automatisch met JavaScript
                    document.getElementById('userFilter').addEventListener('change', function () {
                        document.getElementById('filterForm').submit();
                    });
                </script>

                <!-- Foreach die alle nieuwsartikelen laat zien die van eerder dan vandaag zijn -->
                @foreach ($nieuws as $nieuwsitem)
                    <div class="p-6 text-black border rounded-3xl bg-white flex flex-col justify-center items-center">
                        <div class="w-full p-3 justify-center font-bold text-base block sm:flex">
                            @if ($nieuwsitem->image)
                                <div class="font-bold text-base flex sm:flex justify-center">
                                    <img class="w-full max-w-[300px] rounded-xl" src="data:image/png;base64,{{ chunk_split(base64_encode($nieuwsitem->image)) }}">
                                </div>
                            @endif

                            <div class="w-full p-3 flex flex-col">
                                <h3 class="uppercase text-xl pb-2">{{$nieuwsitem->title}}</h3>
                                <h4 class="capitalize pb-12">{{$nieuwsitem->beschrijving}}</h4>
                                <h3>Gebruiker: @if ($nieuwsitem->gebruiker)
                                    {{ $nieuwsitem->gebruiker->name }}
                                @else
                                    <p class="text-[#FF0000]">Geen gebruiker gevonden</p>
                                @endif
                                </h3>
                                <h4>date: {{$nieuwsitem->datum}}</h4>
                                <h4>postcode: {{$nieuwsitem->postcode}}</h4>
                            </div>
                        </div>
                        @auth
                            @role('bedrijf')
                                <a href="{{ route('nieuws.NieuwsEdit', $nieuwsitem->id) }}">Bewerk</a>

                                <form method="post" action="{{ route('nieuws.destroy', $nieuwsitem->id) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this news item?')">Verwijder</button>
                                </form>
                            @endrole
                        @endauth
                    </div>
                    <br>
                @endforeach

                @auth
                    @role('bedrijf')
                        <h3><a href="/create">Creëren</a></h3>
                    @endrole
                @endauth
            </div>
    </x-app-layout>