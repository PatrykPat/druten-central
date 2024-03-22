<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    welkom terug {{Auth::user()->name}}
                </div>
            </div>
        </div>
    </div>

    <div class="todayNieuws">
    <h2> Het nieuws van vandaag:</h2>
    @foreach ($nieuws as $nieuwsitem)
    <div class="nieuwsitembox">
        <h3>user: @if ($nieuwsitem->gebruiker)
            {{ $nieuwsitem->gebruiker->name }}
            @else
            Geen gebruiker gevonden
            @endif</h3>
        <h3>title: {{$nieuwsitem->title}}</h3>
        <h4>description: {{$nieuwsitem->beschrijving}}</h4>
        <h4>date: {{$nieuwsitem->datum}}</h4>
        <h4>postcode: {{$nieuwsitem->postcode}}</h4>
    </div><br>
    @endforeach
    </div>
</x-app-layout>