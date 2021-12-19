<?php namespace App\Models;

use CodeIgniter\Model;

/**
 * Ova klasa predstavlja Model koji će raditi sa bazom
 * @version 1.0
 */
 
class WishlistModel extends Model
{
        protected $table      = 'wishlist';
        protected $primaryKey = 'iduser';
        protected $returnType = 'object';
        protected $allowedFields = ['iduser','idoffer'];
        
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

        /**
        * @author Uroš Stanković
        * Briše celu listu želja datog korisnika
        * @param int $iduser id korisnika 
        * @return void
        */
        public function deleteAllWishesOf($iduser) {
                $this->where(['iduser' => $iduser])->delete();
        }

        /**
        * @author Uroš Stanković
        * Briše datu ponudu iz liste želja
        * @param int $idoffer id ponude koju treba obrisati 
        * @return void
        */
        public function deleteAllWishesWhereOffer($idOffer) {
                $this->where(['idoffer' => $idOffer])->delete();
        }
}