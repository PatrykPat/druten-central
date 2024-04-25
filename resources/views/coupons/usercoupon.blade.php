<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold bg-transparent text-center text-4xl text-white leading-tight">
            {{ __('coupons') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen flex flex-col justify-center items-center pt-6 pt-0 bg-transparent">
            <div class="max-w-7xl mx-auto px-8">
                <div class="bg-transparent overflow-hidden">
                    <div class="p-6 text-black">

    <div class="alert alert-success p-6 bold-xl text-[#FF0000]">
        {{ session('success') }}
    </div>
    


    @foreach($coupons as $coupon)
        <div class="p-4 mb-6 border rounded-3xl bg-white flex flex-col justify-center items-center">
            <h2>{{ $coupon->coupon->id }}</h2>
            <p>{{ $coupon->coupon->Omschrijving }}</p>
            <p>korting: {{ $coupon->coupon->Waarde }}{{ $coupon->coupon->Eenheid }}</p>
            <p>gekocht op: {{ $coupon->created_at }}</p>
            <button onclick="toggleQrCode({{ $coupon->id }})">Toon QR-code</button>
            <div id="qrcode_{{ $coupon->id }}" style="display: none;">
                {!! QrCode::generate("{{ $coupon->coupon->Waarde }}{{ $coupon->coupon->Eenheid }}{{ $coupon->id }}") !!}
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

    </div>
    </div>
    </div>
    </div>
</x-app-layout>
