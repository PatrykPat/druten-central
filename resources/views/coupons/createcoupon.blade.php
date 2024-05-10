<x-app-layout>
<x-slot name="header" class="bg-transparent">
        <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
            {{ __('Maak coupon') }}
        </h2>
    </x-slot>


   <div class="alert alert-success">
        {{ session('success') }}
    </div>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl ">
<form method="POST" action="{{ route('coupons.send') }}">
    @csrf
    <div class="flex flex-col ">
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
    <div class="w-full flex flex-colm justify-center items-center">
	<button class="text-white w-[90%] justify-center  w-full relative inset-x-0 bottom-0 h-12 bg-[var(--prime-color)] border-black rounded-3xl" type="submit">

Maak coupon

</button>
</div> 
</div>
</form>
</div>
</div>
</div>
</div>




</x-app-layout>