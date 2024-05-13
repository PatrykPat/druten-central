<x-app-layout>
    <!-- steven 13-5-2024  -->
<x-slot name="header" class="bg-transparent">
        <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
            {{ __('Bewerk coupon') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl ">

<form method="post" action="{{ route('coupon.update', ['id' => $Coupon->id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col ">
            @method('PUT')

            <label for="Omschrijving">Omschrijving:</label><br>
            <input type="text" id="Omschrijving" name="Omschrijving" value="{{ old('Omschrijving', $Coupon->Omschrijving) }}" required><br>

            <label for="Waarde">Waarde:</label><br>
            <textarea id="Waarde" name="Waarde" required>{{ old('Waarde', $Coupon->Waarde) }}</textarea><br>

           <label for="Eenheid">Eenheid:</label><br>
            <input type="text" id="Eenheid" name="Eenheid" value="{{ old('Eenheid', $Coupon->Eenheid) }}" required><br>

            <label for="Puntenprijs">Puntenprijs:</label><br>
            <input type="text" id="Puntenprijs" name="Puntenprijs" value="{{ old('Puntenprijs', $Coupon->Puntenprijs) }}" required><br>

            <label for="Einddatum">Einddatum:</label><br>
            <input type="text" id="Einddatum" name="Einddatum" value="{{ old('Einddatum', $Coupon->Einddatum) }}" required><br>

            <div class="m-4 w-full flex flex-colm justify-center items-center">
	            <button class="text-white w-[90%] justify-center  w-full relative inset-x-0 bottom-0 h-12 bg-[var(--prime-color)] border-black rounded-3xl" type="submit">Update</button>
            </div> 
        </div>
    </form>

    </div>
</div>
</div>
</div>
</x-app-layout>