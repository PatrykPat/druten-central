<x-app-layout>
    <div class="alert alert-danger">
        {{ session('error') }}
</div>
 <div class="alert alert-success">
        {{ session('success') }}
    </div>
<div class="alert alert-success">
        {{ session('niks') }}
    </div>
    <h1>Vragen en Antwoorden</h1>

@foreach ($vragenMetAntwoorden as $vraag)
<form method="POST" action="{{ route('meerkeuzevragen.control') }}">
  @csrf
    <h2>{{ $vraag->vraag }}</h2>
    <ul>
        
        @foreach ($vraag->antwoorden as $antwoord)
            <li>
                <label>
                    <input type="checkbox" name="antwoord[{{ $antwoord->antwoordID }}]" value="{{ $antwoord->antwoordID }}"> 
                    {{ $antwoord->AntwoordTekst }}
                </label>
            </li>
        @endforeach
    </ul>
    <input type="hidden" name="vraag_id" value="{{ $vraag->id }}">
    <button type="submit">Controleer antwoord</button>
    </form>
@endforeach



</x-app-layout>