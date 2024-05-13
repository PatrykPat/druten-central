<x-app-layout>
     <!-- steven 13-5-2024  -->
    <x-slot name="header">
        <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
            {{ __('beheer coupons') }}
        </h2>
    </x-slot>
    <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
    <div class="alert alert-danger p-6 bold-xl text-[#FF0000]">
                        {{ session('error') }}
                </div>
    <div class="alert alert-success p-6 bold-xl text-[#FF0000]">
        {{ session('success') }}
    </div>
</h2>
    <div class="py-12 min-h-screen flex flex-col justify-center items-center pt-6 pt-0 bg-transparent">
        <div class="max-w-7xl mx-auto px-8">
            <div class="bg-transparent overflow-hidden">
                <div class="p-6 text-black">
                    @foreach($Coupons as $Coupon)
                        <div class="p-4 mb-6 border rounded-3xl bg-white flex flex-col justify-center items-center">
                            <h2>{{ $Coupon->id }}</h2>
                            <p>{{ $Coupon->Omschrijving }}</p>
                            <p>korting: {{ $Coupon->Waarde }}{{ $Coupon->Eenheid }}</p>
                            <a href="{{ route('coupon.edit', $Coupon->id) }}">Bewerk</a>
                            <form action="{{ route('coupon.delete', $Coupon->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Verwijder</button>
                            </form>
                        </div><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
