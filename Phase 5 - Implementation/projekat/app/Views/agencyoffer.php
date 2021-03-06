<!DOCTYPE html>
<html lang="en">

<!--Nikola Divnic-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="fontovi.css" media="screen,projection" />
    <link href="" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link rel="stylesheet" href="css/commom.css">
    <title>Pack & Go</title>
    <script src="https://kit.fontawesome.com/063f419900.js" crossorigin="anonymous"></script>
</head>

<body class="grey lighten-4">
<?php echo view('navbar.php') ?>
    <form  method="post" enctype="multipart/form-data" action="<?= site_url('User/addAgencyOffer/0') ?>">
    <h1 class="center-align">Postavi ponudu</h1>
    <?php if(isset($validacija)): ?>
               <div style="text-align: center; color:red">
                    <h6><?= $validacija ?></h6>
               </div> 
        <?php endif; ?>
    <div class="card hoverable" style="width: 80%;margin-left: 10%;border-radius: 20px;">
        <div class="row">
            <div class="input-field col l4 s12">
                <i class="material-icons prefix">title</i>
                <input id="title" type="text" class="validate" size="50" name="naslov">
                <label for="title">Naslov</label>

            </div>
            <div class="input-field col l4 s12">
                <i class="material-icons prefix">phone</i>
                <input id="icon_telephone" type="tel" class="validate" size="50" name="telefon">
                <label for="icon_telephone">Telefon</label>
            </div>
            <div class="input-field col l4 s12">
                <i class="material-icons prefix">euro_symbol</i>
                <input type="number" id="fname" name="cena" >
                <label for="fname">Cena u evrima:</label>
            </div>
            <div class="input-field col l4 s12">
                <i class="material-icons prefix">location_on
                </i>
                <input type="text" id="location" name="lokacija">
                <label for="location">Dodajte lokaciju</label>
            </div>
            <div class="input-field col l4 s12">
                <i class="material-icons prefix">Pocetak</i>
                <input type="text" class="datepicker" id = "start" name="pocetak">
                <label for="start">Po??etak</label>
            </div>
            <div class="input-field col l4 s12">
                <i class="material-icons prefix">Kraj</i>
                <input type="text" class="datepicker" id = "end" name="kraj">

                <label for="end">Kraj</label>
            </div>
            <div class="input-field col l4 s12">
                <i class="material-icons prefix">directions_transit
                </i>
                <label for="prevoz">Prevoz</label>
                <br>
                <br>
                <select id="prevoz" class="browser-default" name="prev">
                    <option value="0" disabled selected>Nema</option>
                    <option value="1">Avion</option>
                    <option value="2">Autobus</option>
                    <option value="3">Brod</option>

                </select>

            </div>
            <div class="input-field col l4 s12">
                <i class="material-icons prefix">hotel
                </i>
                <label for="smestaj">Sme??taj</label>
                <br>
                <br>
                <select id="smestaj" class="browser-default" name="accomodation">
                    <option value="0" disabled selected>Nekategorisan</option>
                    <option value="1">1 zvezdica</option>
                    <option value="2">2 zvezdice</option>
                    <option value="3">3 zvezdice</option>
                    <option value="4">4 zvezdice</option>
                    <option value="5">5 zvezdice</option>
                </select>

            </div>
            <div class="input-field col l4 s12">
                <i class="material-icons prefix">home
                </i>
                <label for="kategorija">Kategorija</label>
                <br>
                <br>
                <select id="kategorija" class="browser-default" name="kat">
                    <option value="0" disabled selected>Kategorija</option>
                    <option value="1">More</option>
                    <option value="2">Planina</option>
                    <option value="3">Grad</option>
                    <option value="4">Selo</option>
                </select>

            </div>
        </div>

        <div class="row">
            <div class="col l4 s12 ">
                <label>
                    <input type="checkbox" name="polje1[]"/>
                    <span>All inclusive &nbsp;</span>
                </label>
            </div>
            <div class="col l4 s12 ">
                <label>
                    <input type="checkbox"  name="polje2[]" />
                    <span>Osiguranje &nbsp;</span>

                </label>
            </div>
            <div class="col l4 s12 ">
                <label>
                    <input type="checkbox"  name="polje3[]"/>
                    <span>Vodi?? &nbsp;</span>

                </label>
            </div>
            <div class="col l4 s12 ">
                <label>
                    <input type="checkbox"  name="polje4[]"/>
                    <span>Doru??ak &nbsp;</span>

                </label>
            </div>
            <div class="row">
                <div class="col l4 s12 ">
                    <label>
                        <input type="checkbox"  name="polje5[]"/>
                        <span>Ru??ak</span>
                    </label>
                </div>
                <div class="col l4 s12">
                    <label>
                        <input type="checkbox"  name="polje6[]"/>
                        <span>Ve??era</span>
                    </label>
                </div>

                <div class="col l4 s12">
                    <label>
                        <input type="checkbox"  name="polje7[]"/>
                        <span>Izleti</span>
                    </label>
                </div>
                <div class="col l4 s12">
                    <label>
                        <input type="checkbox"  name="polje8[]"/>
                        <span>Internet</span>
                    </label>
                </div>
                <div class="col l4 s12">
                    <label>
                        <input type="checkbox"  name="polje9[]"/>
                        <span>Klima</span>
                    </label>
                </div>
                <div class="col l3"></div>
            </div>
            <form class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">description</i>
                    <textarea id="textarea1" class="materialize-textarea" name="opis"></textarea>
                    <label for="textarea1">Opis</label>
                </div>

            </form>


            <div class="card-content row">
                <div class="left col l2 s6">
                    <label for="img">
                        <p style="display: inline;">
                            Izaberite sliku
                        </p>
                        <i class="material-icons" for="img" src="kamera.png" alt="Oglasi se"
                            width="80px">add_a_photo</i>
                    </label>
                    <input type="file" id="img" style="display: none;" name="files[]" multiple accept="image/*">
                </div>
                <button class="col l2 m4 s6 offset-l6 offset-m4 offset-s3 btn  waves-effect waves-light" 
            name="action" id="posalji-poruku" type="submit" >Postavi
                <i class="material-icons right">send</i>
        
            </button>
                <!--
                <a class="btn waves-effect waves-light right col l2 s6">Postavi
                    <i class="material-icons right">send</i>
                </a>
                -->
            </div>
        </div>
    </form>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(elems, {});
      });
        </script>
</body>

</html>