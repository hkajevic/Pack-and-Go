<!DOCTYPE html>
<html>

<!--Uros Stankovic-->

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Pack&Go</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='http://localhost/projekat/js/index.js'></script>
    <link href="http://localhost/projekat/css/fontovi.css">
    <link href = "http://localhost/projekat/css/commom.css" rel="stylesheet">
    <link href = "http://localhost/projekat/css/index.css" rel="stylesheet">


     <!--Import Google Icon Font-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!-- Compiled and minified JavaScript -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
 
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <!--Let browser know website is optimized for mobile-->
     <script src="https://kit.fontawesome.com/063f419900.js" crossorigin="anonymous"></script>
</head>
<body onresize="updateCardPanel();">
    <?php echo view('navbar.php');?>

    <h1 class="center-align">Dobrodosli na Pack&Go!</h1>
    <div class="row">
        <p class="center-align col s10 l4 offset-l4 offset-s1">Pack & Go Vam nudi da na jednom mestu pregledate ponude za svoje omiljene destinacije. Uštedite vreme i spasite se mukotrpne pretrage koje bi proveli u pretraživanju web stranica. </p>
    </div>
    <h2 class="center-on-small-only text-index" >
        Upoznajte Srbiju
    </h2>
    <div class="parallax-container">
        <div class="parallax">
            <img src="http://localhost/projekat/pictures/uvac2.jpeg">

        </div>
    </div>
    <br>
    <p class="center-non-large text-index container justify-large">
        Naša zemlja obiluje prirodnim bogatstvima i predelima od kojih uistinu zastaje dah. Bajkoviti krajolici, pored reka i planina, neki od njih potpuno zapostavljeni, svedoče o tome koliko je Srbija prelepa. Za trenutak zaboravite iskušenja svakodnevnice i opustite se u čarolijama majke prirode, koja su od nas udaljena samo nekoliko sati vožnje.
        Srbija se može pohvaliti velikim brojem prirodnih atrakcija – za one koji uživaju u lepim pejzažima, spomenicima istorije i kulture – za one kojima obilazak Srbije predstavlja obilazak znamenitosti, ali i etno selima i spa centrima – ukoliko tražite idealna mesta za odmor u Srbiji.
    </p>
    <br>
    <div style="display: flex;flex-direction: row;justify-content: space-evenly;" class="cardpanel">
        <div class="card hoverable">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator responsive-img" src="http://localhost/projekat/pictures/kop.jpg" style="width: 300px;height:300px;object-fit: cover;">

            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Kopaonik<i
                        class="material-icons right">more_vert</i></span>
                <p><a href="http://localhost:8080/index.php/Offer/showOffer/2" class="yellow-text text-darken-3">Pogledaj ponudu</a></p>
            </div>
            <div class="card-reveal hideScrollBar">
                <span class="card-title grey-text text-darken-4">Kopaonik<i class="material-icons right">close</i></span>
                <p>Turistički centar Kopaonik aktivan je i van zimske sezone i predstavlja jednu od omiljenih destinacija za rekreaciju i odmor tokom toplijeg perioda godine. Uglavnom se uživa u aktivnostima kao što su šetnja, planinarenje, biciklizam, a u ponudi su i škole tenisa, košarke i jahanja. Brojni tereni vrhunskih kvaliteta dostupni su za sportske pripreme pa se tako i vi možete rekreirati na mestima gde se pripremaju srpski reprezentativci.</p>
            </div>
        </div>
        <div class="card hoverable" >
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator responsive-img" src="http://localhost/projekat/pictures/zlatibor.jpg" style="width: 300px;height:300px;object-fit: cover;">

            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Zlatibor<i
                        class="material-icons right">more_vert</i></span>
                <p><a href="http://localhost:8080/index.php/Offer/showOffer/1" class="yellow-text text-darken-3">Pogledaj ponudu</a></p>
            </div>
            <div class="card-reveal hideScrollBar">
                <span class="card-title grey-text text-darken-4">Zlatibor<i class="material-icons right">close</i></span>
                <p>Planina Zlatibor – planina zlatnih borova, blago zaobljenih vrhova i visova, sa najvišim vrhom Tornikom 1496m, nalazi se u jugozapadnom delu Srbije, na oko 200km od Beograda. Prosečna nadmorska visina zlatiborskog područja iznosi oko 1000m i omogućava uživanje gostiju u blagotvornoj klimi i prirodnim lepotama.</p>
            </div>
        </div>
        <div class="card hoverable" >
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator responsive-img" src="http://localhost/projekat/pictures/rudno2.jpg" style="width: 300px;height:300px;object-fit: cover;">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Rudno<i
                        class="material-icons right">more_vert</i></span>
                <p><a href="http://localhost:8080/index.php/Offer/showOffer/12" class="yellow-text text-darken-3">Pogledaj ponudu</a></p>
            </div>
            <div class="card-reveal hideScrollBar">
                <span class="card-title grey-text text-darken-4">Rudno<i class="material-icons right">close</i></span>
                <p>Rudno – vazdušna banja sa nadmorskom visinom od 1100 m., nalazi se izmedju dva predivna manastira: manastira Studenice (osnovan je krajem 12. veka kao glavna Zadužbina rodonačelnika dinastije Nemanjića, Stefana Nemanje.) i manastira Gradac (podignut je 1268. godine a zadužbina je Jelene Anžujske, žene kralja Uroša.) na obroncima planine Radočelo i severno je podgorje planine Golije (planina pod zaštitom UNESCO-a), gde je jedan od centara parka prirode Golija i prirodnog rezervata Golija – Studenica.</p>
            </div>
        </div>
        <div class="card hoverable" >
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator responsive-img" src="http://localhost/projekat/pictures/stara_planina.jpg" style="width: 300px;height:300px;object-fit: cover;">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Stara planina<i
                        class="material-icons right">more_vert</i></span>
                <p><a href="http://localhost:8080/index.php/Offer/showOffer/5" class="yellow-text text-darken-3">Pogledaj ponudu</a></p>
            </div>
            <div class="card-reveal hideScrollBar">
                <span class="card-title grey-text text-darken-4">Stara planina<i class="material-icons right">close</i></span>
                <p>Beskonačni krajolici netaknute prirode, prostrani planinski pašnjaci i guste šume bogate plodovima i lekovitim biljem, slikovita sela i zanimljiv folklor – to je slika Stare planine, jednog od najlepših i najautentičnijih prirodnih rezervata Srbije, u kojem se nalazi i najviši planinski vrh ove zemlje, Midžor na 2.169 metara nadmorske visine.</p>
            </div>
        </div>
        
    </div>
    <h2 class="center-on-small-only text-index" >
        Provedite zimske dane u Dubaiu
    </h2>
    <div class="parallax-container">
        <div class="parallax">
            <img src="http://localhost/projekat/pictures/dubai.jpg">
        </div>
    </div>
    <br>
    <p class="center-non-large text-index container justify-large">
        Zakoračite u ono što nas čeka već sutra.
        Doživite čaroliju arapskog sveta, otputujte u Dubai...
        Uživajte u gradu kontrasta, blistavoj metropoli Persijskog zaliva fascinantne orijentalne gostoprimljivosti.
        Uostalom, nigde kao u Dubaiju nećete doživeti tako uzbudljiv spoj tradicije i modernog.
        Brojni luksuzni hotelski kompleksi, na korak od peskovitih plaža od kojih je najlepša ona s imenom Džumeira, zadiviće vas nestvarnim enterijerima i bogatstvom sadržaja.
    </p>
    <br>
    <h2 class="center-on-small-only text-index" >
        Posetite najvece svetske prestonice
    </h2>
    <div class="parallax-container">
        <div class="parallax">
            <img src="http://localhost/projekat/pictures/capitals5.jpg" style="object-fit: cover;">
        </div>
    </div>
    <br>
    <p class="center-non-large text-index container justify-large">
        Putovanja svetskim prestonicama su jedno od najlepših iskustava koje čovek može sebi da priušti. Kroz svet putovanja dobijamo širinu, svestranost koja podstiče kreativnost i slobodu da osvajamo gradove, šume, planine, mora i pustinje.

        Svet putovanja nam omogućava da upoznajemo najrazličitije kulture, naučimo o neobičnim običajima i bar nakratko živimo načinom života koji se razlikuje od naših. Kroz svet putovanja, ne samo da upoznajemo svet oko sebe već menjamo sopstveni način razmišljanja, menjajući time i sam svet.
    </p>
    <br>
    <div style="display: flex;flex-direction: row;justify-content: space-evenly;" class="cardpanel">
        <div class="card hoverable">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator responsive-img" src="http://localhost/projekat/pictures/london.jpg" style="width: 300px;height:300px;object-fit: cover;">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">London<i
                        class="material-icons right">more_vert</i></span>
                <p><a href="http://localhost:8080/index.php/Offer/showOffer/7" class="yellow-text text-darken-3">Pogledaj ponudu</a></p>
            </div>
            <div class="card-reveal hideScrollBar">
                <span class="card-title grey-text text-darken-4">London<i class="material-icons right">close</i></span>
                <p>London je slojevit grad, pun kontrasta. Neprestano se menja, a u isto vreme je konzervativan, pa je njegovu atmosferu nemoguće preneti. Svako će ga doživeti drugačije. Pa evo jednog pogleda i vizije o tome kakav je London kroz atrakcije u Londonu i znamenitosti koje se često preskoče. </p>
            </div>
        </div>
        <div class="card hoverable" >
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator responsive-img" src="http://localhost/projekat/pictures/pariz.jpeg" style="width: 300px;height:300px;object-fit: cover;">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Pariz<i
                        class="material-icons right">more_vert</i></span>
                <p><a href="http://localhost:8080/index.php/Offer/showOffer/6" class="yellow-text text-darken-3">Pogledaj ponudu</a></p>
            </div>
            <div class="card-reveal hideScrollBar">
                <span class="card-title grey-text text-darken-4">Pariz<i class="material-icons right">close</i></span>
                <p>Kada pomislimo na Pariz u glavi nam se stvara slika jednog od najlepših svetskih gradova, koji se nesumnjivo nalazi na listi želja svakog turiste. Glavni grad Francuske odiše zbilja posebnom energijom u koju se zaljubi apsolutno svako ko barem jednom poseti ovaj Grad svetlosti.</p>
            </div>
        </div>
        <div class="card hoverable" >
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator responsive-img" src="http://localhost/projekat/pictures/rim.jpg" style="width: 300px;height:300px;object-fit: cover;">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Rim<i
                        class="material-icons right">more_vert</i></span>
                <p><a href="http://localhost:8080/index.php/Offer/showOffer/9" class="yellow-text text-darken-3">Pogledaj ponudu</a></p>
            </div>
            <div class="card-reveal hideScrollBar">
                <span class="card-title grey-text text-darken-4">Rim<i class="material-icons right">close</i></span>
                <p>Rim je atraktivan za posete u svako doba godine. Ovaj Večni grad je remek delo arhitektonskih čuda koji će Vam pružiti  mogućnost da se prošetate kroz vekove i zakoračite u prelepi svetski muzej na otvorenom.</p>
            </div>
        </div>
        <div class="card hoverable" >
            <div class="card-image waves-effect waves-block waves-light">
               <img class="activator responsive-img" src="http://localhost/projekat/pictures/moskva.jpg" style="width: 300px;height:300px;object-fit: cover;">

            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Moskva<i
                        class="material-icons right">more_vert</i></span>
                <p><a href="http://localhost:8080/index.php/Offer/showOffer/3" class="yellow-text text-darken-3">Pogledaj ponudu</a></p>
            </div>
            <div class="card-reveal hideScrollBar">
                <span class="card-title grey-text text-darken-4">Moskva<i class="material-icons right">close</i></span>
                <p>Moskva je specifična. Drugačija od bilo koje druge destinacije za koje se turisti odlučuju kada krenu na put kroz Evropu. Atrakcije i znamenitosti u Moskvi koje treba videti je gotovo ludo nabrajati jer ih ima toliko da je možda čak bolji savet prosto šetati kroz ovaj ogromni grad i uživati.</p>
            </div>
        </div>
        
    </div>
    
    
</body>
</html>