<?php namespace App\Controllers;

use App\Models\OfferModel;
use App\Models\UserModel;
use App\Models\WishlistModel;

/**
 * Ova klasa sadrži funkcije za rad sa ponudama
 * @version 1.0
 */
 
class Offer extends BaseController
{   
    /**
    * Prikazuje ponudu sa datim id-om ponude
    * @author Ivona Stojanović
    * @param int $idOffer id ponude koju zelimo da prikazemo
    * @return string prikaz ponunde sa zadatim id-om
    */
    public function showOffer($idOffer) {
        $offer = (new OfferModel())->find($idOffer);
        return view('Prototip/offer.php',['offer' => $offer]);
    }

    /**
    * Dodaje ili uklanja ponudu u listu želja korisnika u zavisnosti da li se ona prethodno nalazila ili ne u njegovoj listi želja
    * @author Uroš Stanković
    * @param int $idOffer id ponude koju zelimo da prikazemo
    * @return bool uspešnost, ako korisnik nije ulogovan ili ako korisnik ne postoji funckija će vratiti FALSE u suprotnom TRUE
    */
    private function toggleWishlistImpl($idOffer) {
        if (!isset($_SESSION['user'])) {
            return false;
        }
        $user = $_SESSION['user'];
        if ($user == null) {
            return false;
        }
        $wishlistModel = new WishlistModel();
        $userModel = new UserModel();
        $wishList = $wishlistModel->where('iduser',$userModel->getId($user))->findAll();
        $index = 0;
        $position = -1;
        foreach ($wishList as $wish) {
            if ($wish->idoffer == $idOffer) {
                $position = $index;
                break;
            }
            $index++;
        }
        if ($position == -1) {
            $wishlistModel->insert(['iduser'=>$userModel->getId($user),'idoffer'=>$idOffer]);
            
        }
        else {
            $wishlistModel->where(['iduser'=>$userModel->getId($user),'idoffer'=>$idOffer])->delete();
        }
        return true;
    }
	
    /**
    * Poziva metodu toggleWishlistImpl koja će dodati ili ukloniti ponudu iz liste želja u zavisnosti da li se ona nalazi u listi želja i na osnovu
    * uspeha ako je TRUE ostaje na istoj strani, FALSE prikazuje stranicu za login
    * @author Uroš Stanković
    * @return RedirectResponse stranicu za prikaz
    */
    public function toggleWishlist() {
        $success = $this->toggleWishlistImpl($_POST['wishListOffer']);
        if (!$success) {
            return redirect()->to(site_url('Guest/showLogin'));
        }
        return redirect()->to($_POST['returnUrl']);
    }

    /**
    * Prikazuje sve ponude sa filterima ili bez
    * @author Ivona Stojanović, Uroš Stanković
    * @return string prikaz stranice sa svim ponudama
    */
    private function filterOfferByTitle($offersQuery,$text){
        
    }

