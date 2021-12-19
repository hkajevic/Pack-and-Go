<!doctype html>
<html lang="en">

<!--Halil Kajevic-->

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- account_box contact_phone     work-->
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kontakt</title>
  <script src="https://kit.fontawesome.com/063f419900.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/commom.css">

  <link href="fontovi.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
  <script src="../../js/contact-script.js"></script>
  <script>
    $(document).ready(function(){

   // alert("radi");
    $("#posalji-poruku").click(function(){

   // alert("radi");
    var korisnickoIme = $("#icon_prefix").val();
    var email = $("#email_prefix").val();
    var telefon = $("#icon_telephone").val();
    var firma = $("#firm_prefix").val();

    if(korisnickoIme == null){
        $("#greske-kontakt").append("Niste uneli korisnicko ime");
        return;
    }
});
});

  </script>

</head>

<body class="grey lighten-3">
<?php echo view('navbar.php') ?>

  <div style="display: flex;align-items: center;justify-content: center;">
  <div class="row card" style="width: 80%;border-radius: 20px;">
    
    <form method="post">
    <div class="col offset-l1 m6 l6 s12" style="padding-top:60px;">
        <?php if(isset($validation)): ?>
               <div style="text-align: center; color:red">
                    <h6><?= $validation ?></h6>
               </div> 
        <?php endif; ?>
        <div id="greske-kontakt">
        </div>
      <div class="card-title center">
        <h2>Posalji nam poruku</h2>
      </div>

      <div class="row">
        <div class="input-field col m6 l6 s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate" name="korisnickoIme-kontakt">
          <label for="icon_prefix">Korisnicko ime</label>
        </div>
        <div class="input-field col m6 l6 s12">
          <i class="material-icons prefix">email</i>
          <input id="email_prefix" type="text" class="validate" name="email-kontakt">
          <label for="email_prefix">Email</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col l6 m6 s12">
          <i class="material-icons prefix">phone</i>
          <input id="icon_telephone" type="tel" class="validate" name="telefon-kontakt">
          <label for="icon_telephone">Telefon</label>
        </div>
        <div class="input-field col l6 m6 s12">
          <i class="material-icons prefix">laptop_mac</i>
          <input id="firm_prefix" type="tel" class="validate" name="firma-kontakt">
          <label for="firm_prefix">Firma</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col l8 m8 s12 offset-l2 offset-m2">
          <textarea id="textarea2" class="materialize-textarea" data-length="120" name="tekstPoruke-kontakt"></textarea>
          <label for="textarea2">Unesite vasu poruku</label>
        </div>
      </div>
      <div class="row">
        <button class="col l4 m4 s6 offset-l4 offset-m4 offset-s3 btn waves-effect waves-light" type="submit"
          name="action" id="posalji-poruku">Posalji
          <i class="material-icons right">send</i>
        </button>
      </div>


    </div>
    </form>
    <div class="col offset-l1 m4 l4 s12 cyan darken-3"
      style="border-top-right-radius: 20px;border-bottom-right-radius: 20px;padding-left: 30px;padding-right: 30px;">

      <h3 class="center-on-small-only white-text">Kontakt informacije</h3>
      <p class="center-on-small-only" style="color: #80c1c7;">Pack&Go vas uvodi u novu verziju uzivanja u izboru
        putovanja iz velikog broja kategorija koje smo
        ponudili za vas. Ukoliko imate bilo kakve sugestije bicemo raspolozeni da vazimo vase misljenje za ubuduce!
      </p>

      <div class="row">

        <i class="material-icons prefix white-text" style="vertical-align: bottom;">location_on</i>
        <span style="font-size:1.2em;color: #80c1c7;">&nbsp&nbsp&nbspJuzni Bulevar br.5, Vracar, Beograd</span>

      </div>
      <div class="row">

        <i class="material-icons prefix white-text" style="vertical-align: bottom;">phone</i>
        <span style="font-size:1.2em;color: #80c1c7;">&nbsp&nbsp&nbsp+381 67 40 94 932</span>

      </div>
      <div class="row">

        <i class="material-icons prefix white-text" style="vertical-align: bottom;">mail</i>
        <span style="font-size:1.2em;color: #80c1c7;">&nbsp&nbsp&nbsppackandgo@gmail.com</span>

      </div>
      
     
      <div class="row">
        <iframe class="col l10 offset-l1 s12"
           src="https://maps.google.com/maps?q=Juzni%20Bulevar%205&t=&z=13&ie=UTF8&iwloc=&output=embed"
           frameborder="0" scrolling="no">
        </iframe>
      </div>


    </div>
  </div>
</div>
</body>

</html>