<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\CouponHasUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CouponController extends Controller
{
    public function showShop()
    {

        $coupons = Coupon::with('gebruiker')->get();
        return view('coupons\shop', compact('coupons'));
    }
    public function show()
    {
        $user = Auth::user(); // Haal de huidige gebruiker op
        $coupons = CouponHasUser::where('user_iduser', $user->id)->get(); // Haal de coupons op die bij de gebruiker horen

        return view('coupons\usercoupon', compact('coupons'));
    }
    public function buy(Request $request)
    {
        // Haal de huidige gebruiker op
        $user = Auth::user();

        $couponPrijs = $request->input('Puntenprijs');
        $huidigePunten = $user->punten;
        $nieuwePunten = $huidigePunten - $couponPrijs;

        // Zorg ervoor dat de gebruiker genoeg punten heeft om de coupon te kopen
        if ($nieuwePunten >= 0) {
            // Update de punten van de gebruiker
            $user->punten = $nieuwePunten;
            $user->save();

            // de coupon bij de user opslaan
            $coupons_has_user = new CouponHasUser();
            $coupons_has_user->user_iduser = $user->id;
            $coupons_has_user->coupons_idcoupons = $request->input('coupon_id');
            $coupons_has_user->save();

            // Redirect naar de coupons pagina
            return redirect()->route('coupons.show')->with('success', 'Coupon succesvol gekocht!');
        } else {
            // als gebruiker niet genoeg punten heeft, error teruggeven
            return redirect()->back()->with('error', 'Onvoldoende punten om de coupon te kopen.');
        }
    }
    public function form()
    {
        return view('coupons\createcoupon');
    }
    public function send(Request $request)
    {
        // Valideer de ingediende gegevens
        $validatedData = $request->validate([
            'omschrijving' => 'required|string',
            'waarde' => 'required|numeric',
            'eenheid' => 'required|string',
            'puntenprijs' => 'required|numeric',
            'einddatum' => 'required|date',
        ]);

        // Maak een nieuwe instantie van het Coupon model
        $coupon = new Coupon();
        $user = Auth::user();
        // Vul de eigenschappen van het model met de ingediende gegevens
        $coupon->omschrijving = $validatedData['omschrijving'];
        $coupon->waarde = $validatedData['waarde'];
        $coupon->eenheid = $validatedData['eenheid'];
        $coupon->puntenprijs = $validatedData['puntenprijs'];
        $coupon->einddatum = $validatedData['einddatum'];
        $coupon->user_iduser = $user->id;

        // Sla de coupon op in de database
        $coupon->save();

        // Geef een succesbericht terug of leid de gebruiker door naar een andere pagina
        return redirect()->route('coupons.form')->with('success', 'Coupon is succesvol opgeslagen.');
    }

}

