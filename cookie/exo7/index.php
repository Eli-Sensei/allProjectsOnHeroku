<?php
session_start();
if (isset($_SESSION) && !isset($_SESSION['username'])) {
     # code...
     // var_dump($_SESSION);

     header('Location: login.php');
}else if (isset($_SESSION['visitedPageCounter'])) {
     # code...
     $_SESSION['visitedPageCounter'] += 0.5;
}

// connection a la bdd
$mybdd = new mysqli('localhost', 'root', '', 'cookielogin');
$sql = 'SELECT * FROM `command`';
if ($result = $mybdd->query($sql)) {
     # Recuperation des commandes
     $AllCommands = $result->fetch_all(MYSQLI_ASSOC);
     
     if (!isset($_SESSION["panier"])) {
          # si panier existe pas
          $_SESSION['panier'] = [];
          foreach ($AllCommands as $key => $value) {
               # on l'initialise
               $_SESSION["panier"][$value['command_name']] = 0;
          }
          $_SESSION['panier']['total_products'] = 0;
     }
}

// avoir le total de produits
$total_products = 0;
foreach ($_SESSION['panier'] as $key => $value) {
     # code...*
     if($key !== "total_products"){

          $total_products += $value;
          // echo $key . ' => ' . $value . ' ' . '<br>';
     }
}
$_SESSION['panier']['total_products'] = $total_products;


function TrimedDataPost($formdata){
     $trimedData = [];
     foreach ($formdata as $key => $value) {
         if(empty(trim($value))){
             return false;
         }
         $trimedData[$key] = trim($value);
     }
     return $trimedData;
}

// Ajout des produits
$trimedData = TrimedDataPost($_POST);
if (is_array($trimedData) && count($trimedData) > 0) {
     // var_dump($trimedData);
     // echo 'post';
     foreach ($trimedData as $key => $value) {
          # ICI TU CHANGE KEY EN TABLEAU POUR QU'IL RECUPERE TOUTE LES COLONES DE LA TABLE, (parce que la tu galere avec tes doubles foreach ;D )
          $_SESSION["panier"][$key] += $value;
          $_SESSION['panier']['total_products'] += $value;
     }
     header('Location: index.php');
     // var_dump($_SESSION['panier']);
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Phoenix Holidays</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
     <link rel="stylesheet" href="#">

     <style>
          html{position: relative; min-height: 100%;}
          body{margin-bottom: 6vh; /* Margin bottom by footer height */}
          .choisir {margin-top: 5vh; margin-bottom: 5vh;}
          .with-nav { margin-top: 10vh;}
          .footer{position: absolute; /*bottom: 0; */ width: 100%; height: 60px; /* Set the fixed height of the footer here */ line-height: 60px; /* Vertically center the text there */ background-color: #75c9c8; font-size: 1.373em;}
               /*END Sticky footer specific style*/
               /*margin bottom for the header*/
          /*header{margin-bottom: 10vh; }*/
          .container-fluid { padding-left: 0; padding-right: 0;}
          /*END argin bottom for the nav*/
          .carousel100 {max-height: 80vh;}
          .carousel10 {max-height: 30vh;}
          .row {margin-top: 6vh; margin-bottom: 6vh;}
          .card-img-top {max-height: 13.5vh;}
          form > div.row {margin-top: 0vh; margin-bottom: 2vh;}
          #confirmer > .row{margin-top: 0vh; margin-bottom: 1.65vh;}
          .img-thumbnail {height: 10vh; }
          .row.card-deck {margin-bottom: 3.4vh;}
          .blockquote-footer {font-size: 48%; text-align: right;}
          .no-margin {margin-left: 0; margin-right: 0;}
     </style>
</head>
<body>
     
     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #75c9c8;">

        <div class="container">
               
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    
                         <li class="nav-item active">
                              <a class="nav-link" href="./index.php">Phoenix <span class="sr-only">(current)</span></a>
                         </li>
                    
                         <li class="nav-item">
                              <a class="nav-link" href="./panier.php"><i class="fas fa-cart-arrow-down"></i> (<?php echo $_SESSION['panier']['total_products'] ?>)</a>
                         </li>
                         

                    </ul>
               </div>
          </div>
          <!-- End .container -->
     </nav>
     <!-- End Navbar -->

     <section>
          <div class="row no-margin">
               <div class="container">
                    <h2>Accueil</h2>

                    <div class="row">
                         
     
                         <?php
                              
                              foreach ($AllCommands as $key => $value) {
                                   # Faire pop toutes les commandes
     
                                   echo '
                                   <div class="col-3">
                                        <div class="card border-info">
                                             <div class="card-body">
                                                  <h4 class="card-title">'.ucfirst($value['command_name']).'</h4>
                                                  <p class="card-text">Prix : '.$value['command_price'].'&euro; / kg</p>
                                                  <form method="post">
                                                       <div class="form-group">
                                                            <label for="'.$value['id_command'].'">Combien ?</label>
                                                            <input type="number" name="'.$value['command_name'].'" class="form-control" id="'.$value['id_command'].'" min="1">
                                                       </div>
                                                       <input type="submit" class="btn btn-info" value="Ajouter au panier">
                                                  </form>
                                             </div>
                                        </div>
                                   </div>
                                   ';
                              }
                              
                              
                         ?>
                    </div>     
               </div>
          </div>        
     </section>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"> </script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"> </script>
</body>
</html>