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

    <form  method="post" enctype="multipart/form-data"  action="<?php echo site_url('User/addAgencyOffer/1') ?>">
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
                <input id="title" type="text" class="validate" size="50" name="naslov" value="<?= $title ?>">
                <label for="title">Naslov</label>

            </div>
            <div class="input-field col l4 s12">
                <i class="material-icons prefix">phone</i>
                <input id="icon_telephone" type="tel" class="validate" size="50" name="telefon" value="<?= $phone ?>">
                <label for="icon_telephone">Telefon</label>
            </div>
            <div class="input-field col l4 s12">
                <i class="material-icons prefix">euro_symbol</i>
                <input type="number" id="fname" name="cena" max="1000" min="3" value = "<?= $price ?>">
                <label for="fname">Cena u evrima:</label>
            </div>
            <div class="input-field col l4 s12">
                <i class="material-icons prefix">location_on
                </i>
                <input type="text" id="location" name="lokacija" max="1000" min="3" value = "<?= $location ?>">
                <label for="location">Dodajte lokaciju</label>
            </div>
            <div class="input-field col l4 s12">
                <i class="material-icons prefix">Pocetak</i>
                <input type="text" class="datepicker" id = "start" name="pocetak" value="<?= $startDate ?>">
                <label for="start">Početak</label>
            </div>
            <div class="input-field col l4 s12">
                <i class="material-icons prefix">Kraj</i>
                <input type="text" class="datepicker" id = "end" name="kraj" value="<?= $endDate ?>">

                <label for="end">Kraj</label>
            </div>
            <div class="input-field col l4 s12">
                <i class="material-icons prefix">directions_transit
                </i>
                <label for="prevoz">Prevoz</label>
                <br>
                <br>
                <select id="prevoz" class="browser-default" name="prev">
                    <option value="0" <?php if($transport=="Nema") echo 'selected="selected"'; ?> disabled selected>Nema</option>
                    <option value="1" <?php if($transport=="Avion") echo 'selected="selected"'; ?>>Avion</option>
                    <option value="2" <?php if($transport=="Autobus") echo 'selected="selected"'; ?>>Autobus</option>
                    <option value="3" <?php if($transport=="Brod") echo 'selected="selected"'; ?>>Brod</option>

                </select>

            </div>
            <div class="input-field col l4 s12">
                <i class="material-icons prefix">hotel
                </i>
                <label for="smestaj">Smeštaj</label>
                <br>
                <br>
                <select id="smestaj" class="browser-default" name="accomodation">
                    <option value="0" <?php if($accomodation=="Nekategorisan") echo 'selected="selected"'; ?> disabled selected>Nekategorisan</option>
                    <option value="1" <?php if($accomodation=="1 zvezdica") echo 'selected="selected"'; ?>>1 zvezdica</option>
                    <option value="2" <?php if($accomodation=="2 zvezdice") echo 'selected="selected"'; ?>>2 zvezdice</option>
                    <option value="3" <?php if($accomodation=="3 zvezdice") echo 'selected="selected"'; ?>>3 zvezdice</option>
                    <option value="4" <?php if($accomodation=="4 zvezdice") echo 'selected="selected"'; ?>>4 zvezdice</option>
                    <option value="5" <?php if($accomodation=="5 zvezdice") echo 'selected="selected"'; ?>>5 zvezdice</option>
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
                    <option value="1" <?php if($category=="More") echo 'selected="selected"'; ?>>More</option>
                    <option value="2" <?php if($category=="Planina") echo 'selected="selected"'; ?>>Planina</option>
                    <option value="3" <?php if($category=="Grad") echo 'selected="selected"'; ?>>Grad</option>
                    <option value="4" <?php if($category=="Selo") echo 'selected="selected"'; ?>>Selo</option>
                </select>

            </div>
        </div>

        <div class="row">
            <div class="col l4 s12 ">
                <label>
                    <input type="checkbox" name="polje1[]" <?php echo ($allInclusive==1 ? 'checked' : '');?>/>
                    <span>All inclusive &nbsp;</span>
                </label>
            </div>
            <div class="col l4 s12 ">
                <label>
                    <input type="checkbox"  name="polje2[]" <?php echo ($insurance==1 ? 'checked' : '');?>/>
                    <span>Osiguranje &nbsp;</span>

                </label>
            </div>
            <div class="col l4 s12 ">
                <label>
                    <input type="checkbox"  name="polje3[]" <?php echo ($guide==1 ? 'checked' : '');?>/>
                    <span>Vodič &nbsp;</span>

                </label>
            </div>
            <div class="col l4 s12 ">
                <label>
                    <input type="checkbox"  name="polje4[]" <?php echo ($breakfast==1 ? 'checked' : '');?>/>
                    <span>Doručak &nbsp;</span>

                </label>
            </div>
            <div class="row">
                <div class="col l4 s12 ">
                    <label>
                        <input type="checkbox"  name="polje5[]" <?php echo ($lunch==1 ? 'checked' : '');?>/>
                        <span>Ručak</span>
                    </label>
                </div>
                <div class="col l4 s12">
                    <label>
                        <input type="checkbox"  name="polje6[]" <?php echo ($dinner==1 ? 'checked' : '');?>/>
                        <span>Večera</span>
                    </label>
                </div>

                <div class="col l4 s12">
                    <label>
                        <input type="checkbox"  name="polje7[]" <?php echo ($trips==1 ? 'checked' : '');?>/>
                        <span>Izleti</span>
                    </label>
                </div>
                <div class="col l4 s12">
                    <label>
                        <input type="checkbox"  name="polje8[]" <?php echo ($internet==1 ? 'checked' : '');?>/>
                        <span>Internet</span>
                    </label>
                </div>
                <div class="col l4 s12">
                    <label>
                        <input type="checkbox"  name="polje9[]" <?php echo ($AC==1 ? 'checked' : '');?>/>
                        <span>Klima</span>
                    </label>
                </div>
                <div class="col l3"></div>
            </div>
            <form class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">description</i>
                    <textarea id="textarea1" class="materialize-textarea" name="opis"><?php echo $description ?></textarea>
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
                <a href="<?php echo site_url('UserWithOffers/showUserOffers') ?>">
                <button class="col l2 m4 s6  offset-m4  btn  waves-effect waves-light" type="button"
                name="odustani" id="posalji-poruku">Odustani
                <i class="material-icons right">send</i>
        
            </button></a>

           
            <button class="btn waves-effect waves-light offset-l1 col l2 s6" style = " margin-bottom: 5%;" type="submit"
            name="izmeni" value="">Izmeni
                <i class="material-icons right">send</i>
            </button>
            </div>
            </form>
            <div class="card-content row" >
            
            <?php 
                if(isset($paths)){
                            
                for ($x = 0; $x < count($paths); $x++) {
                    $imgUrl = $paths[$x]; 
                    //echo $imgUrl;
                ?> 
                    <img style="width: 100px; height:100px" src="<?= $imgUrl; ?>"/> 
                <?php  
                    }}
                ?>
            
            </div>
                <!--
                <a class="btn waves-effect waves-light right col l2 s6">Postavi
                    <i class="material-icons right">send</i>
                </a>
                -->
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(elems, {});
      });
        </script>
</body>

</html>