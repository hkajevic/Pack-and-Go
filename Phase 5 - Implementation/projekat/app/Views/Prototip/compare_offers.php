<!DOCTYPE html>
<html lang="en">

<!--Ivona Stojanovic-->

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->

    <!-- Compiled and minified JavaScript -->

    <link href="http://localhost/projekat/css/fontovi.css">
    <link href="http://localhost/projekat/css/registration.css" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/projekat/css/commom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pack & Go</title>
    <script src="https://kit.fontawesome.com/063f419900.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

    <style>
        th,
        td {
            text-align: center;
        }

        i {
            margin-left: 5%;
            color: #f9a825;
        }

        
    </style>
</head>

<body style="background-color:#EDE7E3;">
    <?php echo view('navbar.php');?>
    <div class="container">


        <div class="card class">
            <h1 class="center" style="padding-top: 3%;padding-bottom: 2%;">Uporedite dve ponude</h1>
            <?php 
                if (isset($poruka)) {
                    echo "<div class='row'><div class='col s12'><h5 class=' center-align red-text'>$poruka</h5></div></div>";
                } 
            ?>
            
            <form  name="compareForm" action="<?= site_url('UserController/compare') ?>" method="post">
           
            
            <div class='row'>
            <div class='col s6 '>
                <h5 class=' center-align' style="width: 60%; margin-left: auto; margin-right: auto;" >
                    
                    <div class="input-field">
                        <input type="text" class="validate" id="prvaPonuda" name = "prvaPonuda">
                        <label
                            for="prvaPonuda" style="font-size: 22px;">ID prve ponude:
                        </label>
                    </div> 
                </h5>
            </div>
            
                <div class='col s6 ' >
                    <h5 class='center-align' style="width: 60% ; margin-left: auto; margin-right: auto;">
                        
                      <span class="input-field"><input type="text" class="validate" id="drugaPonuda" name = "drugaPonuda">
                            <label
                                for="drugaPonuda"  style="font-size: 22px;">ID druge ponude:
                            </label>
                        </span>
                    </h5>
                </div>
            </div>
            <div class='row'><div class='col s12'><h5 class=' center-align red-text'><a href = "#" style="text-align: center;"><button class="btn waves-effect waves-light"  type="submit"
                        name="action" >Prikazi
                         </button></a></h5></div></div>

               
                        
                </form>
                <table>
            <?php 

                use App\Models\OfferModel;

                $offerModel = new OfferModel();

                $prve = isset($prvaPonuda)?$prvaPonuda:null;
                $druge = isset($drugaPonuda)?$drugaPonuda:null;
                
                if (isset($prvaPonuda)) {
                    $prva = $prve[0];
                $druga = $druge[0];
                    echo '
                    <tr>
                    <td>Izdavac <i class="material-icons prefix left">card_travel</i></td>
                    <td>'.$prva->vlasnik.'</td>
                    <td>'.$druga->vlasnik.'</td>

                </tr>
                <tr>
                    <td>Naslov <i class="material-icons prefix left">title</i></td>
                    <td>'.$prva->title.'</td>
                    <td>'.$druga->title.'</td>

                </tr>
                <tr>
                    <td>Cena <i class="material-icons prefix left">euro_symbol</i></td>
                    <td>'.$prva->price.'</td>
                    <td>'.$druga->price.'
                    </td>

                </tr>
                <tr>
                    <td>Lokacija<i class="material-icons prefix left">add_location
                        </i>
                    <td>'.$prva->location.'</td>
                    <td>'.$druga->location.'</td>

                </tr>
                <tr>
                    <td>Telefon<i class="material-icons prefix left">phone
                        </i>
                    <td>'.$prva->phone.'</td>
                    <td>'.$druga->phone.'</td>

                </tr>
                <tr>
                    <td>Pocetak
                        <i class="material-icons prefix left">date_range</i>
                    </td>
                    <td>'.$prva->startDate.'</td>
                    <td>'.$druga->startDate.'</td>
                    </td>

                </tr>
                <tr>
                    <td>Kraj
                        <i class="material-icons prefix left">date_range</i>
                    </td>
                    <td>'.$prva->endDate.'</td>
                    <td>'.$druga->endDate.'</td>
                    </td>

                </tr>
                <tr>
                    <td>Prevoz
                        <i class="material-icons prefix left">directions_transit
                        </i>
                    </td>
                    <td>'.$prva->transport.'</td>
                    <td>'.$druga->transport.'</td>

                </tr>
                <tr>
                    <td>Smestaj
                        <i class="material-icons prefix left">hotel
                        </i>
                    </td>
                    <td>'.$prva->accomodation.'</td>
                    <td>'.$druga->accomodation.'</td>

                </tr>
                <tr>
                    <td>Kategorija
                        <i class="material-icons prefix left">home
                        </i>
                    </td>
                    <td>'.$prva->category.'</td>
                    <td>'.$druga->category.'</td>

                </tr>
                <tr>
                    
                    <td >All inclusive <i class="material-icons prefix left" style = "color: white;">home
                    </i></td>
                    <td>
                        ';
                        if ($prva->allinclusive) {
                            echo'<i class="material-icons " style = "color: green;">check
                            </i>';
                        }
                        else {
                            echo'<i class="material-icons " style = "color: red;">close
                            </i>';
                        }
                            echo'
                        </td>
                    <td>';
                    if ($druga->allinclusive) {
                        echo'<i class="material-icons " style = "color: green;">check
                        </i>';
                    }
                    else {
                        echo'<i class="material-icons" style = "color: red;">close
                        </i>';
                    }
                    echo'</td>
                </tr>
                <tr>
                    <td>Osiguranje <i class="material-icons prefix left" style = "color: white;">home
                    </i></td>
                    <td>
                    ';
                    if ($prva->insurance) {
                        echo'<i class="material-icons " style = "color: green;">check
                        </i>';
                    }
                    else {
                        echo'<i class="material-icons " style = "color: red;">close
                        </i>';
                    }
                        echo'
                    </td>
                <td>';
                if ($druga->insurance) {
                    echo'<i class="material-icons " style = "color: green;">check
                    </i>';
                }
                else {
                    echo'<i class="material-icons" style = "color: red;">close
                    </i>';
                }
                echo'</td>
                </tr>
                <tr>
                    <td>Vodic <i class="material-icons prefix left" style = "color: white;">home
                    </i></td>
                    <td>
                        ';
                        if ($prva->guide) {
                            echo'<i class="material-icons " style = "color: green;">check
                            </i>';
                        }
                        else {
                            echo'<i class="material-icons " style = "color: red;">close
                            </i>';
                        }
                            echo'
                        </td>
                    <td>';
                    if ($druga->guide) {
                        echo'<i class="material-icons " style = "color: green;">check
                        </i>';
                    }
                    else {
                        echo'<i class="material-icons" style = "color: red;">close
                        </i>';
                    }
                    echo'</td>
                </tr>

                <tr>
                    <td>Dorucak <i class="material-icons prefix left" style = "color: white;">home
                    </i></td>
                    <td>
                        ';
                        if ($prva->breakfast) {
                            echo'<i class="material-icons " style = "color: green;">check
                            </i>';
                        }
                        else {
                            echo'<i class="material-icons " style = "color: red;">close
                            </i>';
                        }
                            echo'
                        </td>
                    <td>';
                    if ($druga->breakfast) {
                        echo'<i class="material-icons " style = "color: green;">check
                        </i>';
                    }
                    else {
                        echo'<i class="material-icons" style = "color: red;">close
                        </i>';
                    }
                    echo'</td>

                </tr>
                <tr>
                    <td>Rucak <i class="material-icons prefix left" style = "color: white;">home
                    </i></td>
                    <td>
                        ';
                        if ($prva->lunch) {
                            echo'<i class="material-icons " style = "color: green;">check
                            </i>';
                        }
                        else {
                            echo'<i class="material-icons " style = "color: red;">close
                            </i>';
                        }
                            echo'
                        </td>
                    <td>';
                    if ($druga->lunch) {
                        echo'<i class="material-icons " style = "color: green;">check
                        </i>';
                    }
                    else {
                        echo'<i class="material-icons" style = "color: red;">close
                        </i>';
                    }
                    echo'</td>
                </tr>
                <tr>
                    <td>Vecera <i class="material-icons prefix left" style = "color: white;">home
                    </i></td>
                    <td>
                        ';
                        if ($prva->dinner) {
                            echo'<i class="material-icons " style = "color: green;">check
                            </i>';
                        }
                        else {
                            echo'<i class="material-icons " style = "color: red;">close
                            </i>';
                        }
                            echo'
                        </td>
                    <td>';
                    if ($druga->dinner) {
                        echo'<i class="material-icons " style = "color: green;">check
                        </i>';
                    }
                    else {
                        echo'<i class="material-icons" style = "color: red;">close
                        </i>';
                    }
                    echo'</td>
                </tr>
                <tr>
                    <td>Izleti <i class="material-icons prefix left" style = "color: white;">home
                    </i></td>
                    <td>
                        ';
                        if ($prva->trips) {
                            echo'<i class="material-icons " style = "color: green;">check
                            </i>';
                        }
                        else {
                            echo'<i class="material-icons " style = "color: red;">close
                            </i>';
                        }
                            echo'
                        </td>
                    <td>';
                    if ($druga->trips) {
                        echo'<i class="material-icons " style = "color: green;">check
                        </i>';
                    }
                    else {
                        echo'<i class="material-icons" style = "color: red;">close
                        </i>';
                    }
                    echo'</td>

                </tr>

                <tr>
                    <td>Internet <i class="material-icons prefix left" style = "color: white;">home
                    </i></td>
                    <td>
                        ';
                        if ($prva->internet) {
                            echo'<i class="material-icons " style = "color: green;">check
                            </i>';
                        }
                        else {
                            echo'<i class="material-icons " style = "color: red;">close
                            </i>';
                        }
                            echo'
                        </td>
                    <td>';
                    if ($druga->internet) {
                        echo'<i class="material-icons " style = "color: green;">check
                        </i>';
                    }
                    else {
                        echo'<i class="material-icons" style = "color: red;">close
                        </i>';
                    }
                    echo'</td>

                </tr>

                <tr>
                    <td>Klima <i class="material-icons prefix left" style = "color: white;">home
                    </i></td>
                    <td>
                        ';
                        if ($prva->AC) {
                            echo'<i class="material-icons  " style = "color: green;">check
                            </i>';
                        }
                        else {
                            echo'<i class="material-icons " style = "color: red;">close
                            </i>';
                        }
                            echo'
                        </td>
                    <td>';
                    if ($druga->AC) {
                        echo'<i class="material-icons " style = "color: green;">check
                        </i>';
                    }
                    else {
                        echo'<i class="material-icons" style = "color: red;">close
                        </i>';
                    }
                    echo'</td>

                </tr>';
                } 
            ?>
                

            </table>

        </div>
    </div>

</body>

</html>
