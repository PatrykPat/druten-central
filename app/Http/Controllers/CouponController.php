<?php
//steven 13-5-2024 
//funcites read edit delete en update gemaakt
namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\CouponHasUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
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


    //functie om alle couopns op te halen die een bedrijf heeft gemaakt.
    //deze functie is bedoeld voor een bedrijf.
    //de functie haalt eerst het id op van het bedrijf dat is ingelogd.
    //vervolgens pakt hij elke couopn die ook dat id heeft.
    public function Read()
    {
        $userId = auth()->user()->id;
        $Coupons = Coupon::where('user_iduser', $userId)->get();
        return view('coupons.readcoupons', compact('Coupons'));
    }

    //deze functie is voor het verwijderen van een coupon als bedrijf zijnde
    public function Delete(Request $request, $id)
    {
        // Controleer of de coupon al een keer is verkocht door te kijken of het
        //al bestaad in de user_has_coupon tabel
        $userHasCoupon = CouponHasUser::where('coupons_idcoupons', $id)->first();

        //als de coupon al een keer is gekocht wordt de functie gestopt en wordt
        //er niks verwijderd. ook krijgt de bedrijf een error melding terug
        if ($userHasCoupon) {
            return redirect()->back()->with('error', 'deze coupon is al een keer
             verkocht en kan dus niet verwijderd worden');
        }

        // als alles is gelukt verwijder de coupon
        $Coupon = Coupon::findOrFail($id);
        $Coupon->delete();

        // als alles is gelukt krijgt de bedrijf een succes melding
        return redirect()->route('coupon.read')->with('success', 'Coupon succesvol verwijderd.');
    }

    //deze functie is voor het doorsturen naar de edit pagina
    public function Edit($id)
    {
        // Controleer of de coupon al een keer is verkocht
        $userHasCoupon = CouponHasUser::where('coupons_idcoupons', $id)->first();

        //als de coupon al een keer is gekocht wordt de functie gestopt en wordt
        //er niks geupdate. ook krijgt de bedrijf een error melding terug
        if ($userHasCoupon) {
            return redirect()->back()->with('error', 'deze coupon is al een keer
             verkocht en kan dus niet geüpdate worden');
        }

        $Coupon = Coupon::findOrFail($id);
        return view('coupons.editcoupon', compact('Coupon'));
    }

    //deze functie is voor het verwerken van de gegevens die geupdate moeten worden
    public function Update(Request $request, $id)
    {
        //valideer of de gegevens normale gegevens zijn en geen rare karakters
        $request->validate([
            'Omschrijving' => 'required|string',
            'Waarde' => 'required|string',
            'Eenheid' => 'required|string',
            'Puntenprijs' => 'required|int',
            'Einddatum' => 'required|date'
        ]);

        // Vind de coupon die geupdate moet worden
        $Coupon = Coupon::findOrFail($id);

        // Update de coupon
        $Coupon->update([
            'Omschrijving' => $request->input('Omschrijving'),
            'Waarde' => $request->input('Waarde'),
            'Eenheid' => $request->input('Eenheid'),
            'Puntenprijs' => $request->input('Puntenprijs'),
            'Einddatum' => $request->input('Einddatum')
        ]);
        //als alles is gelukt wordt je terug gestuurd naar de coupon pagina 
        // met een succes bericht
        return redirect()->route('coupon.read')->with('success', 'Coupon succesvol geüpdate.');
    }


}