<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('coupons') }}
        </h2>
    </x-slot>
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @foreach($coupons as $coupon)
        <div class="coupon">
            <h2>{{ $coupon->coupon->id }}</h2>
            <p>{{ $coupon->coupon->Omschrijving }}</p>
            <p>korting: {{ $coupon->coupon->Waarde }}{{ $coupon->coupon->Eenheid }}</p>
            <p>gekocht op: {{ $coupon->created_at }}</p>
            <button onclick="toggleQrCode({{ $coupon->coupon->id }})">Toon QR-code</button>
            <div id="qrcode_{{ $coupon->coupon->id }}" style="display: none;">
                {!! QrCode::generate("{{ $coupon->coupon->Waarde }}{{ $coupon->coupon->Eenheid }}{{ $coupon->coupon->id }}") !!}
            </div>
        </div><br>
    @endforeach

    <script>
        function toggleQrCode(couponId) {
            var qrCode = document.getElementById('qrcode_' + couponId);
            if (qrCode.style.display === 'none') {
                qrCode.style.display = 'block';
            } else {
                qrCode.style.display = 'none';
            }
        }
    </script>
</x-app-layout>
