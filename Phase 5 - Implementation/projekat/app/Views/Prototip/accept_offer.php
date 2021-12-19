<!DOCTYPE html>
<html lang="en">

<!--Halil Kajevic-->

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
  <style>
    td,
    th {
      text-align: center;
      align-content: center;
      font-size: 14pt;
    }

    .bledoZelena {
      color: #80deea
    }

    .tamnoZelena {
      color: #00acc1
    }

    .cssButtonPrihvati {
      margin: 5px;
      width: 100%;
      background-color: #00838F;
      border-radius: 5px;
    }

    .cssButtonOdbij {
      margin: 5px;
      width: 100%;
      background-color: red;
      border-radius: 5px;
    }
  </style>
</head>

<body>
  <?php

    use App\Models\OfferModel;

    $offerModel = new OfferModel();

    $ponude = isset($ponudeNaCekanju)?$ponudeNaCekanju:null;
  ?>
  <?php echo view('navbar.php');?>
  <?php
        echo '<h1 class="center text-cyan darken-3">Odobravanje ponuda</h1>';
        echo '<div class="container">';
        echo '<br>';
        echo '<p style= "text-align: center;">Naredne ponude je potrebno pregledati, odrediti ispravnost a zatim na osnovu toga prihvatiti ili odbiti ponude';
        echo '</p>';
        echo '<br>';
        echo '<hr>';
        echo '<br>';
        echo '<table class="highlight responsive-table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th class="tamnoZelena">Naziv ponude</th>';
        echo '<th class="bledoZelena">Izdavač ponude</th>';
        echo '<th class="tamnoZelena">Opis ponude</th>';
        echo '<th class="tamnoZelena">Odobrenje</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        for ($i=0; $i <count($ponude) ; $i++) { 
            
          $ponuda = $ponude[$i];
          $naslov = $ponuda->title;
          $id = $ponuda->idOffer;
          $idVlasnik = $ponuda->owner;
          $vlasnik = $ponuda->vlasnik;
          $opis = $ponuda->description;
          $controller = site_url("Admin/approveOffer/$id");
          $controller2 = site_url("Admin/removeOffer/$id");
          echo '<tr>';
          echo "<td>$naslov</td>";
          echo "<td><b>$vlasnik</b><br>ID $idVlasnik</td>";
          echo "<td>$opis</td>";
          echo "<td> <a class='waves-effect waves-light btn cssButtonPrihvati' href= $controller>Prihvati</a>";
          echo "<a class='waves-effect waves-light btn cssButtonOdbij' href= $controller2>Odbij</a>";
          echo '</td>';
          echo '</tr>';
          
        }
        echo '</tbody>';
        echo '</table>';
        echo '</div>';

    ?>
  <script>
       document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.carousel');
            var instances = M.Carousel.init(elems, {"indicators":true});
        });
        
     
    </script>
</body>

</html>