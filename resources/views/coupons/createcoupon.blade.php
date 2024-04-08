<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Nieuws') }}
    </h2>
</x-slot>
   <div class="alert alert-success">
        {{ session('success') }}
    </div>
<form method="POST" action="{{ route('coupons.send') }}">
    @csrf
    <div class="form-group">
        <label for="omschrijving">Omschrijving:</label>
        <input type="text" id="omschrijving" name="omschrijving" class="form-control">
    </div>
    <div class="form-group">
        <label for="waarde">Waarde:</label>
        <input type="text" id="waarde" name="waarde" class="form-control">
    </div>
    <div class="form-group">
        <label for="eenheid">Eenheid:</label>
        <input type="text" id="eenheid" name="eenheid" class="form-control">
    </div>
    <div class="form-group">
        <label for="puntenprijs">Puntenprijs:</label>
        <input type="text" id="puntenprijs" name="puntenprijs" class="form-control">
    </div>
    <div class="form-group">
        <label for="einddatum">Einddatum:</label>
        <input type="date" id="einddatum" name="einddatum" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


</x-app-layout>