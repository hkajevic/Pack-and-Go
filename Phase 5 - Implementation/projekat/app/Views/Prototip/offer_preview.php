<!DOCTYPE html>
<html>

<!--Uros Stankovic-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src='http://localhost/projekat/js/offer_preview.js'></script>
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
    <title>Pack & Go</title>
    <script src="https://kit.fontawesome.com/063f419900.js" crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<style>
    .padding-5 {
        margin:2px 2px 2px 2px;
    }
</style>
<body class="grey lighten-4" onresize="updateCardPanel()">
    <?php


        use App\Models\UserModel;
        use App\Models\WishlistModel;

        $offers = isset($filteredOffers)?$filteredOffers:$offers;
        $rowsPerPage = count($offers) / $columnsPerPage;

    ?>
    <?php echo view('navbar.php');?>
    <h1 class="center-align">Ponude</h1>
    <form action="<?php site_url('Offer/showAllOffers') ?>" method="post" name="sf" id="sf">
        <input type='hidden' name='wishListOffer' id='wishListOffer' value="-1">
        <div class="card" id="optionscard" style="padding: 1px 1px 1px 1px;position: absolute;border-radius: 20px;">
            <div class="row">
                <div class="input-field col l8">
                    <input id="searchbar" type="text" class="validate" name="searchText" value="<?php echo isset($options['searchText'])?$options['searchText']:""; ?>">
                    <label for="searchbar">Pretrazi...</label>
                </div>
                <button class="btn waves-effect col l3" style="vertical-align:text-top;margin-top: 24px;" name="nesto" value="nesto"
                    type="submit"><i class="material-icons center tiny">search</i></button>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="sort">
                        <option value="Novije" <?php if (!isset($options['sort'])||(isset($options['sort']) &&
                            $options['sort']=="Novije" )) {echo "selected" ;} ?>>Novije</option>
                        <option value="Starije" <?php if (isset($options['sort']) && $options['sort']=="Starije" )
                            {echo "selected" ;} ?>>Starije</option>
                        <option value="Ceni uzlazno" <?php if (isset($options['sort']) &&
                            $options['sort']=="Ceni uzlazno" ) {echo "selected" ;} ?>>Ceni uzlazno</option>
                        <option value="Ceni silazno" <?php if (isset($options['sort']) &&
                            $options['sort']=="Ceni silazno" ) {echo "selected" ;} ?>>Ceni silazno</option>
                    </select>
                    <label>Sortiraj</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="category">
                        <option value="Sve" <?php if (!isset($options['category'])||(isset($options['category']) &&
                            $options['category']=="Sve")) {echo "selected" ;} ?>>Sve</option>
                        <option value="More" <?php if (isset($options['category']) && $options['category']=="More"
                            ) {echo "selected" ;} ?>>More</option>    
                        <option value="Planina" <?php if (isset($options['category']) && $options['category']=="Planina"
                            ) {echo "selected" ;} ?>>Planina</option>
                        <option value="Grad" <?php if (isset($options['category']) && $options['category']=="Grad" )
                            {echo "selected" ;} ?>>Grad</option>
                        <option value="Selo" <?php if (isset($options['category']) && $options['category']=="Selo" )
                            {echo "selected" ;} ?>>Selo</option>
                    </select>
                    <label>Kategorija</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="transport">
                        <option value="Sve" <?php if (!isset($options['transport'])||(isset($options['transport']) &&
                            $options['transport']=="Sve" )) {echo "selected" ;} ?>>Sve</option>
                            <option value="Bez" <?php if (isset($options['transport']) &&
                            $options['transport']=="Bez" ) {echo "selected" ;} ?>>Bez</option>
                        <option value="Autobus" <?php if (isset($options['transport']) &&
                            $options['transport']=="Autobus" ) {echo "selected" ;} ?>>Autobus</option>
                        <option value="Avion" <?php if (isset($options['transport']) && $options['transport']=="Avion" )
                            {echo "selected" ;} ?>>Avion</option>
                        <option value="Brod" <?php if (isset($options['transport']) && $options['transport']=="Brod" )
                            {echo "selected" ;} ?>>Brod</option>
                    </select>
                    <label>Prevoz</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="accomodation">
                        <option value="Sve" <?php if
                            (!isset($options['accomodation'])||(isset($options['accomodation']) &&
                            $options['accomodation']=="Sve" )) {echo "selected" ;} ?>>Sve</option>
                        <option value="Nekategorizovan" <?php if (isset($options['accomodation']) &&
                            $options['accomodation']=="Nekategorizovan" ) {echo "selected" ;} ?>>Nekategorizovan</option>
                        <option value="1 zvezdica" <?php if (isset($options['accomodation']) &&
                            $options['accomodation']=="1 zvezdica" ) {echo "selected" ;} ?>>1 zvezdica</option>
                        <option value="2 zvezdice" <?php if (isset($options['accomodation']) &&
                            $options['accomodation']=="2 zvezdice" ) {echo "selected" ;} ?>>2 zvezdice</option>
                        <option value="3 zvezdice" <?php if (isset($options['accomodation']) &&
                            $options['accomodation']=="3 zvezdice" ) {echo "selected" ;} ?>>3 zvezdice</option>
                        <option value="4 zvezdice" <?php if (isset($options['accomodation']) &&
                            $options['accomodation']=="4 zvezdice" ) {echo "selected" ;} ?>>4 zvezdice</option>
                        <option value="5 zvezdica" <?php if (isset($options['accomodation']) &&
                            $options['accomodation']=="5 zvezdica" ) {echo "selected" ;} ?>>5 zvezdica</option>
                    </select>
                    <label>Smestaj</label>
                </div>
            </div>

            <div class="row">
                <p class="cyan-text text-darken-3 center">Min cena:</p>
                <input type="number" class="col s10 l10 offset-s1 offset-l1" id="test5" min="0" name="minprice" <?php if
                    (isset($options['minprice'])) { $minPrice=$options['minprice']; echo "value='$minPrice'" ; } ?>/>
            </div>


            <div class="row">
                <p class="cyan-text text-darken-3 center">Max cena:</p>
                <input type="number" class="col s10 l10 offset-s1 offset-l1" id="test5" min="0" name="maxprice" <?php if
                    (isset($options['maxprice'])) { $maxPrice=$options['maxprice']; echo "value='$maxPrice'" ; } ?>/>
            </div>
            <div class="row">
                <p class="cyan-text text-darken-3 center">Kategorije:</p>
                <div class="col l12">
                    <label>
                        <input type="checkbox" class="filled-in" name="allinclusive" <?php if
                            (isset($options['allinclusive'])) {echo "checked" ;} ?>/>
                        <span>All-inclusive</span>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col l12">
                    <label>
                        <input type="checkbox" class="filled-in" name="breakfast" <?php if
                            (isset($options['breakfast'])) {echo "checked" ;} ?>/>
                        <span>Dorucak</span>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col l12">
                    <label>
                        <input type="checkbox" class="filled-in" name="lunch" <?php if (isset($options['lunch']))
                            {echo "checked" ;} ?>/>
                        <span>Rucak</span>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col l12">
                    <label>
                        <input type="checkbox" class="filled-in" name="dinner" <?php if (isset($options['dinner']))
                            {echo "checked" ;} ?>/>
                        <span>Vecera</span>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col l12">
                    <label>
                        <input type="checkbox" class="filled-in" name="insurance" <?php if
                            (isset($options['insurance'])) {echo "checked" ;} ?>/>
                        <span>Osiguranje</span>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col l12">
                    <label>
                        <input type="checkbox" class="filled-in" name="internet" <?php if (isset($options['internet']))
                            {echo "checked" ;} ?>/>
                        <span>Internet</span>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col l12">
                    <label>
                        <input type="checkbox" class="filled-in" name="ac" <?php if (isset($options['ac']))
                            {echo "checked" ;} ?>/>
                        <span>Klima</span>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col l12">
                    <label>
                        <input type="checkbox" class="filled-in" name="guide" <?php if (isset($options['guide']))
                            {echo "checked" ;} ?>/>
                        <span>Vodic</span>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col l12">
                    <label>
                        <input type="checkbox" class="filled-in" name="trips" <?php if (isset($options['trips']))
                            {echo "checked" ;} ?>/>
                        <span>Izleti</span>
                    </label>
                </div>
            </div>
            <div class="row">
                <button class="btn waves-effect col l8 offset-l2" type="submit" name="som" value="a">Primeni</button>
            </div>
        </div>
        <?php
        $wishListModel = new WishlistModel();
        $userModel = new UserModel();
        $iduser = isset($_SESSION['user'])?$userModel->getId($_SESSION['user']):null;
        $wishList = [];
        if ($iduser != null) {
            $wishList = $wishListModel->getWishListOffers($iduser);
        }
        
        $offer = null;
        if (count($offers) != 0) {
            for ($i = 0;$i < $rowsPerPage;$i++) {
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
                    $heartClass = in_array($offerId,$wishList)?"fas":"far";
                    $pictures = explode(";",$offer->pictures);
                    $period = $offer->startDate.' - '.$offer->endDate;
                    $heartId = "heart".$index;
                    $offerHref = site_url("Offer/showOffer/$offerId");
                    echo "<div class='card hoverable' style='visibility:$visibility'>";
                    echo '<div class="card-image waves-effect waves-block waves-light">';
                    echo "<i class='$heartClass fa-heart yellow-text text-darken-3' idOffer='$offerId' style='font-size: 200%;position: absolute;top: 5px;right: 5px;' id='$heartId' onclick=\"toggle('$heartId')\"></i>";
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
                    echo '                </a></div>';
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

        <ul class="pagination center" id="pagination">
            <?php 
        $pageDec = $page - 1;
        $pageInc = $page + 1;
        $currentPageHref = site_url("Offer/showAllOffers/$page");
        
        $nextPageHref = site_url("Offer/showAllOffers/$pageInc");
        $prevPageHref = site_url("Offer/showAllOffers/$pageDec");

        

        if ($pageDec > 0) {
            echo "<li class='padding-5'><button class='btn waves-effect' type='submit' value='$pageDec' name='pageDec'><i class='material-icons'>chevron_left</i></button></li>";
            echo "<li class='padding-5 active cyan darken-3'><button class='btn waves-effect' type='submit' value='$pageDec' name='pageDec'>$pageDec</button></li>";
        }
        echo "<li class='padding-5 active cyan darken-3'><button class='btn waves-effect' type='submit' value='$page' name='page' id='currentPage'>$page</button></li>";
        if ($pageInc <= $totalPages) {
            echo "<li class='padding-5 active cyan darken-3'><button class='btn waves-effect' type='submit' value='$pageInc' name='pageInc'>$pageInc</button></li>";
            echo "<li class='padding-5'><button class='btn waves-effect' type='submit' value='$pageInc' name='pageInc'><i class='material-icons'>chevron_right</i></button></li>";
        }
        ?>
        </ul>

    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, {});

        });
    </script>
    <script>

        function updateCardPanel() {
            var cardPanels = document.getElementsByClassName('cardpanel');
            var cardImages = document.getElementsByClassName('responsive-img');
            var optionsCard = document.getElementById('optionscard');
            var pagination = document.getElementById('pagination');
            if (window.outerWidth <= 600) {
                for (var i = 0; i < cardPanels.length; i++) {
                    cardPanels[i].style.width = '95%';
                    cardPanels[i].style.flexDirection = 'column';
                }
                for (var i = 0; i < cardImages.length; i++) {
                    cardImages[i].style.width = '100%';
                }

            }
            else {
                for (var i = 0; i < cardPanels.length; i++) {
                    cardPanels[i].style.width = '80%';
                    cardPanels[i].style.marginLeft = '20%';
                    cardPanels[i].style.flexDirection = 'row';
                }
                for (var i = 0; i < cardImages.length; i++) {
                    cardImages[i].style.width = '270px';
                    cardImages[i].style.height = '250px';
                }
                optionsCard.style.width = '15%';

                optionsCard.style.marginLeft = '2.5%';
                pagination.style.marginLeft = '17.5%';
            }
        }

        var hearts = document.getElementsByClassName('fa-heart');
        for (let i = 0;i<hearts.length;i++) {
            hearts[i].addEventListener('click',function() {
                let wishListOfferId = document.getElementById('wishListOffer');
                wishListOfferId.value = hearts[i].getAttribute('idOffer');
                setTimeout("document.forms['sf'].submit()",500);
            });
        }

        function toggle(heartId) {
            $("#" + heartId).toggleClass("fas");
            $("#" + heartId).toggleClass("far");
        }

        updateCardPanel();
    </script>

</body>

</html>