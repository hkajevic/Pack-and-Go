<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\OfferModel;
use App\Models\WishlistModel;

/**
 * Ova klasa sadrži funkcije za rad sa korisnikom koji su agencija ili izdavac
 * @version 1.0
 */
class UserWithOffers extends User {

    /**
    * Prikazuje ponude prijavljenog korisnika
    * @author Uroš Stanković
    * @return RedirectResponse preusmerava na stranicu za login ako korisnik nije prijavljen, ako je korisnik prijaveljen prikazuje njegove ponude
    */
    public function showUserOffers() {
        if (!isset($_SESSION['user'])) {
            return redirect()->to(site_url('Guest/showLogin'));
        }
        $user = (new UserModel())->findByUsername($_SESSION['user']);
        if ($user->role != 'AGENCIJA' && $user->role != 'IZDAVAC') {
            return redirect()->to(site_url('User/insufficientPrivileges'));
        }
        $offerModel = new OfferModel();
        $offers = $offerModel->getOffersOf($user->idUser);
        return view('Prototip/agency_offers.php',['offers' => $offers,'columnsPerPage' => 4,'isAgency' => ($user->role == 'AGENCIJA') ? "editAgencyOffer":"editRenterOffer"]);
    }

}
