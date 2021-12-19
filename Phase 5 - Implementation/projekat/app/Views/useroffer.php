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
    <form method="post" enctype="multipart/form-data" action="<?= site_url('User/addRenterOffer/0') ?>">
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
                <input id="titile" type="text" class="validate" size="50" name="naslov">
                <label for="title">Naslov</label>

            </div>
            <div class="input-field col l4 s12">
                <i class="material-icons prefix">phone</i>
                <input id="icon_telephone" type="tel" class="validate" size="50" name="telefon">
                <label for="icon_telephone">Telefon</label>
            </div>
            <div class="input-field col l4 s12">
                <i class="material-icons prefix">euro_symbol</i>
                <input type="number" id="price" max="1000" min="3" name="cena">
                <label for="price">Cena u evrima:</label>
            </div>
            <div class="input-field col l4 s12">
                <i class="material-icons prefix">location_on
                </i>
                <input type="text" id="location" max="1000" min="3" name="lokacija">
                <label for="location">Dodajte lokaciju</label>
            </div>
            <div class="input-field col l4 s12">
                <i class="material-icons prefix">Pocetak</i>
                <input type="text" class="datepicker" id = "start" name="pocetak">
                <label for="start">Početak</label>
            </div>
            <div class="input-field col l4 s12">
                <i class="material-icons prefix">Kraj</i>
                <input type="text" class="datepicker" id = "end" name="kraj">

                <label for="end">Kraj</label>
            </div>

            <div class="input-field col l4 s12 offset-l4">
                <i class="material-icons prefix">home
                </i>
                <label for="kategorija">Kategorija</label>
                <br>
                <br>
                <select id="kategorija" class="browser-default" name="kat"  >
                    <option value="0" disabled selected>Kategorija</option>
                    <option value="1">More</option>
                    <option value="2">Planina</option>
                    <option value="3">Grad</option>
                    <option value="4">Selo</option>
                </select>

            </div>
            
        </div>

        <div class="row">
            <div class="col l2 s12 offset-l4">
                <label>
                    <input name="jelo1[]"  type="checkbox" />
                    <span>Doručak </span>
                </label>
            </div>

            <div class="col l2 s12">
                <label>
                    <input  name="jelo2[]" type="checkbox" />
                    <span>Ručak</span>
                </label>
            </div>

            <div class="col l2 s12">
                <label>
                    <input name="jelo3[]" type="checkbox" />
                    <span>Večera</span>
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
                <div>
                <label for="files">Unesite slike:</label>
                <input type="file" id="files" name="files[]" multiple>
                </div>
            </div>
            <button class="col l2 m4 s6 offset-l6 offset-m4 offset-s3 btn  waves-effect waves-light" type="submit"
            name="action" id="posalji-poruku">Postavi
                <i class="material-icons right">send</i>
        
            </button>
            <!--
            <a class="btn waves-effect waves-light right col l2 s6" name="postavi"
            >Postavi
                <i class="material-icons right" type="submit">send</i>
            </a>-->
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