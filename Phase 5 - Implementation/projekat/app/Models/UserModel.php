<?php namespace App\Models;

use CodeIgniter\Model;

/**
* Ova klasa predstavlja Model koji će raditi sa bazom
* @version 1.0
*/
 
class UserModel extends Model
{
        protected $table      = 'user';
        protected $primaryKey = 'idUser';
        protected $returnType = 'object';
        protected $allowedFields = ['idUser','name','surname','username','password','email','jmbg','pib','location','phone','role' ,'agency_verified'];

        /**
        * @author Ivona Stojanović
        * Dohvata id korisnika na osnovu korisnickog imena 
        * @param string $username je korisnicko ime korisnika 
        * @return int id korisnika sa zadatim korisnickim imenom 
         */
        public function getId($username) {
                $users = $this->where('username',$username)->findAll();
                if ($users== null || count($users)==0) {
                        return null;
                }
                return $users[0]->idUser;
        }

        /**
        * @author Ivona Stojanović
        * Dohvata agenciju na osnovu piba
        * @param string $pib je pib agencije 
        * @return User korisnik sa zadatim pib-om 
         */
        public function findByPIB($pib) {
                $users = $this->where('pib',$pib)->findAll();
                if ($users== null || count($users)==0) {
                        return null;
                }
                return $users[0];
        }

        /**
        * @author Ivona Stojanović
        * Dohvata korisnika na osnovu JMBG-a
        * @param string $jmbg je jmbg korisnika 
        * @return User korisnik sa zadatim jmbg-om 
         */
        public function findByJMBG($jmbg) {
                $users = $this->where('jmbg',$jmbg)->findAll();
                if ($users== null || count($users)==0) {
                        return null;
                }
                return $users[0];
        }


        /**
        * @author Ivona Stojanović
        * Dohvata korisnika na osnovu korisnickog imena
        * @param string $username je korisnicko ime  korisnika 
        * @return User korisnik sa zadatim korisnickim imenom 
         */
        public function findByUsername($username) {
                $users = $this->where('username',$username)->findAll();
                if ($users== null || count($users)==0) {
                        return null;
                }
                return $users[0];  
		}
		/**
        * @author Ivona Stojanović
        * Dohvata listu zelja datog korisnika
        * @param int $iduser id korisnika 
        * @return Offer[] niz ponuda koje se nalaze u listi zelja zadatog korisnika 
         */
        public function getWishListOffers($iduser) {
                $offers = [];
                foreach ($this->where('iduser',$iduser)->findAll() as $wish) {
                        array_push($offers,$wish->idoffer);
                }
                return $offers;
        }
}