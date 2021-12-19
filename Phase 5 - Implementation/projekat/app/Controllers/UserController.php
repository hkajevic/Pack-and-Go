<?php namespace App\Controllers;

use App\Models\OfferModel;
use App\Models\UserModel;
/**
 * Ova klasa sadrži funkcije za rad sa korisnikom
 * @version 1.0
 */
class UserController extends BaseController
{
    /*
    protected function prikaz($page, $data) {
        $data['controller']='Gost';
        echo view('sablon/header_gost');
        echo view ("stranice/$page", $data);
        echo view('sablon/footer');
    }
    */

    /**
    * Prikazuje stranicu sa greskom pri poredju ponuda
    * @author Nikola Divnić
    * @param string poruka koja ce se prikazati nadatoj stranici
    * @return string prikaz stranice za poredjenje ponuda sa datom greskom
    */
    public function compareError($message){
        return view('\Prototip\compare_offers.php', ['poruka'=>$message]);
        
    }
    /**
    * Poredi dve ponude
    * @author Nikola Divnić
    * @return string prikaz stranice za poredjenje ponuda
    */	
    public function compare(){
        $prvaPonuda = $this->request->getVar("prvaPonuda");
        $drugaPonuda = $this->request->getVar("drugaPonuda");
        $message = "";
        if($prvaPonuda == "") 
            $message.='Prva ponuda nije uneta<br>';

        if($drugaPonuda == "") 
            $message.='Druga ponuda nije uneta<br>';
        if($message != "") return $this->compareError($message);
        
        $offerModel = new OfferModel();
        $offer=$offerModel->where('idOffer',$prvaPonuda)->findAll();

        if($offer==null) 
            $message.='Prva ponuda ne postoji<br>';

        $offer2=$offerModel->where('idOffer',$drugaPonuda)->findAll();
        
        if($offer2==null) 
            $message.='Druga ponuda ne postoji<br>';
        if($message != "") return $this->compareError($message);
        $userModel = new UserModel();
        $vlasnik = $userModel->like('idUser', $offer[0]->owner)->findAll();
        if ($vlasnik[0]->role == "AGENCIJA") {
            $offer[0]->vlasnik = $vlasnik[0]->name;
        }
        else{
            $offer[0]->vlasnik = $vlasnik[0]->name ."  ". $vlasnik[0]->surname;
        }
        $vlasnik2 = $userModel->like('idUser', $offer2[0]->owner)->findAll();
        if ($vlasnik2[0]->role == "AGENCIJA") {
            $offer2[0]->vlasnik = $vlasnik2[0]->name;
        }
        else{
            $offer2[0]->vlasnik = $vlasnik2[0]->name ."  ". $vlasnik2[0]->surname;
        }

        return view('\Prototip\compare_offers.php', ['prvaPonuda'=>$offer , 'drugaPonuda' =>$offer2]);
    }
    
}
