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
        // deze functie haalt alle coupons op en laat ze zien op de shop pagina
        $coupons = Coupon::with('gebruiker')->get();
        return view('coupons\shop', compact('coupons'));
    }
    public function show()
    {
        // laat alle coupons zien die bij de gebruiker horen
        $user = Auth::user();
        $gebruiker = Coupon::with('gebruiker')->get();
        $coupons = CouponHasUser::where('user_iduser', $user->id)->get();
        return view('coupons\usercoupon', compact('coupons', 'gebruiker'));
    }
    public function buy(Request $request)
    {
        $user = Auth::user();
        //haalt punten op van de gebruiker en checkt of de gebruiker genoeg heeft
        // zo niet stopt de funcite en geeft het een error mee met waarom het niet is gelukt\
        // zowel gaat het verder en geeft het een succes mee
        $couponPrijs = $request->input('Puntenprijs');
        $huidigePunten = $user->punten;
        $nieuwePunten = $huidigePunten - $couponPrijs;

        if ($nieuwePunten >= 0) {
            $user->punten = $nieuwePunten;
            $user->save();

            $coupons_has_user = new CouponHasUser();
            $coupons_has_user->user_iduser = $user->id;
            $coupons_has_user->coupons_idcoupons = $request->input('coupon_id');
            $coupons_has_user->save();

            return redirect()->route('coupons.show')->with('success', 'Coupon succesvol gekocht!');
        } else {
            return redirect()->back()->with('error', 'Onvoldoende punten om de coupon te kopen.');
        }
    }
    public function form()
    {
        //laat het createcoupon.blade bestand zien om coupons mee te maken
        return view('coupons\createcoupon');
    }
    public function send(Request $request)
    {
        //check of de gegevens voldoen aan de vereisten
        $validatedData = $request->validate([
            'omschrijving' => 'required|string',
            'waarde' => 'required|numeric',
            'eenheid' => 'required|string',
            'puntenprijs' => 'required|numeric',
            'einddatum' => 'required|date',
        ]);
        // maak een nieuwe coupon regel aan met de doorgestuurde gegevens
        $coupon = new Coupon();
        $user = Auth::user();
        $coupon->omschrijving = $validatedData['omschrijving'];
        $coupon->waarde = $validatedData['waarde'];
        $coupon->eenheid = $validatedData['eenheid'];
        $coupon->puntenprijs = $validatedData['puntenprijs'];
        $coupon->einddatum = $validatedData['einddatum'];
        $coupon->user_iduser = $user->id;

        $coupon->save();
        // als alles goed gaat geeft het een succces bericht mee 
        return redirect()->route('coupons.form')->with('success', 'Coupon is succesvol opgeslagen.');
    }

}

