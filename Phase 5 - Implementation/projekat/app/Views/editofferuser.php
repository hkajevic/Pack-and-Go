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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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

<!--action="<?= site_url('User/addRenterOffer/1') ?>"-->
<form method="post" enctype="multipart/form-data" action="<?php echo site_url("User/addRenterOffer/1") ?>">
<?php $_SESSION['offerId']=$idOffer;?>
    <h1 class="center-align">Izmeni ponudu</h1>
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
                <input type="number" id="price" name="cena" max="1000" min="3" value = "<?= $price ?>">
                <label for="price">Cena u evrima:</label>
            </div>
            <div class="input-field col l4 s12">
                <i class="material-icons prefix">location_on
                </i>
                <input type="text" id="location" max="1000" min="3" name="lokacija" value = "<?= $location ?>">
                <label for="location">Dodajte lokaciju</label>
            </div>
            <div class="input-field col l4 s12">
                <i class="material-icons prefix">Pocetak</i>
                <input type="text" class="datepicker" name="pocetak" id = "start" value="<?= $startDate ?>">
                <label for="start">Početak</label>
            </div>
            <div class="input-field col l4 s12">
                <i class="material-icons prefix">Kraj</i>
                <input type="text" class="datepicker" id = "end" name="kraj" value="<?= $endDate ?>">

                <label for="end">Kraj</label>
            </div>

            <div class="input-field col l4 s12 offset-l4">
                <i class="material-icons prefix">home
                </i>
                <label for="kategorija">Kategorija</label>
                <br>
                <br>
                <select id="kategorija" class="browser-default" name="kat">
                    <option value="3" <?php if($category=="Grad") echo 'selected="selected"'; ?>>Grad</option>
                    <option value="1" <?php if($category=="More") echo 'selected="selected"'; ?>>More</option>
                    <option value="2" <?php if($category=="Planina") echo 'selected="selected"'; ?>>Planina</option>
                    <option value="4" <?php if($category=="Selo") echo 'selected="selected"'; ?>>Selo</option>
                </select>

            </div>
            
        </div>

        <div class="row">
            <div class="col l2 s12 offset-l4">
                <label>
                    <input name="jelo1[]" type="checkbox" <?php echo ($breakfast==1 ? 'checked' : '');?>/>
                    <span>Doručak </span>
                </label>
            </div>

            <div class="col l2 s12">
                <label>
                    <input name="jelo1[]" type="checkbox" <?php echo ($lunch==1 ? 'checked' : '');?>/>
                    <span>Ručak</span>
                </label>
            </div>

            <div class="col l2 s12">
                <label>
                    <input name="jelo1[]" type="checkbox" <?php echo ($dinner==1 ? 'checked' : '');?>/>
                    <span>Večera</span>
                </label>
            </div>
            <div class="col l3"></div>
        </div>
        <form class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">description</i>
                <textarea name="opis" id="textarea1" class="materialize-textarea"><?php echo $description ?></textarea>
                <label for="textarea1">Opis</label>
            </div>

        </form>


        <div class="card-content row">
            <div class="left col l2 s6">
                <label for="img">
                    <p style="display: inline;">
                        Izaberite sliku
                    </p>
                    <i class="material-icons" for="img" src="kamera.png" alt="Oglasi se" width="80px">add_a_photo</i>
                   <!-- <img style = "width: 200px;height: 150px;" src="pictures/prag.jpg">-->
         
                </label>
                <input type="file" id="img" style="display: none;" name="files[]" accept="image/*">
            </div>
           <!-- <a class="btn waves-effect waves-light offset-l2 col l2 s6" style = "margin-top: 12%;">Odustani
                <i class="material-icons right">send</i>
            </a>-->
            <button class="btn waves-effect waves-light offset-l1 col l2 s6" style = "margin-top: 12%; margin-bottom: 5%;" type="submit"
            name="odustani" value="">Odustani
                <i class="material-icons right">send</i>
        
            <a href="<?php echo site_url('User/addRenterOffer/0') ?>"></button>
            <button class="btn waves-effect waves-light offset-l1 col l2 s6" style = "margin-top: 12%; margin-bottom: 5%;" type="submit"
            name="izmeni" value="" onclick="<?php $izabrano=0;?>">Izmeni
                <i class="material-icons right">send</i>
            </button> </a>
            <a href="<?php echo site_url('User/addRenterOffer/1') ?>">
            <button class="btn waves-effect waves-light offset-l1 col l2 s6" style = "margin-top: 12%; margin-bottom: 5%;" type="submit"
            name="obrisi" value="" onclick="<?php $izabrano=1;?>">Obrisi
                <i class="material-icons right">send</i>
            </button></a>
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
                

        </div>
    </div>

    <div id="modal1" class="modal">
        <div class="modal-content">
          <h4  class = "center-align">Da li ste sigurni da želite da obrišete ovu ponudu?</h4>
          <p class = "center-align">Jednom obrisana ponuda se ne može povratiti</p>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-close waves-effect waves-green btn-flat left">Odustajem</a>
          <a href="#!" class="modal-close waves-effect waves-green btn-flat">Siguran sam</a>
          
        </div>
      </div>

      <script>
          document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems,{});
  });
      </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, {});
  });
    </script>
</body>

</html>