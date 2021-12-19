<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\OfferModel;
use App\Models\WishlistModel;
use DateTime;

/**
 * Ova klasa sadrži funkcije za rad sa korisnicima
 * @version 1.0
 */

class User extends BaseController
{   
    
    /**
    * Prikazuje listu zelja korisnika
    * @author Ivona Stojanović
    * @return string prikaz stranice sa listom zelja tog korisnika ili prikaz stranice za log in ako korisnik nije ulogovan
    */
    public function showUserWishes() {
        if (!isset($_SESSION['user'])) {
            return redirect()->to(site_url("Guest/showLogin"));
        }
        $userModel = new UserModel();
        $offerModel = new OfferModel();
        $idUser = $userModel->getId($_SESSION['user']);
        
        $offersId = (new WishlistModel())->getWishListOffers($idUser);
        $offers = [];
        foreach($offersId as $offerId) {
            array_push($offers,$offerModel->find($offerId));
        }
        return view('Prototip/wish_list.php',['offers'=>$offers,'columnsPerPage' => 4]);
    }

    /**
    * Odjava korisnika
    * @author Uros Stankovic
    * @return RedirectResponse preusmerava na pocetnu stranicu
    */
    public function logout() {
        session_destroy();
        session();
        return redirect()->to(site_url('Home/index'));
    }

    /**
    * Prikaz stranice koja sluzi za prikaz poruke o nedozvoljenom pristupu
    * @author Uros Stankovic
    * @return string prikaz stranice koja prikazuje poruku o nedozvoljenom prikazu
    */    
    public function insufficientPrivileges() {
        return view('Prototip/insufficient_privileges.php');
    }
    /**
    * Poredjenje dve ponude
    * @author Nikola Divnic
    * @return string prikaz stranice za poredjenje ponuda
    */
	public function compareOffer(){
		return view('\Prototip\compare_offers.php');
	}
  /**
     * @author Halil Kajevic 0553/2018
     * @version 1.0
     * @internal
     * @return potential error message or empty string in case of inproper validation 
     * Represents helper function for data validation
     */
    private function checkData($title, $phone, $price, $location, $dateBegin, $dateEnd, $description, $category){
        $messageToDisplay = "";
        if(empty($title)){
            $messageToDisplay = "Niste uneli naslov vase ponude";
        }
        else if(empty($phone)){
            $messageToDisplay = "Niste uneli telefon za kontakt";
        }
        else if(!is_numeric($phone)){
            $messageToDisplay = "Broj telefona moze sadrzati samo brojeve";
        }
        else if(empty($price)){
            $messageToDisplay = "Niste uneli cenu vase ponude";
        }
        else if(empty($location)){
            $messageToDisplay = "Niste uneli za lokaciju na koju se vasa ponuda odnosi";
        }
        else if(empty($dateBegin)){
            $messageToDisplay = "Niste uneli pocetni datum";
        }
        else if(new DateTime($dateBegin) < new DateTime(date('M d, Y'))){//maj 19,2021
            //echo $dateBegin;
            //echo date('M d, Y');
            $messageToDisplay = "Datum pocetka je u proslosti";
            //echo $pocetak;
        }
        else if(empty($dateEnd)){
            $messageToDisplay = "Niste uneli krajnji datum";
        }
        else if(new DateTime($dateEnd) < new DateTime($dateBegin)){
            $messageToDisplay = "Krajnji datum ne sme biti u proslosti ili pre pocetnog datuma";
        }
        else if($category == 0){
            $messageToDisplay = "Morate izabrati kategoriju";
        }
        else if(empty($description)){
            $messageToDisplay = "Niste uneli opis vase ponude";
        }
        return $messageToDisplay;
    }

