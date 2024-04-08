<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Nieuws') }}
    </h2>
</x-slot>
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
<h1>Coupons</h1>
@foreach($coupons as $coupon)
    <div class="coupon">
        <h2>{{ $coupon->coupon->id }}</h2>
        <p>{{ $coupon->coupon->Omschrijving }}</p>
        <p>korting: {{ $coupon->coupon->Waarde }}{{ $coupon->coupon->Eenheid }}</p>
        <p>gekocht op: {{ $coupon->created_at }}</p>
    </div><br>
@endforeach

 
</x-app-layout>