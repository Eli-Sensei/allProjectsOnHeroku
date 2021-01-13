<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Phoenix</title>
</head>
<body>
    
    <header>
        <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light col-9">
            <a class="navbar-brand" href="?page=accueil"><img src="./assets/img/Logo.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
              
                <a class="nav-link active" href="?page=accueil">Phoenix</a>
                <a class="nav-link" href="?page=catalogue">Choisir une destination</a>
                <a class="nav-link" href="?page=reservation" >Payer</a>
                <?php 
                if (isset($_SESSION)  ){

                    echo '<a class="nav-link" href="?page=logout" >Se deconnecter</a>';
  
                  }else echo '<a class="nav-link" href="?page=login" >Se connecter</a>';
                
                ?>

                
              </div>
            </div>
          </nav>
    </header>