    /**
     * @author Halil Kajevic 0553/2018
     * @version 1.0
     * @internal
     * @return string, category in text format 
     * Represents helper function for retriving text category format
     */
    private function checkCategory($category){
        $textCategory = "";
        if($category == 1){ $textCategory = "More"; }
        if($category == 2){ $textCategory = "Planina"; }
        if($category == 3){ $textCategory = "Grad"; }
        if($category == 4){ $textCategory = "Selo"; } 

        return $textCategory;
    }
    /**
     * @author Halil Kajevic 0553/2018
     * @version 1.0
     * @internal
     * @return string, transport in text format 
     * Represents helper function for retriving text transport format
     */
    private function getTransportText($transport){
        $textTransport="";
        if($transport == 0){ $textTransport = "Nema"; }
        if($transport == 1){ $textTransport = "Avion"; }
        if($transport == 2){ $textTransport = "Autobus"; }
        if($transport == 3){ $textTransport = "Brod"; }
        return $textTransport;
    }
    private $offerId=0;
    /**
     * @author Halil Kajevic 0553/2018
     * @version 1.0
     * @internal
     * @return data passed throw arguments by reference
     * Represents helper function for retriving additional priveleges in offer
     */
    private function registerCheckboxFields($checks, &$allinclusive, &$insurance, &$guide, &$breakfast, &$lunch, &$dinner, &$trips, &$internet, &$AC){
        $allinclusive = (!empty($checks[0])? ( ($checks[0] == "on") ? 1 : 0) : 0);
        $insurance = (!empty($checks[1])? ( ($checks[1] == "on") ? 1 : 0) : 0);
        $guide = (!empty($checks[2])? ( ($checks[2] == "on") ? 1 : 0) : 0);
        $breakfast = (!empty($checks[3])? ( ($checks[3] == "on") ? 1 : 0) : 0);
        $lunch = (!empty($checks[4])? ( ($checks[4] == "on") ? 1 : 0) : 0);
        $dinner = (!empty($checks[5])? ( ($checks[5] == "on") ? 1 : 0) : 0);
        $trips = (!empty($checks[6])? ( ($checks[6] == "on") ? 1 : 0) : 0);
        $internet = (!empty($checks[7])? ( ($checks[7] == "on") ? 1 : 0) : 0);
        $AC = (!empty($checks[8])? ( ($checks[8] == "on") ? 1 : 0) : 0);
        
    }
    /**
     * @author Halil Kajevic 0553/2018
     * @version 1.0
     * @internal
     * @return string, accomodation in text format 
     * Represents helper function for retriving text accomodation format
     */
    private function getAccomodationText($accomodation){
        $textAccomodation="";
        if($accomodation == 0){ $textAccomodation = "Nekategorizovan"; }
        if($accomodation == 1){ $textAccomodation = "1 zvezdica"; }
        if($accomodation == 2){ $textAccomodation = "2 zvezdice"; }
        if($accomodation == 3){ $textAccomodation = "3 zvezdice"; }
        if($accomodation == 4){ $textAccomodation = "4 zvezdice"; }
        if($accomodation == 5){ $textAccomodation = "5 zvezdica"; }
        return $textAccomodation;
    }
   /**
     * @author Halil Kajevic 0553/2018
     * @version 1.0
     * @internal
     * @return data passed through arguments 
     * Represents helper function for loading basic data from form
     */
    private function loadBasicData(&$title, &$phone, &$price, 
    &$location, &$dateBegin, &$dateEnd, &$description){
        $title = $_POST["naslov"];
            
        $phone = $_POST["telefon"];
        $price = $_POST["cena"];
        $location = $_POST["lokacija"];

        $dateBegin = $_POST["pocetak"];
        $dateEnd = $_POST["kraj"];
        $description = $_POST["opis"];
    }
    /**
     * @author Halil Kajevic 0553/2018
     * @version 1.0
     * @internal
     * Helper function that creates valid format of date for database 
     * @return void, changes database state 
     */
    private function createDateForDatabase($dateForChecking){
        $months=array(1 => "Jan",2 => "Feb",3 => "Mar",4 => "Apr",5 => "May",6 => "Jun",
        7 => "Jul",8 => "Avg",9 => "Sep",10 => "Okt",11 => "Nov",12 => "Dec");
        if(!empty($dateForChecking)){

            $partsOfDate=explode(",",$dateForChecking);
            if(empty($partsOfDate[1]))return "";
            $year=$partsOfDate[1];
            $secondPartOfDate=explode(" ",$partsOfDate[0]);
            $month=$secondPartOfDate[0];
            $day=$secondPartOfDate[1];

            $monthNumberFormat=array_search($month,$months);

            if($monthNumberFormat < 10) $monthNumberFormat="0".$monthNumberFormat;

            return $year."-".$monthNumberFormat."-".$day." ".date("H").":".date("i").":".date("s");
        }
    }
    /**
    * Brisanje direktorijuma
    * @author Uros Stankovic
    * @param string direktorijum koji se treba obrisati
    * @return bool FALSE ako direktorijum nije obrisan, TRUE ako direktorijum ne postoji ili je obrisan
    */
    private function deleteDirectory($dir) {
		if (!file_exists($dir)) {
			return true;
		}
	
		if (!is_dir($dir)) {
			return unlink($dir);
		}
	
		foreach (scandir($dir) as $item) {
			if ($item == '.' || $item == '..') {
				continue;
			}
	
			if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
				return false;
			}
	
		}
	
