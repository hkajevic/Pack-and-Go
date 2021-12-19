<!DOCTYPE html>
<html lang="en">

<!--Halil Kajevic-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <!-- account_box contact_phone     work-->
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="fontovi.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pack & Go</title>
    <script src="https://kit.fontawesome.com/063f419900.js" crossorigin="anonymous"></script>
    <title>Brisanje korisnika</title>
    <style>
        .darkGreen {
            color: #00acc1;
            text-align: center;

        }

        .card {
            /* Add shadows to create the "card" effect */
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 50%;
        }

        /* On mouse-over, add a deeper shadow */
        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        /* Add some padding inside the card container */
        .container {
            padding: 2px 16px;
        }
/*
        body {
            background-image: url("bb.jpg");
            background-color: #cccccc;
            background-size: 100%;
        }
        */
        .inin{
            display: inline-block;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems, options);
        });
    </script>
</head>

<body class = "grey lighten-4">
    <?php echo view('navbar.php');?>
    <br>
    <h2 style="text-align: center;">Uklanjanje korisnika iz sistema</h2>
    <h5 style="text-align:center;color:red"><?php if (isset($errorMsg)) {echo $errorMsg;} ?></h5>
    <br>

        <div class="card" style="margin-left: 25%;display: inline-block; ">
            <p class="darkGreen">Unesite <b>korisničko ime korisnika</b> kojeg želite da uklonite iz sistema</p>
            <div class="row">
                <form class="col s12" id="usernameForm" name="usernameForm" action="<?php site_url("Admin/showRemoveUsers") ?>" method="post">
                    <div class="row" style="margin-left: 33%;">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">account_circle</i>
                            <input type="text" class="validate" id="usernameInput" name="user">
                            <label for="usernameInput">Korisničko ime</label>
                        </div>
                    </div>
                </form>
                
            </div>
            
            <!-- Modal Trigger -->
            <a style="vertical-align: middle; margin-left: 45%;margin-bottom: 5%;" class="waves-effect waves-light btn modal-trigger" id="usernameButton" disabled
                >Ukloni</a>

            <!-- Modal Structure -->
            <div id="modal1" class="modal">
                <div class="modal-content grey lighten-4" >
                    <h4 class = "center">Podaci o korisniku</h4>
                    <?php
                        if (isset($user)) { 
                            echo "<p>Ime: $user->name</p>";
                            echo "<p>Prezime: $user->surname</p>";
                            echo "<p>Email: $user->email</p>";
                        }
                    ?>
                </div>
                <div class="modal-footer cyan darken-3">
                    <a class="btn waves-effect waves-ripple  modal-close left">Otkaži</a>
                    <a class="btn waves-effect waves-ripple  modal-trigger" href='<?php
                        if (isset($user)) {
                            $href = site_url('Admin/removeUser/'.$user->idUser);
                            echo $href; 
                        }
                     ?>'>Potvrdi</a>
                   
                </div>
            </div>
            <script>
                M.AutoInit();
            </script>
            
        </div>

        <br>
        <div class="card" style="margin-left: 25%;">
            <p class="darkGreen" style = "padding-top: 3%;">Unesite <b>JMBG privatnog izdavača </b> kojeg žlite da uklonite iz sistema</p>
            <div class="row">
                <form class="col s12" id="jmbgForm" name="jmbgForm" action="<?php site_url("Admin/showRemoveUsers") ?>" method="post">
                    <div class="row" style="margin-left: 33%;">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">supervisor_account</i>
                            <input type="text" class="validate" id="jmbgInput" name="jmbg">
                            <label for="jmbgInput">JMBG</label>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Modal Trigger -->
            <a style="vertical-align: middle; margin-left: 45%;margin-bottom: 5%;" class="waves-effect waves-light btn modal-trigger" id="jmbgButton" disabled
               >Ukloni</a>

            <!-- Modal Structure -->
            <div id="modal2" class="modal">
                <div class="modal-content grey lighten-4" >
                    <h4 class = "center">Podaci o korisniku</h4>
                    <<?php
                        if (isset($private)) { 
                            echo "<p>Ime: $private->name</p>";
                            echo "<p>Prezime: $private->surname</p>";
                            echo "<p>Broj telefona: $private->phone</p>";
                            echo "<p>Email: $private->email</p>";
                        }
                    ?>
                </div>
                <div class="modal-footer cyan darken-3">
                    <a class="btn waves-effect waves-ripple  modal-close left">Otkaži</a>
                    <a class="btn waves-effect waves-ripple  modal-trigger" href='<?php
                        if (isset($private)) {
                            $href = site_url('Admin/removeUser/'.$private->idUser);
                            echo $href; 
                        }
                     ?>'>Potvrdi</a>
                </div>
            </div>
            <script>
                M.AutoInit();
            </script>
        </div>>
        <br>
        <div class="card" style="margin-left: 25%;">
            <p class="darkGreen" style = "padding-top: 3%;">Unesite <b>PIB turističke agencije </b> koju želite da uklonite iz sistema</p>
            <div class="row">

                <form class="col s12" id="pibForm" name="pibForm" action="<?php site_url("Admin/showRemoveUsers") ?>" method="post">
                    <div class="row" style="margin-left: 33%;">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">work</i>
                            <input type="text" class="validate" id="pibInput" name="pib">
                            <label for="pibInput">PIB</label>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Modal Trigger -->
            <a style="vertical-align: middle; margin-left: 45%;margin-bottom: 5%;" class="waves-effect waves-light btn modal-trigger" id="pibButton" disabled
              >Ukloni</a>

            <!-- Modal Structure -->
            <div id="modal3" class="modal">
                <div class="modal-content grey lighten-4" >
                    <h4 class = "center">Podaci o turističkoj agenciji</h4>
                    <?php
                        if (isset($agency)) { 
                            echo "<p>Naziv agencije: $agency->name</p>";
                            echo "<p>Ime i prezime vlasnika: $agency->surname</p>";
                            echo "<p>Lokacija: $agency->location</p>";
                            echo "<p>Broj telefona: $agency->phone</p>";
                            echo "<p>Email: $agency->email</p>";
                        }
                    ?>
                </div>
                <div class="modal-footer cyan darken-3">
                    <a class="btn waves-effect waves-ripple  modal-close left">Otkaži</a>
                    <a class="btn waves-effect waves-ripple  modal-trigger" id="deletePibButton" href='<?php
                        if (isset($agency)) {
                            $href = site_url('Admin/removeUser/'.$agency->idUser);
                            echo $href; 
                        }
                     ?>'>Potvrdi</a>
                </div>
            </div>
