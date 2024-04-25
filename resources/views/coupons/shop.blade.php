<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
        {{ __('coupon shop') }}
    </h2>
</x-slot>

<div class="py-12 min-h-screen flex flex-col justify-center items-center pt-6 pt-0 bg-transparent">
    <div class="max-w-7xl mx-auto px-8">
        <div class="bg-transparent overflow-hidden">
            <div class="p-6 text-black">
                <div class="alert alert-danger p-6 bold-xl text-[#FF0000]">
                        {{ session('error') }}
                </div>

                @foreach ($coupons as $Coupon)
                    <div class="p-4 mb-6 border rounded-3xl bg-white flex flex-col justify-center items-center">
                        <p class="text-center bold-xl text-xl" >Te besteden in: {{ $Coupon->gebruiker->name}}</p>
                        <p>Beschrijving: {{ $Coupon->Omschrijving }}</p>
                        <p>Waarde: {{ $Coupon->Waarde }}{{ $Coupon->Eenheid }}</p>
                        <p>Prijs: {{ $Coupon->Puntenprijs }} punt(en)</p>
                        <form action="{{ route('coupons.show') }}" class="w-full" method="post">
                            @csrf

                            <input type="hidden" name="coupon_id" value="{{ $Coupon->id }}">
                            <input type="hidden" name="Puntenprijs" value="{{ $Coupon->Puntenprijs }}">
                            <button type="submit" class="text-white w-[90%] justify-center w-full relative inset-x-0 bottom-0 h-12 bg-[var(--prime-color)] border- rounded-3xl">Koop</button>

                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</x-app-layout>