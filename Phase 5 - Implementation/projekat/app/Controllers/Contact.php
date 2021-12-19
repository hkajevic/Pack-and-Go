<?php

namespace App\Controllers;

use \CodeIgniter\Controller;
class Contact extends BaseController
{
	public function index()
	{
		helper("form");

		//pravila
		$nijePraznoKorisnickoIme = [
			"korisnickoIme-kontakt" => "required"
		];
		$nijePrazanEmail = [
			"email-kontakt" => "required"
		];
		$nijePraznaPoruka = [
			"tekstPoruke-kontakt" => "required"
		];
		$data = [];

		if($_POST){
			if(!$this->validate($nijePraznoKorisnickoIme)){
				$data["validation"] = "Unos Vaseg imena je obavezan";
			}
			else if(!$this->validate($nijePrazanEmail)){
				$data["validation"] = "Da bi mogli da dobijete povratne informacije o Vasim sugestijama molimo Vas da unesete Vas email";
			}
			else if(!$this->validate($nijePraznaPoruka)){
				$data["validation"] = "Unesite Vasu poruku";
			}
			else{
				//
				$to = "teampackandgo@gmail.com";
		
				$email = \Config\Services::email();
		
				//print_r($_POST);
				
				$emailData = $_POST["email-kontakt"];
				$userData = $_POST["korisnickoIme-kontakt"];
				$content = $_POST["tekstPoruke-kontakt"];
				$firm = $_POST["firma-kontakt"];
				$phone = $_POST["telefon-kontakt"];


				$email->setTo($to);
				$email->setFrom("teampackandgo@gmail.com","Sugestije");
				$email->setSubject($emailData);
				
		
				$message ="<pre>Korisnicko ime posiljaoca: ".$userData ."<br>Email posiljaoca: ".$emailData;

				if(!empty($firm)){
					$message = $message." <br>Firma: ".$firm;
				}
				if(!empty($phone)){
					$message = $message." <br>Telefon: ".$phone;
				}

				$message = $message."<br>Sadrzaj poruke: <br>".$content;

				$message = $message."</pre>";
				$email->setMessage($message);

				if($email->send()){
					$data['validation'] = "Uspesno ste poslali email. Ocekujte odgovor u najkracem roku.";
					return view('Contact',$data);
				}
				else{
					$data['validation'] = "Desila se neka neocekivana greska prilikom slanja. Pokusajte ponovo kasnije.";
				}
				
			}
		}
		
		return view('Contact',$data);
	}
}
