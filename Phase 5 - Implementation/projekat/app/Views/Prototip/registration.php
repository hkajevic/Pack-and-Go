<!DOCTYPE html>
<html lang="en">

<!--Ivona Stojanovic-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="http://localhost/projekat/css/materialize-v1.0.0/materialize/css/materialize.min.css"
    media="screen,projection" />
    <!-- Compiled and minified JavaScript -->

    <link href="http://localhost/projekat/css/fontovi.css">
    <link href="http://localhost/projekat/css/registration.css" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/projekat/css/commom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pack & Go</title>
    <script src="https://kit.fontawesome.com/063f419900.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
</head>

<body
    style="background-color:#d5faff; background-image: url('http://localhost/projekat/pictures/background.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: 100%;">
    <?php echo view('navbar.php');?>
    <form name="registrationform" action="<?= site_url('Guest/registrationSubmit') ?>" method="post">
    <div class="row">
        
        <div class="card hideScrollBar hoverable col s10 l5 push-l2 push-s1"
            style="margin-top: 2%;height: 620px;border-radius: 20px;overflow-y: scroll">
            <h3 class="card-content" style="text-align: center;">Registruj se</h3>
                <?php 
                    if (isset($poruka)) {
                        echo "<div class='row'><div class='col s12'><h5 class=' center-align red-text'>$poruka</h5></div></div>";
                    } 
                ?>
            <div class="row choose center">
                <h3>Želite se registrovati kao:</h3>
                <label class="col l4 m4 s12">
                    <input class="with-gap" name="rola"  type="radio" id = "VIPkorisnik" value = "VIPkorisnik" checked onclick="radioButton('userForm');" />
                    <span>VIP korisnik</span>
                </label>
                <label class="col l4 m4 s12">
                    <input class="with-gap" name="rola" type="radio" id = "turistickaAgencija" value="turistickaAgencija" onclick="radioButton('agencyForm');" />
                    <span>Turistička agencija</span>
                </label>
                <label class="col l4 m4 s12">
                    <input class="with-gap" name="rola" type="radio" id = "privatniIzdavac" value="privatniIzdavac" onclick="radioButton('privateForm');" />
                    <span>Pravatni izdavač</span>
                </label>
            </div>

            <div class="card-content" id="idtemp">
                <div class="user" id="userForm">
                    <h3 class="cyan-text text-darken-3">Registracija VIP korisnika</h3>
                    <div class="input-field"><input type="text" class="validate" name="ime1" id="ime1" ><label
                            for="ime1">Ime</label></div>
                    <div class="input-field"><input type="text" class="validate" name="prezime1" id="prezime1"><label
                            for="prezime1">Prezime</label></div>
                    <div class="input-field"><input type="text" class="validate" name="korisnickoIme1" id="korisnickoIme1" ><label
                            for="korisnickoIme1">Korisničko ime</label></div>
                    <div class="input-field"><input type="password" class="validate" name="lozinka1" id="lozinka1"><label
                            for="lozinka1">Lozinka</label></div>
                    <div class="input-field"><input type="password" class="validate" name = "potvrdaLozinke1" id="potvrdaLozinke1"><label
                            for="potvrdaLozinke1">Potvrda lozinke</label></div>
                    <div class="input-field"><input type="email" class="validate" name = "email1" id="email1"><label for="email1">Email
                            adresa</label></div>
                </div>

                <div class="user" id="privateForm">
                    <h3 class="cyan-text text-darken-3">Registracija privatnog izdavača</h3>
                    <div class="input-field"><input type="text" class="validate" name="korisnickoIme2" id="korisnickoIme2"><label
                            for="korisnickoIme2">Korisničko ime</label></div>
                    <div class="input-field"><input type="password" class="validate" name="lozinka2" id="lozinka2"><label
                            for="lozinka2">Lozinka</label></div>
                    <div class="input-field"><input type="password" class="validate" name="potvrdaLozinke2" id="potvrdaLozinke2"><label
                            for="potvrdaLozinke2">Potvrda lozinke</label></div>
                    <div class="input-field"><input type="email" class="validate" name = "email2" id="email2"><label for="email2">Email
                            adresa</label></div>
                    <div class="input-field"><input type="text" class="validate" name = "ime2" id="ime2"><label
                            for="ime2">Ime</label></div>
                    <div class="input-field"><input type="text" class="validate" name = "prezime2" id="prezime2"><label
                            for="prezime2">Prezime</label></div>
                    <div class="input-field"><input type="text" class="validate" name = "lokacija2" id="lokacija2"><label
                            for="lokacija2">Lokacija</label>
                    </div>
                    <div class="input-field"><input type="text" class="validate" name ="telefon2" id="telefon2"><label for="telefon2">Broj
                            telefona</label>
                    </div>
                    <div class="input-field"><input type="text" class="validate" name = "jmbg2" id="jmbg2" minlength='13'
                            maxlength='13'><label for="jmbg2">JMBG</label></div>


                </div>

                <div class="user" id="agencyForm">
                    <h3 class="cyan-text text-darken-3">Registracija turističke agencije</h3>
                    <div class="input-field"><input type="text" class="validate" name = "korisnickoIme3" id="korisnickoIme3"><label
                            for="korisnickoIme3">Korisničko
                            ime</label></div>
                    <div class="input-field"><input type="password" class="validate" name = "lozinka3" id="lozinka3"><label
                            for="lozinka3">Lozinka</label></div>
                    <div class="input-field"><input type="password" class="validate" name ="potvrdaLozinke3" id="potvrdaLozinke3"><label
                            for="potvrdaLozinke3">Potvrda lozinke</label></div>
                    <div class="input-field"><input type="email" class="validate" name = "email3" id="email3"><label for="email3">Email
                            adresa</label>
                    </div>
                    <div class="input-field"><input type="text" class="validate" name = "ime3" id="ime3"><label for="ime3">Naziv
                            agencije</label></div>
                    <div class="input-field"><input type="text" class="validate" name = "prezime3" id="prezime3"><label for="prezime3">Ime
                            i prezime vlasnika</label>
                    </div>
                    <div class="input-field"><input type="text" class="validate" name = "lokacija3" id="lokacija3"><label
                            for="lokacija3">Lokacija</label>
                    </div>
                    <div class="input-field"><input type="text" class="validate" name ="telefon3" id="telefon3"><label for="telefon3">Broj
                            telefona</label>
                    </div>
                    <div class="input-field"><input type="text" class="validate" name = "pib3" id="pib3" minlength='9'
                            maxlength='9'><label for="pib3">PIB</label></div>
                </div>
                <a ><button class="btn waves-effect waves-light" style="margin-left: 30%;width: 40%;" type="submit"
                    name="action">Registracija
                    <i class="material-icons right">send</i>
                </button></a>
            </div>
        </div>
    </div>
    </form>
    <script>
        function radioButton(id) {
            var formsHolder = document.getElementById('idtemp');
            var selectedForm = document.getElementById(id);
            var forms = document.getElementsByClassName('user');
            for (var i = 0; i < forms.length; i++) {
                forms[i].classList.add('hide');
            }
            selectedForm.classList.remove('hide');
        };
        $(document).ready(function() {
            radioButton('userForm')
        });
    </script>
</body>

</html>