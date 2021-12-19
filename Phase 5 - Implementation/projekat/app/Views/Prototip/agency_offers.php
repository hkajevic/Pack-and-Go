<!DOCTYPE html>
<html>

<!--Uros Stankovic-->

<head>
    <title>Pack & Go</title>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/projekat/css/commom.css">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet"
    href="http://localhost/projekat/css/materialize-v1.0.0/materialize/css/materialize.min.css"
    media="screen,projection" />
    <link href="http://localhost/projekat/css/fontovi.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/063f419900.js" crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     
    <script src='http://localhost/projekat/js/wish_list.js'></script>
</head>

<body class="grey lighten-4" onresize="updateCardPanel()">
    <?php echo view('navbar.php'); ?>
    <h1 class="center-align" >Vaša ponude</h1>
    <!-- TODO -->
    <form action="<?php echo site_url('Offer/changeOffer'); ?>" method='post' name='sf' id='sf'> 
        <input type='hidden' name='agencyOffer' id='agencyOffer' value="-1">
        <input type='hidden' name='returnUrl' id='returnUrl' value="<?php echo $_SERVER['PHP_SELF']; ?>">
       
    
        
        <?php
            $offer = null;
            if (count($offers) != 0) {
            for ($i = 0;$i < 1000;$i++) {
                $index = 0;
                echo '<div style="display: flex;flex-direction: row;justify-content: space-between;" class="cardpanel">';
                
                for ($j = 0;$j < $columnsPerPage;$j++) {
                    $index = $i*$columnsPerPage + $j;
                    $visibility = "visible";
                    if ($index >= count($offers)) {
                        $visibility = "hidden";
                    }
                    else {
                        $offer = $offers[$i*$columnsPerPage + $j];
                    }
                    $offerId = $offer->idOffer;
                    $heartClass = "fas";
                    $pictures = explode(";",$offer->pictures);
                    $period = $offer->startDate.' - '.$offer->endDate;
                    $accepted = $offer->status;
                    $heartId = "heart".$index;
                    $offerHref = site_url("Offer/showOffer/$offerId");
                    echo "<div class='card hoverable' style='visibility:$visibility'>";
                    echo '<div class="card-image waves-effect waves-block waves-light">';
                    echo "<i class='$heartClass fa-edit yellow-text text-darken-3' idOffer='$offerId' style='font-size: 200%;position: absolute;top: 5px;right: 5px;' id='$heartId' onclick=\"toggle('$heartId')\"></i>";
                    echo "          <a href = '$offerHref'><img class='activator' src='$pictures[0]'";
                    echo '                style="object-fit: cover;height:300px;"></a>';
                    echo '        </div>';
                    echo '        <div class="card-content">';
                    echo "            <span class='card-title activator grey-text text-darken-4'>$offer->title<i class='material-icons right'>more_vert</i></span>";
                    echo '            <div><i class="material-icons yellow-text text-darken-3">euro</i><a href="#"';
                    echo '                    class="yellow-text text-darken-3 right">';
                    echo "                    <p>$offer->price</p>";
                    echo '                </a></div>';
                    echo '            <div><i class="material-icons text-darken-3">location_on</i><a href="#" class="black-text  right">';
                    echo "                    <p>$offer->location</p>";
                    echo '                </a></div>';
                    echo '            <div><i class="material-icons text-darken-3">date_range</i><a href="#" class=" black-text right">';
                    echo "                    <p>$period</p>";
                    echo '            </a></div>';
                    echo '            <div><i class="material-icons text-darken-3">verified</i><a href="#" class=" black-text right">';
                    echo "                    <p>$accepted</p>";
                    echo '            </a></div>';
                    echo '        </div>';
                    echo '        <div class="card-reveal hideScrollBar">';
                    echo "            <span class='card-title grey-text text-darken-4'>$offer->title<i class='material-icons right'>close</i></span>";
                    echo "            <p>$offer->description</p>";
                    echo '        </div>';
                    echo '    </div>';
                }
                echo '</div>';
                if ($index >= count($offers)) {
                    break;
                }
            }
        }
        ?>
        

    </form>
                   

  <script>
    var editIcons = document.getElementsByClassName('fa-edit');
    for (let i = 0; i < editIcons.length; i++) {
        editIcons[i].addEventListener('click', function () {
            let agencyOfferId = document.getElementById('agencyOffer');
            agencyOfferId.value = editIcons[i].getAttribute('idOffer');
            document.forms['sf'].submit();
        });
    }
   </script>
    
    
</body>

</html>