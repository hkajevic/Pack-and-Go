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
    <link href="http://localhost/projekat/css/fontovi.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pack & Go</title>
    <script src="https://kit.fontawesome.com/063f419900.js" crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link rel="stylesheet" href="http://localhost/projekat/css/commom.css">
</head>

<body class="grey lighten-3">
    <?php
        function testTrue($value){
            return $value;
        }
        function testFalse($value){
            return $value == false;
        }
        use App\Models\UserModel;

        $userModel = new UserModel();
        $agency = $userModel->find($offer->owner);
        $offerAttributes = ['All inclusive' => $offer->allinclusive,'Osiguranje' => $offer->insurance,'Vodic' => $offer->guide,'Dorucak' => $offer->breakfast,'Rucak' => $offer->lunch,'Vecera' => $offer->dinner,'Izleti' => $offer->trips,'Internet' => $offer->internet,'Klima' => $offer->AC];
        $trueValues = array_filter($offerAttributes,"testTrue");
        $falseValues = array_filter($offerAttributes,"testFalse");
    ?>
    <?php echo view('navbar.php'); ?>
    <div class="row">
        <div class="card hideScrollBar hoverable col s10 l8 push-l2 push-s1"
            style="margin-top: 4%;height: 70%;border-radius: 20px;">
            <div class = "row card-content valign-wrapper">
                <h3 class="col l6 offset-l3 s12 center"><?php echo $offer->title; ?></h3>
                <h5 class="grey-text text-lighten-1 col l1 offset-l2 s2 right hide-on-small-and-down" >#<?php echo $offer->idOffer?></h5>
        
            </div>

            <div class=" row card-content">

                <div class="carousel carousel-slider col s12  l12">
                    <?php 
                        foreach (explode(";",$offer->pictures) as $pic) {
                            echo "<a class='carousel-item'><img src='$pic' style='height: 50vh !important;object-fit:contain'></a>";
                        }
                    ?>
                </div>
            </div>
            <br>
            <div class="row card-content col s12 l10 offset-l1">
                <div class="col s12 l12" style="text-align: justify;">
                    <p class="center-on-small-only">
                        <?php echo $offer->description; ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col s10 offset-s1 l3 offset-l1">
                    <p><b>Lokacija: </b><?php echo $offer->location; ?></p>
                    <p><b>Izdavac: </b><?php echo $agency->name; ?></p>
                    <p><b>Datum: </b><?php echo $offer->startDate." - ".$offer->endDate; ?></p>
                    <p><b>Prevoz:</b> <?php echo $offer->transport; ?></p>
                    <p><b>Smestaj:</b> <?php echo $offer->accomodation; ?></p>
                    <p><b>Kategorija:</b> <?php echo $offer->category; ?></p>
                    <p><b>Telefon:</b><?php echo $offer->phone; ?></p>
                    <p><b>Cena:</b><?php echo $offer->price; ?>e</p>
                    <p class="hide-on-med-and-up" ><b class="hide-on-med-and-up">Id:</b>#<?php echo $offer->idOffer?></p>
                </div>
                <div class="col s10 offset-s1 l2 offset-l1">
                    <h4 style="color:#00838f">Uključeno:</h4>
                    <?php 
                        foreach ($trueValues as $key=>$value) {
                            echo '<div>';
                            echo '<i class="material-icons yellow-text text-darken-3 left">check</i>';
                            echo "<p class='yellow-text text-darken-3'>$key</p>";
                            echo '</div>';
                        }
                    ?>
                </div>
                <div class="col s10 offset-s1 l3 offset-l1 ">
                    <h4 style="color:#00838f">Ne sadrzi:</h4>
                    <?php 
                        foreach ($falseValues as $key=>$value) {
                            echo '<div>';
                            echo '<i class="material-icons yellow-text text-darken-3 left">close</i>';
                            echo "<p class='yellow-text text-darken-3'>$key</p>";
                            echo '</div>';
                        }
                    ?>
                </div>


            </div>

        </div>
    </div>



    <script>
       document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.carousel');
            var instances = M.Carousel.init(elems, {"indicators":true,"fullWidth":true});
        });

    </script>




</body>

</html>