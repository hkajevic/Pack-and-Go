<?php namespace App\Models;

use CodeIgniter\Model;

/**
* Ova klasa predstavlja Model koji će raditi sa bazom
* @version 1.0
*/
 
class OfferModel extends Model
{
        protected $table      = 'offer';
        protected $primaryKey = 'idOffer';
        protected $returnType = 'object';
        protected $allowedFields = ['title','idOffer','phone','price','location','startDate','endDate','transport','accomodation','category','allinclusive' ,'insurance' ,'guide','breakfast','lunch','dinner','trips' ,'internet' ,'AC','owner','status','published' ,'description' , 'pictures'];

        /**
        * @author Uroš Stanković
        * Brise sve ponude jednog korisnika
        * @param int $idUser je celebrojna promenljiva koja predstavlja id korisnika za kojeg zelimo da obrisemo ponude 
        * @return void 
        */
		 
        public function deleteAllOffersOf($idUser) {
                $this->where(['owner' => $idUser])->delete();
        }

        /**
        * @author Uroš Stanković
        * Dohvata sve ponude jednog korisnika
        * @param int $idUser je celebrojna promenljiva koja predstavlja id korisnika za kojeg zelimo da dohvatimo ponude 
        * @return Offer[] niz ponuda 
        */
        public function getOffersOf($idUser) {
                return $this->where(['owner' => $idUser])->findAll();
        }
		
	/**
        * @author Halil Kajevic 0553/2018
	* @version 1.0
        * Dohvata najveci id u tabeli Offer 
        * @return int najveci id u tabeli Offer
        */
        public function getMaxId(){
                $podaci = $this->query('SELECT idOffer FROM offer ORDER BY idOffer DESC LIMIT 1');
                $row = $podaci->getRow();
                if(empty($row))return 0;
                return $row->idOffer;
    
        }

        /**
        * @author Halil Kajevic 0553/2018
        * Dohvata ponudu sa zadatim id-om
        * @param int $idOffer je celebrojna promenljiva koja predstavlja id ponude za koju zelimo da dohvatimo podatke 
        * @return Offer ponuda sa datim id-om
        */
        public function loadData($idOffer){
                $data = $this->query("SELECT * FROM offer WHERE idOffer = $idOffer");
                $row = $data->getRow();
                return $row;
        }
		
	/**
        * @author Halil Kajevic 0553/2018
        * Brise ponudu sa zadatim id-om
        * @param int $idOffer je celebrojna promenljiva koja predstavlja id ponude koju zelimo da obrisemo 
        * @return void 
        */
        public function obrisiPonudu($idOffer){
                $this->where(['idOffer' => $idOffer])->delete();
        }
		
		/**
        * @author Halil Kajevic
        * Brise staru ponudu sa zadim id-om
        * @param int $idOffer je celebrojna promenljiva koja predstavlja id ponude koju zelimo da obrisemo ako postoji
        * @return void 
        */
        public function deleteOldOfferIfExisted($idOffer){
                $this->obrisiPonudu($idOffer);
        }
        public function ifHasActiveOffer($idUser){
                $result = $this->query("SELECT owner FROM offer WHERE owner = $idUser");
                if(!empty($result->getRow())){
                        return true;
                }
                /*if($result->num_rows != 0){
                        return true;
                }*/
                return false;
        }
		
