<?php
$mysqli = new mysqli("localhost", "root", "", "cookielogin");
session_start();

if (isset($_SESSION) && isset($_SESSION['username'])) {
     # code...
     var_dump($_SESSION);

     // header('Location: index.php');
}else {
     // var_dump($_SESSION);

     $trimedData = TrimedDataPost($_POST);
     // var_dump($trimedData);

     if (is_array($trimedData) && count($trimedData) > 0) {

          
          //var_dump($trimedData);
          if (isset($trimedData['username']) && isset($trimedData['password'])) {
               # code...
               $sql = 'SELECT * FROM users WHERE username = "'. $trimedData['username'] .'"';
               //'. $trimedData['username'] .'
               $result = $mysqli->query($sql);
               // var_dump($result);

               if($result->num_rows > 0){
                    
                    $user = $result->fetch_assoc();

                    $BmdpBdd = password_hash($user['password'], PASSWORD_BCRYPT);
                    $Bmdp = password_hash($trimedData['password'], PASSWORD_BCRYPT);
                    echo '<p> Mot de pass BCRYPT : '. $BmdpBdd . ' et ' . $Bmdp . '</p>';

                    $mdpBdd = $user['password'];
                    $mdp = sha1($trimedData['password']);

                    echo '<p> Mot de pass SHA1 : '. $mdpBdd . ' et ' . $mdp . '</p>';

                    if ($mdpBdd === $mdp) {
                         # code...
                         $_SESSION['username'] = $trimedData['username'];
                         header('Location: index.php');
          
                    }else echo '<br>mot de passe incorrect';

               }else echo '<br>Login incorrect';

          }

     }
}

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
                    <!-- <li class="nav-item">
                         <a class="nav-link" href="./logout.php">Se déconnter</a>
                    </li> -->
                    <!-- <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown
                         </a> 
                         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Something else here</a>
                         </div>
                    </li> -->

               </ul>
          </div>
     </div>
     <!-- End .container -->
     </nav>
     <!-- End Navbar -->

     <section>
          <div class="row">
               <div class="container col-9">
                    <h2>Se connecter</h2>

                    <form method="post">

                         <div class="form-group">
                              <label for="username">Username :</label>
                              <input type="text" name="username" class="form-control" id="username" placeholder="Nom.jpp" value="">   
                         </div>

                         <div class="form-group">
                              <label for="password">Mot de pass :</label>
                              <input type="password" name="password" class="form-control" id="password" value="">   
                         </div>

                         <button type="submit" class="btn btn-info">Se connecter</button>
                    </form>

               </div>
          </div>        
     </section>

     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"> </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"> </script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"> </script>
</body>
</html>