<?php namespace App\Controllers;

use App\Models\UserModel;

/**
 * Ovo klasa treba da omoguci sve funkcionalnosti gosta
 * @version 1.0
 * @author Nikola Divnic, Uros Stankovic, Ivona Stojanovic
 */
 
class Guest extends BaseController
{

    /**
    * Prikaz greske prilikom logovanja
    * @return String prikaz forme za logovanje
    * @version 1.0
    * @author Uros Stankovic
    * @param int $message poruka greske
    */  
    public function loginError($message){
        return view('\Prototip\log_in.php', ['poruka'=>$message]);
    }

    /**
    * Obrada informacija prilikom logovanja
    * @return RedirectResponse prikaz forme za logovanje ako je doslo do greske, ili prelazak na osnovnu stranu
    * @author Nikola Divnic
    * @version 1.0
    */
    public function showLogin() {
        return view('\Prototip\log_in.php');
    }
    
	/**
    * Obrada informacija prilikom logovanja
    * @return RedirectResponse prikaz forme za logovanje ako je doslo do greske, ili prelazak na osnovnu stranu
    * @author Ivona Stojanovic, Nikola Divnic, Uros Stankovic
    * @version 1.0
    */
    public function loginSubmit(){

        $username = $this->request->getVar("userNameInput");
        $password = $this->request->getVar("passwordInput");
        $message = "";
        if($username == "") {
            $message.='Korisnik nije unet<br>';
        }
        if($password == "") {
            $message.='Lozinka nije uneta<br>';
        }
        if($message != "") {
            return $this->loginError($message);
        }
        $userModel = new UserModel();
        $user=$userModel->where('username',$this->request->getVar("userNameInput"))->findAll();
        if($user==null) {
            return $this->loginError('Korisnik ne postoji');
        }
        if($user[0]->password!=$this->request->getVar("passwordInput")) {
            return $this->loginError('Pogresna lozinka');
        }
        if ($user[0]->role == "AGENCIJA" && $user[0]->agency_verified == 0) {
            return $this->loginError('Agencija jos uvek nije verifikovana');
        }
        $this->session->set('user', $user[0]->username);
        $this->session->set('userRole', $user[0]->role);
        $this->session->set('autor', $user[0]);
        return redirect()->to(site_url('Home/index'));

    }

    /**
    * Prikaz greske prilikom registracije
    * @return String Prikaz greske prilikom registracije
    * @version 1.0
    * @param int $message poruka greske
    * @author Nikola Divnic
    */
    public function registrationError($message){
        return view('\Prototip\registration.php', ['poruka'=>$message]);
    }

    /**
    * Prikaz forme za registraciju
    * @return String Prikaz forme za registraciju
    * @version 1.0
    * @author Nikola Divnic
    */
    public function showRegistation() {
        return view('\Prototip\registration.php');
    }
    
