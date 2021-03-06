<!DOCTYPE html>
<html>

<!--Uros Stankovic-->

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Pack & Go</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/commom.css'>
    <script src='js/wish_list.js'></script>


    
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize-v1.0.0/materialize/css/materialize.min.css"
        media="screen,projection" />
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="css/offer_preview.css">
    <link rel="stylesheet" href="fontovi.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="js/nouislider.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>

    <!-- wRunner CSS -->
    <link rel="stylesheet" href="css/wrunner-default-theme.css">
    <!-- wRunner JS -->
    <script src="js/wrunner-native.js"></script>
</head>

<body class="grey lighten-4">
    <nav>
        <div class="nav-wrapper  cyan darken-3">
            <a href="index.html" class="brand-logo ">Pack & Go</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="offer_preview.html">Ponude</a></li>
                <li><a href="contact.html">Kontakt</a></li>
                <li><a href="compare_offers.html">Uporedi dve ponude</a></li>
                <li><a href="wish_list.html">Va??a lista ??elja</a></li>
                <li><a href="index.html">Odjavi se</a></li>
            </ul>
        </div>
    </nav>
    <h1 class="center-align">Va??a lista ??elja</h1>
    
        
    <div style="display: flex;flex-direction: row;justify-content: space-evenly;" class="cardpanel">
        <div class="card hoverable">
            <div class="card-image waves-effect waves-block waves-light">
                <i class="far fa-heart yellow-text text-darken-3" style="font-size: 200%;position: absolute;top: 5px;right: 5px;" id="heart8" onclick="toggle('heart8')"></i>
                <a href = "offer.html"><img class="activator responsive-img" src="pictures/prag.jpg"
                    style="width: 300px;height:300px;object-fit: cover;"></a>
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Prag vikend<i
                        class="material-icons right">more_vert</i></span>
                <div><i class="material-icons yellow-text text-darken-3">euro</i><a href="#"
                        class="yellow-text text-darken-3 right">
                        <p>200</p>
                    </a></div>
                <div><i class="material-icons text-darken-3">location_on</i><a href="#" class="black-text  right">
                        <p>Prag</p>
                    </a></div>
                <div><i class="material-icons text-darken-3">date_range</i><a href="#" class=" black-text right">
                        <p>02/04 - 05/04</p>
                    </a></div>

            </div>
            <div class="card-reveal hideScrollBar">
                <span class="card-title grey-text text-darken-4">Prag vikend<i class="material-icons right">close</i></span>
                <p>Zvu??i jako izazovno turu po Pragu pretvoriti u turu pra??kih pivnica i u??ivati u vrhunskim ??e??kom pivu, svinjskim kolenicama i kobasicama ali Prag ima jo?? jako puno toga da ponudi.

                    Za posetioce koji imaju samo jedan dan za posetu Pragu neizbe??no je videti Pra??ki dvorac, Karlov most i Starogradski trg. Ve?? za tri dana mogu se lepo obi??i sve glavne atrakcije Praga.??</p>
            </div>
        </div>
        <div class="card hoverable">
            <div class="card-image waves-effect waves-block waves-light">
                <i class="far fa-heart yellow-text text-darken-3" style="font-size: 200%;position: absolute;top: 5px;right: 5px;" id="heart2" onclick="toggle('heart2')"></i>
                <img class="activator responsive-img" src="pictures/bec.png"
                    style="width: 300px;height:300px;object-fit: cover;">
            </div>
            <div class="card-content">
                
                <span class="card-title activator grey-text text-darken-4">Be?? 1.maj<i
                        class="material-icons right">more_vert</i></span>
                <div><i class="material-icons yellow-text text-darken-3">euro</i><a href="#"
                        class="yellow-text text-darken-3 right">
                        <p>199</p>
                    </a></div>
                <div><i class="material-icons text-darken-3">location_on</i><a href="#" class="black-text  right">
                        <p>London</p>
                    </a></div>
                <div><i class="material-icons text-darken-3">date_range</i><a href="#" class=" black-text right">
                        <p>01/05 - 03/05</p>
                    </a></div>

            </div>
            <div class="card-reveal hideScrollBar">
                <span class="card-title grey-text text-darken-4">Be?? 1.maj<i class="material-icons right">close</i></span>
                <p>Zadivljuju??a arhitektura i bogata kulturna ponuda nekada carskog grada Be??a ??ine ga jednom od omiljenih turisti??kih destinacija u svetu. Velika ??etvorka - Hajdn, Mocart, Betoven i ??ubert ??ini ga gradom muzike. Be?? nije samo grad valcera, prelepih dvoraca i bogatih muzejskih kolekcija ve?? i mesto u kome se mo??ete opustiti uz zaher tortu, u??ivati u pogledu sa velikog panoramskog to??ka ili posetiti po mnogima najbolji zoolo??ki vrt u Evropi.??</p>
            </div>
        </div>
        <div class="card hoverable">
            <div class="card-image waves-effect waves-block waves-light">
                <i class="far fa-heart yellow-text text-darken-3" style="font-size: 200%;position: absolute;top: 5px;right: 5px;" id="heart3" onclick="toggle('heart3')"></i>
                <img class="activator responsive-img" src="pictures/zlatibor2.jpg"
                    style="width: 300px;height:300px;object-fit: cover;">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Zlatibor 4 dana<i
                        class="material-icons right">more_vert</i></span>
                <div><i class="material-icons yellow-text text-darken-3">euro</i><a href="#"
                        class="yellow-text text-darken-3 right">
                        <p>180</p>
                    </a></div>
                <div><i class="material-icons text-darken-3">location_on</i><a href="#" class="black-text  right">
                        <p>Zlatibor</p>
                    </a></div>
                <div><i class="material-icons text-darken-3">date_range</i><a href="#" class=" black-text right">
                        <p>20/04 - 25/04</p>
                    </a></div>

            </div>
            <div class="card-reveal hideScrollBar">
                <span class="card-title grey-text text-darken-4">Zlatibor 4 dana<i class="material-icons right">close</i></span>
                <p>Planina Zlatibor ??? planina zlatnih borova, blago zaobljenih vrhova i visova, sa najvi??im vrhom Tornikom 1496m, nalazi se u jugozapadnom delu Srbije, na oko 200km od Beograda. Prose??na nadmorska visina zlatiborskog podru??ja iznosi oko 1000m i omogu??ava u??ivanje gostiju u blagotvornoj klimi i prirodnim lepotama.</p>
            </div>
        </div>
        <div class="card hoverable">
            <div class="card-image waves-effect waves-block waves-light">
                <i class="far fa-heart yellow-text text-darken-3" style="font-size: 200%;position: absolute;top: 5px;right: 5px;" id="heart4" onclick="toggle('heart4')"></i>
                <img class="activator responsive-img" src="pictures/moskva.jpg"
                    style="width: 300px;height:300px;object-fit: cover;">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Moskva 14.2.<i
                        class="material-icons right">more_vert</i></span>
                <div><i class="material-icons yellow-text text-darken-3">euro</i><a href="#"
                        class="yellow-text text-darken-3 right">
                        <p>450</p>
                    </a></div>
                <div><i class="material-icons text-darken-3">location_on</i><a href="#" class="black-text  right">
                        <p>Moskva</p>
                    </a></div>
                <div><i class="material-icons text-darken-3">date_range</i><a href="#" class=" black-text right">
                        <p>13/02 - 18/02</p>
                    </a></div>

            </div>
            <div class="card-reveal hideScrollBar">
                <span class="card-title grey-text text-darken-4">Moskva 14.2.<i class="material-icons right">close</i></span>
                <p>Moskva je specifi??na. Druga??ija od bilo koje druge destinacije za koje se turisti odlu??uju kada krenu na put kroz Evropu. Atrakcije i znamenitosti u Moskvi koje treba videti je gotovo ludo nabrajati jer ih ima toliko da je mo??da ??ak bolji savet prosto ??etati kroz ovaj ogromni grad i u??ivati.??</p>
            </div>
        </div>


    </div>

        



  
    
    
</body>

</html>