	/**
        * @author Halil Kajevic 0553/2018
        * Azurira izmene koje je privatni korisnik napravio u izmeni ponude
        * @param int $idOffer je celebrojna promenljiva koja predstavlja id ponude za kojeg zelimo da dohvatimo podatke 
        * @return void 
        */
        public function updateRenterOffer($title, $idOffer, $phone, $price, $location, $startDate, $endDate, $category, $breakfast, $lunch, $dinner, $owner, $status, $published, $description, $slike ){
                $this->update($idOffer,
                        [
                        'title'       =>   $title,
                        'phone'       =>   $phone,
                        'price'       =>   $price,
                        'location'    =>   $location,
                        'startDate'   =>   $startDate,
                        'endDate'     =>   $endDate,
                        'category'    =>   $category,
                        'breakfast'   =>   $breakfast,
                        'lunch'       =>   $lunch,
                        'dinner'      =>   $dinner,
                        'owner'       =>   $owner,
                        'status'      =>   $status,
                        'published'   =>   $published,
                        'description' =>   $description,
                        'pictures'    =>   $slike
                        ]
                );
        }
        public function updateOfferAgency($title, $idOffer, $phone, $price, $location, $startDate, $endDate, $transport, $accomodation,$category, $allInclusive, $insurance, $guide, $breakfast, $lunch, $dinner, $trips, $internet, $AC, $owner, $status, $published, $description, $slike ){
                $this->update($idOffer,
                        [
                        'title'       =>   $title,
                        'phone'       =>   $phone,
                        'price'       =>   $price,
                        'location'    =>   $location,
                        'startDate'   =>   $startDate,
                        'endDate'     =>   $endDate,
                        'transport'   =>   $transport,
                        'accomodation'=>   $accomodation,
                        'category'    =>   $category,
                        'allinclusive'=>   $allInclusive,
                        'insurance'   =>   $insurance,
                        'guide'       =>   $guide,
                        'breakfast'   =>   $breakfast,
                        'lunch'       =>   $lunch,
                        'dinner'      =>   $dinner,
                        'trips'       =>   $trips,
                        'internet'    =>   $internet,
                        'AC'          =>   $AC,
                        'owner'       =>   $owner,
                        'status'      =>   $status,
                        'published'   =>   $published,
                        'description' =>   $description,
                        'pictures'    =>   $slike
                        ]
                );
        }
        public function addNewOfferRenter(
        $title, $idOffer, $phone, $price, $location,
        $startDate, $endDate, $category, $breakfast, $lunch, $dinner, $owner, $status, $published, $description, $slike ) {

                $podaci = [
                        'title'       =>   $title,
                        'idOffer'     =>   $idOffer,
                        'phone'       =>   $phone,
                        'price'       =>   $price,
                        'location'    =>   $location,
                        'startDate'   =>   $startDate,
                        'endDate'     =>   $endDate,
                        'category'    =>   $category,
                        'breakfast'   =>   $breakfast,
                        'lunch'       =>   $lunch,
                        'dinner'      =>   $dinner,
                        'owner'       =>   $owner,
                        'status'      =>   $status,
                        'published'   =>   $published,
                        'description' =>   $description,
                        'pictures'    =>   $slike
                ];
                $this->insert($podaci);
        }
        public function addNewOfferAgency(
                $title, $idOffer, $phone, $price, $location,
                $startDate, $endDate, $transport, $accomodation,
                $category, $allInclusive, $insurance, $guide, 
                $breakfast, $lunch, $dinner, $trips, $internet,
                $AC, $owner, $status, $published, $description, $slike ) {
        
                        $podaci = [
                        'title'       =>   $title,
                        'idOffer'     =>   $idOffer,
                        'phone'       =>   $phone,
                        'price'       =>   $price,
                        'location'    =>   $location,
                        'startDate'   =>   $startDate,
                        'endDate'     =>   $endDate,
                        'transport'   =>   $transport,
                        'accomodation'=>   $accomodation,
                        'category'    =>   $category,
                        'allinclusive'=>   $allInclusive,
                        'insurance'   =>   $insurance,
                        'guide'       =>   $guide,
                        'breakfast'   =>   $breakfast,
                        'lunch'       =>   $lunch,
                        'dinner'      =>   $dinner,
                        'trips'       =>   $trips,
                        'internet'    =>   $internet,
                        'AC'          =>   $AC,
                        'owner'       =>   $owner,
                        'status'      =>   $status,
                        'published'   =>   $published,
                        'description' =>   $description,
                        'pictures'    =>   $slike
                        ];
                        $this->insert($podaci);
                }
                
}