<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\OfferModel;
use App\Models\WishlistModel;

/**
 * Ovo klasa treba da omoguci sve funkcionalnosti administratora
 * @version 1.0
 * @author Nikola Divnic, Uros Stankovic, Ivona Stojanovic
 */
 
class Admin extends BaseController
{

    /**
    * Obrada unetih informacija za brisanje korisnika iz baze
    * @return String prikaz ponuda za odobravanje
    * @version 1.0
    * @author Uros Stankovic, Ivona Stojanovic
    */
    public function showRemoveUsers() {
        $userModel = new UserModel();
        if (isset($_POST['pib'])) {
            $agency = $userModel->findByPIB($_POST['pib']);
            if ($agency == null) {
                return view('Prototip/user_remove.php',['errorMsg' => "Agencija sa zadatim pibom ne postoji u bazi"]);
            }
            else {
                return view('Prototip/user_remove.php',['agency' => $agency]);
            }
        }
        else if (isset($_POST['jmbg'])) {
            $private = $userModel->findByJMBG($_POST['jmbg']);
            if ($private == null) {
                return view('Prototip/user_remove.php',['errorMsg' => "Privatni izdavac sa zadatim jmbg-om ne postoji u bazi"]);
            }
            else {
                return view('Prototip/user_remove.php',['private' => $private]);
            }
        }
        else if (isset($_POST['user'])) {
            $user = $userModel->findByUsername($_POST['user']);
            if ($user == null) {
                return view('Prototip/user_remove.php',['errorMsg' => "Korisnik sa zadatim korisnickim imenom ne postoji u bazi"]);
            }
            else {
                return view('Prototip/user_remove.php',['user' => $user]);
            }
        }
        
        return view('Prototip/user_remove.php');
        
    }

    /**
     * Brisanje korisnika iz baze
     * @return RedirectResponse prikaz ponuda za odobravanje
     * @version 1.0
     * @param int $idUser id korisnika 
     * @author Uros Stankovic, Ivona Stojanovic
     */
    public function removeUser($idUser) {
        $userModel = new UserModel();
        if ($userModel->find($idUser)->role == "ADMIN") {
            return view('Prototip/user_remove.php',['errorMsg' => "Nije moguce brisanje admina"]);
        }
        $offerModel = new OfferModel();
        $wishListModel = new WishlistModel();
        foreach ($offerModel->getOffersOf($idUser) as $offer) {
            $wishListModel->deleteAllWishesWhereOffer($offer->idOffer);
        }
        $wishListModel->deleteAllWishesOf($idUser);

        $offerModel->deleteAllOffersOf($idUser);
        $userModel->delete($idUser);
        return redirect()->to(site_url('Admin/showRemoveUsers'));
    }
   
    /**
    * prikaz agencija
    * @return String prikaz agencija za odobravanja
    * @version 1.0
    * @author Nikola Divnic
    */
    public function showAgency() {
        $userModel = new UserModel(); 
        $agencije = $userModel->like('role', "AGENCIJA")->like('agency_verified',0)->findAll();
        return view('\Prototip\validate_agency.php',["agencijeNaCekanju" => $agencije]);
    }
 
	
	/**
    * odobravanje agencije
    * @return RedirectResponse prikaz ponuda za odobravanje
    * @version 1.0
    * @param int $idUser id agencije 
    * @author Nikola Divnic
    */
     public function approveAgency($idUser) {
          $userModel = new UserModel();
          $agencija = ($userModel)->find($idUser);

          $nazivAgencije = $agencija->name;
          $imePrezimeVlasnika =$agencija->surname;
          $korisnickoIme= $agencija->username;
          $lozinka = $agencija->password;
          $email = $agencija->email;
          $jmbg = $agencija->pib;
          $lokacija= $agencija->location;
          $telefon = $agencija->phone;
          $userModel = new UserModel();    
          $userModel->update($idUser,['agency_verified' => 1]);
       
          return redirect()->to(site_url('Admin/showAgency'));
      }

    /**
    * brisanje agencije
    * @return String prikaz ponuda za odobravanje
    * @version 1.0
    * @param int $idUser id agencije 
    * @author Nikola Divnic
    */
    public function removeAgency($idUser) {
        
            $userModel = new UserModel();    
            $userModel->where(['iduser'=>$idUser])->delete();
            return $this->showAgency();
    }
  
    /**
    * prikaz ponuda koje admin treba da odobri
    * @return String prikaz ponuda za odobravanje
    * @version 1.0 
    * @author Nikola Divnic
    */
    public function showOfferOnWait() {
        $offerModel= new OfferModel(); 
        $userModel = new UserModel();
        $ponude = $offerModel->like('status', "Na cekanju")->findAll();
        for ($i=0; $i < count($ponude); $i++) { 
            $vlasnik = $userModel->like('idUser', $ponude[$i]->owner)->findAll();
            $ponude[$i]->vlasnik = $vlasnik[0]->name;
        }
        
        
        return view('\Prototip\accept_offer.php',["ponudeNaCekanju" => $ponude]);
    }

    /**
    * brisanje ponude
    * @return String prikaz ponuda za odobravanje
    * @version 1.0
    * @param int $idOffer id ponude 
    * @author Nikola Divnic
    */
    public function removeOffer($idOffer) {
        
            $oferModel = new OfferModel();    
            $oferModel->where(['idOffer'=>$idOffer])->delete();
            return $this->showOfferOnWait();
    }
 
    /**
    * odobravanje ponude
    * @return String prikaz ponuda za odobravanje 
    * @version 1.0 
    * @param int $idOffer id ponude 
    * @author Nikola Divnic
    */
    public function approveOffer($idOffer) {
        $oferModel = new OfferModel();
        $offer = ($oferModel)->find($idOffer);
        
        $title = $offer->title;
        $idOffer =$offer->idOffer;
        $phone= $offer->phone;
        $price = $offer->price;
        $location = $offer->location;
        $startDate = $offer->startDate;
        $endDate= $offer->endDate;
        $transport = $offer->transport;

        $accomodation = $offer->accomodation;
        $category =$offer->category;
        $allinclusive= $offer->allinclusive;
        $insurance = $offer->insurance;
        $guide = $offer->guide;
        $breakfast = $offer->breakfast;
        $lunch= $offer->lunch;
        $dinner = $offer->dinner;

        $trips = $offer->trips;
        $internet =$offer->internet;
        $AC= $offer->AC;
        $owner = $offer->owner;
        $status = "Odoborena";
        $published = $offer->published;
        $description= $offer->description;
        $pictures = $offer->pictures;
          
        $oferModel->update($idOffer,['status' => 'Odoborena']);
        
        return $this->showOfferOnWait();
    }    
}