		return rmdir($dir);
	}
    /**
     * @author Halil Kajevic 0553/2018
     * @version 1.0
     * Provides renter the ability of adding new offer 
     * @return void, changes database state 
     */
    public function addRenterOffer($addORupdate){
        helper("form");
        $rules =[
            'files'=>[
                'rules' => 'uploaded[files.0]|is_image[files]',
                'label' => 'The File'
            ],

         ];
        $data = [];
        $newId="";

        //PROMENA
        //TODO
        $owner=$_SESSION["autor"]->idUser;
        if($addORupdate == 1){

        }
        $message = "";
        $imageArray = "";
        //echo view('useroffer.php',$data);
        $agencyModel = new OfferModel(); 
        if($addORupdate == 0){
            if($agencyModel->ifHasActiveOffer($owner)){
                return redirect()->to(site_url("UserWithOffers/showUserOffers"));
            }
        }
        if(($_POST || isset($_POST['izmeni'])) && (!isset($_POST['obrisi'])) && (!isset($_POST['odustani']))){

            //echo "usao POst";
            $title=""; $phone=""; $price=""; $location="";
            $dateBegin=""; $dateEnd=""; $description="";
            
            $this->loadBasicData($title, $phone,  $price, $location, $dateBegin, $dateEnd, $description );

           date_default_timezone_set('Europe/Belgrade');

            $category="";
          
           if(!empty($_POST['kat'])){ $category=$_POST['kat']; }

           $off='off';
           $checks=array();
           $provere=[];
           if(!empty($_POST['jelo1'])){
            $provere[0]='on';
           }
           else{
            $provere[0]='off';
           }
           if(!empty($_POST['jelo2'])){
            $provere[1]='on';
           }
           else{
            $provere[1]='off';
           }
           if(!empty($_POST['jelo3'])){
            $provere[2]='on';
           }
           else{
            $provere[2]='off';
           }

           //print_r($checks);
           $message=$this->checkData($title, $phone, $price, $location, $dateBegin, $dateEnd, $description, $category);

           
           $dateBegin = $this->createDateForDatabase($dateBegin);
           $dateEnd = $this->createDateForDatabase($dateEnd);
   
           if($message == ""){
            if($addORupdate == 1){
                $newId = $_SESSION['offerId'];    
                //echo "ID".$newId;
            }      
            else {
                $newId=$agencyModel->getMaxId()+1;
            }
                if($this->validate($rules)){
                    if($imagefile = $this->request->getFiles())
                    {
                        $cnt = 0;
                    foreach($imagefile['files'] as $img)
                    {
                        if ($img->isValid() && ! $img->hasMoved())
                        {
                            $path1="http://localhost/offerpictures";

                            $path = "../../offerpictures/".$newId;
                            $img->move($path,$img->getName());
                            $inDatabase = $path1."/".$newId."/".$img->getName();
                            $imageArray=$imageArray.$inDatabase.";";
                        }
                    }
                    $imageArray=substr($imageArray,0,-1);
                    }
                }
                else{
                    if($addORupdate == 0)
                        $message = "Morate uneti slike i to u nekom od standardnih formata za slike";
                }
            }
            //echo $poruka;
            $data["validacija"] = $message;
            
            if($message == ""){
                //sve je ispravno
                
                $textCategory = $this->checkCategory($category);

                $breakfast=0; $lunch=0; $dinner=0;

                $breakfast = (!empty($provere[0])? (($provere[0] == "on")? 1 : 0) : 0);
                $lunch = (!empty($provere[1])? (($provere[1] == "on")? 1 : 0) : 0);
                $dinner = (!empty($provere[2])? (($provere[2] == "on")? 1 : 0) : 0);

                if($addORupdate == 0){
                    //echo "ovfe1";
                    $agencyModel->addNewOfferRenter($title, $newId, $phone, $price, $location,
                    $dateBegin, $dateEnd, $textCategory, $breakfast,
                    $lunch, $dinner, $owner, "Na cekanju", "0000-00-00 00:00:00",
                    $description, $imageArray );
                    return redirect()->to(site_url("UserWithOffers/showUserOffers"));
                    //$data["validacija"]="Uspesno ste dodali ponudu!!!";
                }
                if($addORupdate == 1){
                    $pics=$_SESSION['images'];
                    if(($pics != "") && ($imageArray!="")){
                        $imageArray=$pics.";".$imageArray;
                    }
                else{
                    if(($pics != "")){
                        $imageArray=$pics;
                    }
                }
                    //echo "ovfe2";
                    //echo $newId;
                    $agencyModel->updateRenterOffer($title, $newId, $phone, $price, $location,
                    $dateBegin, $dateEnd, $textCategory, $breakfast,
                    $lunch, $dinner, $owner, "Na cekanju", "0000-00-00 00:00:00",
                    $description, $imageArray );
                    return redirect()->to(site_url("UserWithOffers/showUserOffers"));
                    //$data["validacija"]="Uspesno ste promenili ponudu!!!";
                }
  
            }
        }
        else if(isset($_POST['obrisi'])){
            //echo "brisanje";
            $editOfferUserModel=new OfferModel();
            $wishListModel = new WishlistModel();
            $idd=$_SESSION['offerId'];
            $wishListModel->deleteAllWishesWhereOffer($idd);
            $editOfferUserModel->obrisiPonudu($idd);
            $this->deleteDirectory("../../offerpictures/$idd");//final
            return redirect()->to(site_url("UserWithOffers/showUserOffers"));
        }
        else if(isset($_POST['odustani'])){
            return redirect()->to(site_url("UserWithOffers/showUserOffers"));
        }
        if($addORupdate == 1) {
            $ido=$_SESSION['offerId'];
            $dataTo=$this->loadDataFromDatabaseAndShowOnFormRenter($ido);
            $dataTo['validacija']=$message;
            return view('editofferuser.php',$dataTo);
        }
        return view('useroffer.php',$data);
    }
