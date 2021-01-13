<main class="container col-9">
    <link rel="stylesheet" href="./assets/css/style-catalogue.css">
    <div class="container-fluid carousel-container">
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
    
    <div class="container flex flex-between card-container">
        <!-- <div class="row flex flex-between">
            <div class="col-sm col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="./assets/img/caraibes_martinique_boucaniers.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Les Boucaniers</h5>
                      <p class="card-text danger">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="?page=reservation" class="btn btn-outline-info col-12">Réserver maintenant !</a>
                    </div>
                  </div>
            </div>

              <div class="col-sm col-md-4">
                  <div class="card" style="width: 18rem;">
                    <img src="./assets/img/maurice_albion.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Kamarina</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="?page=reservation" class="btn btn-outline-info col-12">Réserver maintenant !</a>
                    </div>
                  </div>
              </div>

              <div class="col-sm col-md-4">
                  <div class="card" style="width: 18rem;">
                    <img src="./assets/img/maurice_albion.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Finohlu</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-outline-info col-12">Réserver maintenant !</a>
                    </div>
                  </div>
              </div>

              <div class="col-sm col-md-4">
                  <div class="card" style="width: 18rem;">
                    <img src="./assets/img/sicile_kamarina.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Albion sauvage</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-outline-info col-12">Réserver maintenant !</a>
                    </div>
                  </div>
              </div>

              <div class="col-sm col-md-4">
                  <div class="card" style="width: 18rem;">
                    <img src="./assets/img/caraibes_martinique_boucaniers.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Kani</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-outline-info col-12">Réserver maintenant !</a>
                    </div>
                  </div>
              </div>

              <div class="col-sm col-md-4">
                  <div class="card" style="width: 18rem;">
                    <img src="./assets/img/turkoise.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Gregolimano</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-outline-info col-12">Réserver maintenant !</a>
                    </div>
                  </div>
              </div>
        </div> -->
        <?php 
            $sql = 'SELECT * FROM `tbl_travels` ';
            $result = $mysqli->query($sql);
    
            if($result->num_rows > 0){
              $travels = $result->fetch_all(MYSQLI_ASSOC);
            
              foreach ($travels as $travel) {
                  echo '
                      <div class="col-sm col-md-4">
                        <div class="card" style="width: 18rem;">
                          <img src="'.$travel['image'].'" class="card-img-top" alt="'.$travel['title'].'">
                          <div class="card-body">
                            <h5 class="card-title">'.$travel['title'].'</h5>
                            <p class="card-text">'.$travel['description'].'</p>
                            <a href="?page=reservation&id_travel='.$travel['id_travel'].'" class="btn btn-outline-info col-12">Réserver maintenant !</a>
                          </div>
                        </div>
                      </div>
                  ';
              }
            }
        ?>

    </div>
</main>



<!-- https://ipfs.infura.io/ipfs/QmTmGJxc8yt4Cd5vp2QrzrahngPu4E3ViE99Jm1T994yfL-->