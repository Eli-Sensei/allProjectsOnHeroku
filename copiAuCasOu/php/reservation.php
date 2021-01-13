<?php 


  $sql = 'SELECT * FROM `tbl_travels` WHERE `id_travel` = "'.$_GET["id_travel"].'"';
  $result = $mysqli->query($sql);

  // var_dump($result);

  if($result->num_rows === 1){
    $travel = $result->fetch_assoc();
    // var_dump($travel);
  }
        

?>
<main class="container">
    <link rel="stylesheet" href="./assets/css/style-reservation.css">
    <div class="row">
        <div class="col">
            <div class="container carousel-container no-margin">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="./assets/img/caraibes1.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="./assets/img/maldives_fino.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="./assets/img/maldives_kani.jpg" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
            </div>
        </div>
    </div>
    
    <?php

      echo '
      <div class="row">
          <div class="col-3">
              <div class="card r-card" style="width: 18rem;">
                  <img src="'.$travel["image"].'" class="card-img-top" alt="'.$travel["title"].'">
                  <div class="card-body card-padding-footer">
                    <h5 class="card-title">'.$travel["title"].'</h5>
                    <div class="card-footer">
                      1 semaine / personne : '.$travel['price'].'
                    </div>
                  </div>
              </div>
          </div>
          ';
    
    ?>

        <div class="col-1"></div>

        <div class="row col-8">
            <form class="r-form col" action="?page=confirmation" method="get">
              <input style="display: none;" name="page" id="page" value="confirmation">
                <h5>Je complète mes informations de réservations <i class="fab fa-phoenix-framework fa-lg"></i></h5>
                <div class="form-group">
                  <input type="email" class="form-control" id="mail" aria-describedby="emailHelp" name="mail" placeholder="Email de confirmation">
                </div>
                
                <div class="form-group flex flex-between">
                  <input type="text" class="form-control col-6" id="weeks" name="weeks" placeholder="Je pars combien de semaine ?">
                  <input type="text" class="form-control col-5" id="humans" name="humans" placeholder="Nombre de vacanciers">
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-outline-info col" value="Submit">
                </div>
              </form>
        </div>

        <div class="row last-row-r">
          <div class="col-2"><img src="./assets/img/caraibes1.jpg" alt="..." class="img-thumbnail"></div>
          <div class="col-2"><img src="./assets/img/maldives_fino.jpg" alt="..." class="img-thumbnail"></div>
          <div class="col-2"><img src="./assets/img/maldives_fino.jpg" alt="..." class="img-thumbnail"></div>
          <div class="col-2"><img src="./assets/img/maldives_fino.jpg" alt="..." class="img-thumbnail"></div>
          <div class="col-2"><img src="./assets/img/maldives_fino.jpg" alt="..." class="img-thumbnail"></div>
          <div class="col-2"><img src="./assets/img/maldives_fino.jpg" alt="..." class="img-thumbnail"></div>
        </div>
    </div>
</main>