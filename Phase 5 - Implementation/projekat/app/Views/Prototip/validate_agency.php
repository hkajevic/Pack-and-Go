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

<body class="grey lighten-3" >
    <?php echo view('navbar.php');?>
    <?php

        use App\Models\UserModel;

        $adminModel = new UserModel();

        $agencije = isset($agencijeNaCekanju)?$agencijeNaCekanju:null;    
        $userModel = new UserModel();
        echo '<div class="container">';
        echo '<h1 style="text-decoration: none;" class="center">'; 
        echo '<a href="https://www.purs.gov.rs/pib.html" class="black-text">Provera agencija</a>';
        echo '</h1>';
        echo '<div class="card class" style="padding: 10%;border-radius: 20px;" >';
        echo '<table class="responsive-table">';
        echo '<tr style="font-size: 22px;">';
        echo '<th>Naziv agencije</th>';
        echo '<th>';
        echo '<p style="display: inline-block;">PIB</p>';
        echo '<a href="https://www.purs.gov.rs/pib.html" class="grey-text text-lighten-1"><i class="material-icons tiny">info</i></a>';
        echo '</th>';
        echo '<th>Prihvati</th>';
        echo '<th>Odbij</th>';
        echo '</tr>';
        for ($i=0; $i <count($agencije) ; $i++) { 
            
            $agencija = $agencije[$i];
            $nazivAgencije = $agencija->name;
            $id = $agencija->idUser;
            $pib = $agencija->pib;
            $controller = site_url("Admin/approveAgency/$id");
            $controller2 = site_url("Admin/removeAgency/$id");
            echo '<tr>';
            echo "<td>$nazivAgencije</td>";
            echo "<td>$pib</td>";
            echo "<td><a class='waves-effect waves-light btn prihvatiAgenciju' href= $controller >Prihvati</a>";
            echo '</td>';
            echo "<td><a class='waves-effect waves-light btn odbijAgenciju' style='background-color: red;' href= $controller2 >Odbij</a>";
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '</div>';
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