    public function showAllOffers() {
        if (isset($_POST['wishListOffer'])) {
            if ($_POST['wishListOffer'] != -1) {

                $succeed = $this->toggleWishlistImpl($_POST['wishListOffer']);
                if (!$succeed) {
                    return redirect()->to(site_url('Guest/showLogin'));
                }
                unset($_POST['wishListOffer']);
            }
        }
        $page = null;
        if (isset($_POST['page'])) {
            $page = $_POST['page'];
        }
        else if (isset($_POST['pageInc'])) {
            $page = $_POST['pageInc'];
        }
        else if (isset($_POST['pageDec'])) {
            $page = $_POST['pageDec'];
        }
        if ($page == null ) {
            $page = 1;
        }


        $offerModel = new OfferModel();
        $offersPerPage = 12;
        $offersQuery = null;
        $options = [];

        

        if (isset($_POST['sort'])) {

            $options = $_POST;
           
            $sort = $_POST['sort'];
            if ($sort == 'Novije') {
                $offersQuery = $offerModel->orderBy('published','desc');
            }
            else if ($sort == 'Starije') {
                $offersQuery = $offerModel->orderBy('published','asc');
            }
            else if ($sort == 'Ceni uzlazno') {
                $offersQuery = $offerModel->orderBy('price','asc');
            }
            else if ($sort == 'Ceni silazno') {
                $offersQuery = $offerModel->orderBy('price','desc');
            }

            if (isset($_POST['searchText'])) {
                $text = $_POST['searchText'];
                if(!empty($text)){
                    $offersQuery = $offersQuery->like('title', $text);
                }
            }


            $category = $_POST['category'];
            if ($category == 'More') {
                $offersQuery = $offersQuery->where('category','More');
            }
            else if ($category == 'Planina') {
                $offersQuery = $offersQuery->where('category','Planina');
            }
            else if ($category == 'Grad') {
                $offersQuery = $offersQuery->where('category','Grad');
            }
            else if ($category == 'Selo') {
                $offersQuery = $offersQuery->where('category','Selo');
            }
            $transport = $_POST['transport'];
            if ($transport == 'Avion') {
                $offersQuery = $offersQuery->where('transport','Avion');
            }
            else if ($transport == 'Autobus') {
                $offersQuery = $offersQuery->where('transport','Autobus');
            }
            else if ($transport == 'Brod') {
                $offersQuery = $offersQuery->where('transport','Brod');
            }
            else if ($transport == 'Bez') {
                $offersQuery = $offersQuery->where('transport','Bez');
            }
            $accomodation = $_POST['accomodation'];
            if ($accomodation == 'Nekategorizovan') {
                $offersQuery = $offersQuery->where('accomodation','Nekategorizovan');
            }
            else if ($accomodation == '1 zvezdica') {
                $offersQuery = $offersQuery->where('accomodation','1 zvezdica');
            }
            else if ($accomodation == '2 zvezdice') {
                $offersQuery = $offersQuery->where('accomodation','2 zvezdice');
            }
            else if ($accomodation == '3 zvezdice') {
                $offersQuery = $offersQuery->where('accomodation','3 zvezdice');
            }
            else if ($accomodation == '4 zvezdice') {
                $offersQuery = $offersQuery->where('accomodation','4 zvezdice');
            }
            else if ($accomodation == '5 zvezdica') {
                $offersQuery = $offersQuery->where('accomodation','5 zvezdica');
            }
           
            $minPrice = $_POST['minprice'];
            if (strlen($minPrice)>0) {
                $offersQuery = $offersQuery->where("price >= $minPrice");
            }
         
            $maxPrice = $_POST['maxprice'];
            if (strlen($maxPrice)>0) {
                $offersQuery = $offersQuery->where("price <= $maxPrice");
            }
         
            if (isset($_POST['allinclusive'])) {
                $offersQuery = $offersQuery->where('allinclusive','1');
            }
            if (isset($_POST['insurance'])) {
                $offersQuery = $offersQuery->where('insurance','1');
            }
            if (isset($_POST['guide'])) {
                $offersQuery = $offersQuery->where('guide','1');
            }
            if (isset($_POST['breakfast'])) {
                $offersQuery = $offersQuery->where('breakfast','1');
            }
            if (isset($_POST['lunch'])) {
                $offersQuery = $offersQuery->where('lunch','1');
            }
            if (isset($_POST['dinner'])) {
                $offersQuery = $offersQuery->where('dinner','1');
            }
            if (isset($_POST['trips'])) {
                $offersQuery = $offersQuery->where('trips','1');
            }
            if (isset($_POST['internet'])) {
                $offersQuery = $offersQuery->where('internet','1');
            }
            if (isset($_POST['ac'])) {
                $offersQuery = $offersQuery->where('AC','1');
            }
            $offersQuery = $offersQuery->where('status','Odoborena');
            $offers = $offersQuery->findAll();
            $count = count($offers);

            $offers = array_slice($offers,($page-1)*$offersPerPage,$offersPerPage);
        }
        else {
            $offers = $offerModel->where('status','Odoborena')->findAll($offersPerPage,($page-1)*$offersPerPage);
            $count = count($offerModel->findAll());
        }
        
        $totalPages = ceil($count / (float)$offersPerPage);
        
        return \view('Prototip/offer_preview.php',['page' => $page,'columnsPerPage' => 4,'offers' => $offers,'totalPages' => $totalPages,'options' => $options]);
    }
}