    /**
    * Obrada zahteva za registraciju
    * @return RedirectResponse prikaz forme za registraciju ako je doslo do greske, ili prelazak na osnovnu stranu
    * @version 1.0
    * @author Nikola Divnic
    */
    public function registrationSubmit(){

        $message = "";
        $rola = "";
        if (isset($_POST["rola"])) {
            $rola = $_POST["rola"];
        }
        else {
            return $this->registrationError("Niste izabrali ulogu");
        }
        if ($rola == "VIPkorisnik") {
            $korisnickoIme = $this->request->getVar("korisnickoIme1");
            $lozinka = $this->request->getVar("lozinka1");
            $potvrdaLozinke = $this->request->getVar("potvrdaLozinke1");
            $email = $this->request->getVar("email1");
            $ime = $this->request->getVar("ime1");
            $prezime = $this->request->getVar("prezime1");
            if($ime == "") 
                $message.='Ime nije uneto<br>';
            if($prezime == "") 
                $message.='Prezime nije uneto<br>';   
            if($korisnickoIme == "") 
                $message.='Korisnicko ime nije uneto<br>';
            if($lozinka == "") 
                $message.='Lozinka nije uneta<br>';   
            if($potvrdaLozinke == "") 
                $message.='Potvrda lozinke nije uneta<br>';
            if($email == "") 
                $message.='Email nije unet<br>'; 
            if($message != "") return $this->registrationError($message);  
    
    
            $userModel = new UserModel();
            $user=$userModel->where('username',$korisnickoIme)->findAll();
            if($user!=null)
                return $this->registrationError('Korisnik sa tim korisnickim imenom vec postoji');
            $user=$userModel->where('email',$email)->findAll();
            if($user!=null)
                return $this->registrationError('Korisnik sa tom email adresom vec postoji');
            if($lozinka != $potvrdaLozinke)
                return $this->registrationError('Lozinka i potrvrda lozinke se ne poklapaju');
    
            $userModel->insert(['name'=>$ime , 'surname'=> $prezime , 'username'=>$korisnickoIme,'password' => $lozinka , 'email'=>$email ,'jmbg'=>null , 'pib'=> null , 'location' =>null , 'phone'=>null ,'role'=>"VIP" , 'agency_verified'=>null]);
            
        }
        else {
            if ($rola == "turistickaAgencija") {
                $korisnickoIme = $this->request->getVar("korisnickoIme3");
                $lozinka = $this->request->getVar("lozinka3");
                $potvrdaLozinke = $this->request->getVar("potvrdaLozinke3");
                $email = $this->request->getVar("email3");
                $nazivAgencije = $this->request->getVar("ime3");
                $imePrezimeVlasnika = $this->request->getVar("prezime3");
                $lokacija = $this->request->getVar("lokacija3");
                $telefon = $this->request->getVar("telefon3");
                $jmbg = $this->request->getVar("pib3");
                if($korisnickoIme == "") 
                    $message.='Korisnicko ime nije uneto<br>';
                if($lozinka == "") 
                    $message.='Lozinka nije uneta<br>';   
                if($potvrdaLozinke == "") 
                    $message.='Potvrda lozinke nije uneta<br>';
                if($email == "") 
                    $message.='Email nije unet<br>'; 
                if($nazivAgencije == "") 
                    $message.='Naziv agencije nije unet<br>'; 
                if($imePrezimeVlasnika == "") 
                    $message.='Ime i prezime vlasnika nisu uneti<br>';
                if($lokacija == "") 
                    $message.='Lokacija nije uneta<br>'; 
                if($telefon == "") 
                    $message.='Telefon nije unet<br>'; 
                if($jmbg == "") 
                    $message.='Pib nije unet<br>'; 
                if($message != "") return $this->registrationError($message);


                $userModel = new UserModel();
                $user=$userModel->where('username',$korisnickoIme)->findAll();
                if($user!=null)
                    return $this->registrationError('Korisnik sa tim korisnickim imenom vec postoji');
                $user=$userModel->where('email',$email)->findAll();
                if($user!=null)
                    return $this->registrationError('Korisnik sa tom email adresom vec postoji');
                
                if($lozinka != $potvrdaLozinke)
                    return $this->registrationError('Lozinka i potrvrda lozinke se ne poklapaju');



                

                $user=$userModel->where('pib',$jmbg)->findAll();
                if($user!=null)
                    return $this->registrationError('Agencija sa tim pibom vec postoji');
                $userModel->insert(['name'=>$nazivAgencije , 'surname'=> $imePrezimeVlasnika , 'username'=>$korisnickoIme,'password' => $lozinka , 'email'=>$email ,'jmbg'=>null , 'pib'=> $jmbg , 'location' =>$lokacija , 'phone'=>$telefon ,'role'=>"Agencija" , 'agency_verified'=>0]);
            }
            else {
                $korisnickoIme = $this->request->getVar("korisnickoIme2");
                $lozinka = $this->request->getVar("lozinka2");
                $potvrdaLozinke = $this->request->getVar("potvrdaLozinke2");
                $email = $this->request->getVar("email2");
                $ime = $this->request->getVar("ime2");
                $prezime = $this->request->getVar("prezime2");
                $lokacija = $this->request->getVar("lokacija2");
                $telefon = $this->request->getVar("telefon2");
                $jmbg = $this->request->getVar("jmbg2");
                if($korisnickoIme == "") 
                    $message.='Korisnicko ime nije uneto<br>';
                if($lozinka == "") 
                    $message.='Lozinka nije uneta<br>';   
                if($potvrdaLozinke == "") 
                    $message.='Potvrda lozinke nije uneta<br>';
                if($email == "") 
                    $message.='Email nije unet<br>'; 
                if($ime == "") 
                    $message.='Ime nije uneto<br>'; 
                if($prezime == "") 
                    $message.='Prezime nije uneto<br>';
                if($lokacija == "") 
                    $message.='Lokacija nije uneta<br>'; 
                if($telefon == "") 
                    $message.='Telefon nije unet<br>'; 
                if($jmbg == "") 
                    $message.='JMBG nije unet<br>'; 
                if($message != "") return $this->registrationError($message);


                $userModel = new UserModel();
                $user=$userModel->where('username',$korisnickoIme)->findAll();
                if($user!=null)
                    return $this->registrationError('Korisnik sa tim korisnickim imenom vec postoji');                
                $user=$userModel->where('email',$email)->findAll();
                if($user!=null)
                    return $this->registrationError('Korisnik sa tom email adresom vec postoji');                
                if($lozinka != $potvrdaLozinke)
                    return $this->registrationError('Lozinka i potrvrda lozinke se ne poklapaju');
                    
                    
                    $user=$userModel->where('jmbg',$jmbg)->findAll();
                    if($user!=null)
                    return $this->registrationError('Vec je unet jmbg');
                    
                    $userModel->insert(['name'=>$ime , 'surname'=> $prezime , 'username'=>$korisnickoIme,'password' => $lozinka , 'email'=>$email ,'jmbg'=>$jmbg , 'pib'=> null , 'location' =>$lokacija , 'phone'=>$telefon ,'role'=>"Izdavac" , 'agency_verified'=>null]);
            }
        }
        
        return redirect()->to(site_url('Home/index'));

    }
}
