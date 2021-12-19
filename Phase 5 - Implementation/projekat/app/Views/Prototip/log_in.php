<!DOCTYPE html>
<html lang="en">

<!--Uros Stankovic-->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="http://localhost/projekat/css/materialize-v1.0.0/materialize/css/materialize.min.css" media="screen,projection" />
  <link href="http://localhost/projekat/css/fontovi.css">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pack & Go</title>
  <script src="https://kit.fontawesome.com/063f419900.js" crossorigin="anonymous"></script>
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="http://localhost/projekat/js/log_in.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="http://localhost/projekat/css/commom.css">

  <style>
    input::placeholder {
      color: white;
    }
  </style>
</head>

<body style="background-color:#d5faff; background-image: url('http://localhost/projekat/pictures/background.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: 100%;">

  <?php echo view('navbar.php');?>
  <form name="loginform" action="<?= site_url('Guest/loginSubmit') ?>" method="post">
    <div class="row">
      <div class="card hideScrollBar hoverable col s10 l4 push-l3 push-s1" style="margin-top: 4%;height: 600px;border-radius: 20px;">
        <h3 class="card-content" style="text-align: center;">Prijavi se</h3>
        <?php
        if (isset($poruka)) {
          echo "<div class='row'><div class='col s12'><h5 class=' center-align red-text'>$poruka</h5></div></div>";
        }
        ?>
        <div class="row card-content">
          <div class="input-field col s10 offset-s1">
            <input id="username" type="text" data-length="10" name="userNameInput">
            <label for="username">Korisnicko ime</label>
          </div>
        </div>
        <div class="row card-content">
          <div class="input-field col s10 offset-s1">
            <input id="password" type="password" data-length="10" name="passwordInput">
            <label for="password">Lozinka</label>
          </div>
        </div>

        <div class="row">
          <a class="waves-effect waves-green btn col l4 offset-l1 s10 offset-s1" href="<? site_url('Home/register') ?>">Registruj se</a>
          <div class="col s12 l1"></div>
          <a class="btn waves-effect waves-ripple col l4 offset-l1 s10 offset-s1" id="loginButton">Prijavi se</a>
        </div>

      </div>
    </div>
  </form>
</body>
<script>
  $("#loginButton").click(() => {
    document.forms['loginform'].submit();
  });
</script>
</html>