</body>
        <script>
           M.AutoInit();
            <?php 
            if (isset($agency)) {
                echo "M.Modal.getInstance(document.getElementById('modal3')).open();";
            }
            if (isset($private)) {
                echo "M.Modal.getInstance(document.getElementById('modal2')).open();";
            }
            if (isset($user)) {
                echo " M.Modal.getInstance(document.getElementById('modal1')).open();";
            }
            ?>
        
        </script>
<script>

    function isJMBGValid(jmbg) {
        let regex = /^[0-9]{13}$/;
        return regex.test(jmbg);
    }

    function isPIBValid(pib) {
        let regex = /^[0-9]{9}$/;
        return regex.test(pib);
    }

    $(document).ready(function() {
        $("#jmbgInput").keyup(function() {
            if (!isJMBGValid($(this).val())) {
                $("#jmbgButton").attr("disabled","disabled");
            }
            else {

                $("#jmbgButton").removeAttr("disabled");
            }
        })
        $("#usernameInput").keyup(function() {
            if ($("#usernameInput").val().length>0) {
                $("#usernameButton").removeAttr("disabled");
            }
            else {
                $("#usernameButton").attr("disabled","disabled");
            }
        })
        $("#pibInput").keyup(function() {
            if (!isPIBValid($(this).val())) {
                $("#pibButton").attr("disabled","disabled");
            }
            else {
                $("#pibButton").removeAttr("disabled");
            }
        })


        $("#pibButton").click(function() {
            document.forms['pibForm'].submit();
        })

        $("#jmbgButton").click(function() {
            document.forms['jmbgForm'].submit();
        })

        $("#usernameButton").click(function() {
            document.forms['usernameForm'].submit();
        })
        
    })
</script>



</html>