/**
     * @author Halil Kajevic 0553/2018
     * @version 1.0
     * Provides agency the ability of adding new offer 
     * @return void, changes database state 
     */
    public function addAgencyOffer($addORupdate, $idOffer=-1){
        helper("form");
        $rules =[
            'files'=>[
                'rules' => 'uploaded[files.0]|is_image[files]',
                'label' => 'The File'
            ],

         ];
        $data = [];
        $newId="";
        $owner=$_SESSION["autor"]->idUser;
        $imageArray = "";
        
        $agencyModel = new OfferModel();

        if($_POST){
            //echo "Usao";

            $title=""; $phone=""; $price=""; $location="";
            $dateBegin=""; $dateEnd=""; $description="";
            
            $this->loadBasicData($title, $phone,  $price, $location, $dateBegin, $dateEnd, $description );
           

           date_default_timezone_set('Europe/Belgrade');

            
            $message = ""; $category="";
           
            if(!empty($_POST['kat'])){ $category=$_POST['kat']; }
            
            $transport="";
            if(!empty($_POST['prev'])){ $transport=$_POST['prev']; }

            $accomodation="";
            if(!empty($_POST['accomodation'])){ $accomodation=$_POST['accomodation']; }

            $off='off';
            $checks=array();
            $provere=[];
            if(!empty($_POST['polje1'])){
                $provere[0]='on';
            }
            else{
                $provere[0]='off';
            }
            if(!empty($_POST['polje2'])){
                $provere[1]='on';
            }
            else{
                $provere[1]='off';
            }
            if(!empty($_POST['polje3'])){
                $provere[2]='on';
            }
            else{
                $provere[2]='off';
            }
            if(!empty($_POST['polje4'])){
                $provere[3]='on';
            }
            else{
                $provere[3]='off';
            }
            if(!empty($_POST['polje5'])){
                $provere[4]='on';
            }
            else{
                $provere[4]='off';
            }
            if(!empty($_POST['polje6'])){
                $provere[5]='on';
            }
            else{
                $provere[5]='off';
            }
            if(!empty($_POST['polje7'])){
                $provere[6]='on';
            }
            else{
                $provere[6]='off';
            }
            if(!empty($_POST['polje8'])){
                $provere[7]='on';
            }
            else{
                $provere[7]='off';
            }
            if(!empty($_POST['polje9'])){
                $provere[8]='on';
            }
            else{
                $provere[8]='off';
            }
   
            $message=$this->checkData($title, $phone, $price, $location, $dateBegin, $dateEnd, $description, $category);
            $dateBegin = $this->createDateForDatabase($dateBegin);
            $dateEnd = $this->createDateForDatabase($dateEnd);
    
           if($message == ""){
            if($addORupdate == 1){
                $newId = $_SESSION['offerId'];    
            }      
            else {
                $newId=$agencyModel->getMaxId()+1;
            }
            if($this->validate($rules)){
                if($imagefile = $this->request->getFiles())
                {
                    $cnt = 0;
                   foreach($imagefile['files'] as $img)
                   {
                      if ($img->isValid() && ! $img->hasMoved())
                      {
                        $path1="http://localhost/offerpictures";
                        
                        $path = "../../offerpictures/".$newId;
                        $img->move($path,$img->getName());
                        $inDatabase = $path1."/".$newId."/".$img->getName();
                        $imageArray=$imageArray.$inDatabase.";";
                      }
                   }
                   $imageArray=substr($imageArray,0,-1);
                }
            }
            else{
                if($addORupdate == 0)
                    $message = "Morate uneti slike i to u nekom od standardnih formata za slike";
            }
        }
            //echo $poruka;
            $data["validacija"] = $message;

            if($message == ""){
                //sve je ispravno

                $textCategory = $this->checkCategory($category);

                $allinclusive = 0; $insurance = 0; $guide = 0;
                $breakfast = 0; $lunch = 0; $dinner = 0;
                $trips = 0; $internet = 0; $AC = 0;

                $this->registerCheckboxFields($provere, $allinclusive, $insurance, $guide, $breakfast, $lunch, $dinner, $trips, $internet, $AC);

                $textTransport=$this->getTransportText($transport);

                $textAccomodation= $this->getAccomodationText($accomodation);

                if($addORupdate == 0){
                    $agencyModel->addNewOfferAgency($title, $newId, $phone, $price, $location,
                    $dateBegin, $dateEnd, $textTransport, $textAccomodation, $textCategory, $allinclusive, $insurance, $guide, $breakfast,
                    $lunch, $dinner, $trips, $internet, $AC, $owner, "Na cekanju","0000-00-00 00:00:00",
                    $description, $imageArray );
                    //UserWithOffers/showUserOffers
                    return redirect()->to(site_url("UserWithOffers/showUserOffers"));
                    //$data["validacija"]="Uspesno ste dodali ponudu!!!";
                }
                    if($addORupdate == 1){
                        $pics=$_SESSION['images'];
                        if(($pics != "") && ($imageArray!="")){
                            $imageArray=$pics.";".$imageArray;
                        }
                    else{
                        if(($pics != "")){
                            $imageArray=$pics;
                        }
                    }
                    $agencyModel->updateOfferAgency($title, $newId,$phone, $price, $location,
                    $dateBegin, $dateEnd, $textTransport,$textAccomodation,$textCategory, $allinclusive,$insurance,$guide,$breakfast,
                    $lunch, $dinner, $trips, $internet, $AC, $owner, "Na cekanju","0000-00-00 00:00:00",
                    $description, $imageArray);
                    return redirect()->to(site_url("UserWithOffers/showUserOffers"));
                    //$data["validacija"]="Uspesno ste promenili ponudu!!!";
                }
            }
        }
        if($addORupdate == 1) {
            $ido=$_SESSION['offerId'];
            $dataTo=$this->loadDataFromDatabaseAndShowOnFormAgency($ido);
            $dataTo['validacija']=$message;
            return view('editofferagency.php',$dataTo);
        }
        return view('agencyoffer.php',$data);

    }
    /**
     * @author Halil Kajevic 0553/2018
     * @version 1.0
     * Provides renter the ability of adding new offer 
     * @return void, changes database state 
     */
    private function loadDataFromDatabaseAndShowOnFormRenter($idOffer){
        $owner=$_SESSION["autor"]->idUser;

        $editOfferUserModel = new OfferModel();
        $data = $editOfferUserModel->loadData($idOffer);

        $dataToSend=[];

        $dataToSend['idOffer']      = $data->idOffer;
        $dataToSend['title']        = $data->title;
        $dataToSend['phone']        = $data->phone;
        $dataToSend['price']        = $data->price;
        $dataToSend['location']     = $data->location;

        $startDateWithoutTime = explode(" ", $data->startDate);
        $endDateWithoutTime = explode(" ", $data->endDate);

        $firstParts=explode("-",$startDateWithoutTime[0]);
        $secondParts=explode("-",$endDateWithoutTime[0]);
        $months1=array("Jan" => 1,"Feb" => 2,"Mar" => 3,"Apr" => 4,"May" => 5,"Jun" => 6,
        "Jul" => 7,"Avg" => 8,"Sep" => 9,"Okt" => 10,"Nov" => 11,"Dec" => 12);

        //$dataToSend['startDate']    = $startDateWithoutTime[0];
        //$dataToSend['endDate']      = $endDateWithoutTime[0] ;
        $date1=array_search($firstParts[1],$months1)." ".$firstParts[2].", ".$firstParts[0];
        $date2=array_search($secondParts[1],$months1)." ".$secondParts[2].", ".$secondParts[0];
        $dataToSend['startDate'] = $date1;
        $dataToSend['endDate'] = $date2;
        $dataToSend['category']     = $data->category;
        $dataToSend['status']       = $data->status;
        
        $dataToSend['breakfast']    = $data->breakfast;
        $dataToSend['lunch']        = $data->lunch;
        $dataToSend['dinner']       = $data->dinner;

        $dataToSend['description']  = $data->description;
        $dataToSend['pictures']     = $data->pictures;

        $imagePaths=explode(";",$data->pictures);

        $dataToSend['paths']=$imagePaths;
        $_SESSION['images']=$data->pictures;

        return $dataToSend;
    }
    /**
    * Prikaz stranice za izmenu ponude
    * @author Halil Kajevic
    * @return string prikaz stranice za izmenu ponude ili ako korisnik nema pravo izmene ponude preusmeravanje na stranicu za nedovoljno privilegija
    */
    public function showEdit($idOffer){
		if (!isset($_SESSION['user'])) {
			return view('\Prototip\insufficient_privileges.php');
		}
        $dataToSend=$this->loadDataFromDatabaseAndShowOnFormAgency($idOffer);
        return view('editofferagency.php',$dataToSend);
    }
  /**
     * @author Halil Kajevic 0553/2018
     * @version 1.0
     * @return void, but loads data from database to form 
     * Represents helper function for data loading
     */
    public function loadDataFromDatabaseAndShowOnFormAgency($idOffer){
		if (!isset($_SESSION['user']) || $_SESSION['autor']->role != 'AGENCIJA') {
			return view('\Prototip\insufficient_privileges.php');
		}
        $owner=$_SESSION["autor"]->idUser;

        $editOfferAgencyModel = new OfferModel();
        $data = $editOfferAgencyModel->loadData($idOffer);

        $dataToSend=[];
      
        $dataToSend['idOffer']      =$data->idOffer;
        $dataToSend['title']        = $data->title;
        $dataToSend['phone']        = $data->phone;
        $dataToSend['price']        = $data->price;
        $dataToSend['location']     = $data->location;

        $startDateWithoutTime = explode(" ", $data->startDate);
        $endDateWithoutTime = explode(" ", $data->endDate);

        $firstParts=explode("-",$startDateWithoutTime[0]);
        $secondParts=explode("-",$endDateWithoutTime[0]);
        $months1=array("Jan" => 1,"Feb" => 2,"Mar" => 3,"Apr" => 4,"May" => 5,"Jun" => 6,
        "Jul" => 7,"Avg" => 8,"Sep" => 9,"Okt" => 10,"Nov" => 11,"Dec" => 12);

        $date1=array_search($firstParts[1],$months1)." ".$firstParts[2].", ".$firstParts[0];
        $date2=array_search($secondParts[1],$months1)." ".$secondParts[2].", ".$secondParts[0];
        $dataToSend['startDate'] = $date1;
        $dataToSend['endDate'] = $date2;

        $dataToSend['category']     = $data->category;
        $dataToSend['allInclusive'] = $data->allinclusive;
        $dataToSend['insurance']    = $data->insurance;

        $dataToSend['transport']    = $data->transport;
        $dataToSend['accomodation'] = $data->accomodation;
        
        $dataToSend['guide']        = $data->guide;
        $dataToSend['trips']        = $data->trips;
        $dataToSend['internet']     = $data->internet;
        $dataToSend['AC']           = $data->AC;
        $dataToSend['status']       = $data->status;
        
        $dataToSend['breakfast']    = $data->breakfast;
        $dataToSend['lunch']        = $data->lunch;
        $dataToSend['dinner']       = $data->dinner;

        $dataToSend['description']  = $data->description;
        $dataToSend['pictures']     = $data->pictures;

        $imagePaths=explode(";",$data->pictures);

        $dataToSend['paths']=$imagePaths;
        $_SESSION['images']=$data->pictures;
        //echo $imagePaths;

        return $dataToSend;
    }
   /**
     * @author Halil Kajevic 0553/2018
     * @version 1.0
     * @param idOffer represents offer id
     * @param updateORdelete represents offer id
     * @return void, but changes database state 
     * Represents one of the main functions for editing offer
     */
    public function editRenterOffer($idOffer, $updateORdelete=0){
		if (!isset($_SESSION['user']) || $_SESSION['autor']->role != 'IZDAVAC') {
			return view('\Prototip\insufficient_privileges.php');
		}
        helper("form");
        $owner=$_SESSION["autor"]->idUser;

        $editOfferUserModel = new OfferModel();

        $data1 = $this->loadDataFromDatabaseAndShowOnFormRenter($idOffer);
        $data1['id']=$idOffer;

        if(isset($_POST['izmeni'])){
           $_SESSION['offerId']=$idOffer;
           //echo $idOffer;
           $this->addRenterOffer(1);
           return redirect()->to(site_url("UserWithOffers/showUserOffers"));
        }
        if(isset($_POST['izbrisi'])){
            $wishListModel = new WishlistModel();
            $wishListModel->deleteAllWishesWhereOffer($idOffer);
            $editOfferUserModel->obrisiPonudu($idOffer);
            $this->deleteDirectory("../../offerpictures/$idOffer");//final
        }
        if(isset($_POST['odustani'])){
            return redirect()->to(site_url("UserWithOffers/showUserOffers"));
        }
        //check argument dataToSend
        return view('editofferuser.php', $data1);
    }
    /**
     * @author Halil Kajevic 0553/2018
     * @version 1.0
     * @param idOffer represents offer id
     * @param updateORgiveup represents offer id
     * @return void, but changes database state 
     * Represents one of the main functions for editing offer
     */
    public function editAgencyOffer($idOffer, $updateORgiveup){
		if (!isset($_SESSION['user']) || $_SESSION['autor']->role != 'AGENCIJA') {
			return view('\Prototip\insufficient_privileges.php');
		}
        helper("form");

        //echo $idOffer;
        $this->offerId = $idOffer;
        $owner=$_SESSION["autor"]->idUser;
       
        $dataToSend=$this->loadDataFromDatabaseAndShowOnFormAgency($idOffer);

        if( $updateORgiveup == 0){
            $_SESSION['offerId']=$idOffer;
            $this->addAgencyOffer(1);
            return redirect()->to(site_url("UserWithOffers/showUserOffers"));
        }
        if( $updateORgiveup == 1){
            //final
            return redirect()->to(site_url("UserWithOffers/showUserOffers"));
        }
        return view('editofferagency.php',$dataToSend);
    }
}