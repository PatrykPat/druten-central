<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('coupon shop') }}
    </h2>
</x-slot>

<div class="alert alert-danger">
        {{ session('error') }}
</div>
 @foreach ($coupons as $Coupon)
 <div class="coupon">
    <br>te besteden in: {{ $Coupon->gebruiker->name}}<br>
    beschrijving: {{ $Coupon->Omschrijving }}<br>
    waarde:{{ $Coupon->Waarde }}{{ $Coupon->Eenheid }} <br>
    prijs:{{ $Coupon->Puntenprijs }} punt(en)<br>
    <form action="{{ route('coupons.show') }}" method="post">
            @csrf
            <input type="hidden" name="coupon_id" value="{{ $Coupon->id }}">
            <input type="hidden" name="Puntenprijs" value="{{ $Coupon->Puntenprijs }}">
            <button type="submit" style="background-color: blue; color: white;">Koop</button><br><br>
        </form>

</div>
 @endforeach
</x-app-layout>