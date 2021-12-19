<?php

namespace App\Controllers;
use App\Models\UserModel;

/**
* Ovo klasa treba da prikaze osnovne opcije na sajtu
* @version 1.0
* @author Uros Stankovic, Ivona Stojanovic, Nikola Divnic
*/
class Home extends BaseController
{
	/**
    * Prikaz osnovne strane 
    * @return String Prikaz osnovne strane 
    * @version 1.0
	* @author Uros Stankovic
    */
	public function index()
	{
		return view('\Prototip\index.php');
	}
  
 	/**
    * Prikaz kontakta
    * @return String Prikaz kontakta
    * @version 1.0
	* @author Ivona Stojanovic
    */
  	public function aboutUs(){
		return view('\Prototip\contact.html');
  	}
	/**
    * Prikaz forme za registraciju 
    * @return String Prikaz forme za registraciju  
    * @version 1.0
	* @author Nikola Divnic
    */
	public function register(){
		return view('\Prototip\registration.php');
	}
	/**
    * Prikaz forme za registraciju 
    * @return String Prikaz forme za registraciju  
    * @version 1.0
	* @author Ivona Stojanovic
    */
	public function registrationSubmit(){
		return view('\Prototip\registration.php');
	}
}
