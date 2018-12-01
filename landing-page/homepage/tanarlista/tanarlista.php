<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Vezető Tanárok Listája</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/round-about.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Vezető Tanárok Listája</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Vissza a főoldalra
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://hu.econ.ubbcluj.ro/intezetunkrol">Rólunk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Regisztráció</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://hu.econ.ubbcluj.ro/kapcsolat">Kapcsolat</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Introduction Row -->
      <h1 class="my-4">Tanárlista
        <small>Üdvözlünk, kedvez végzős diák! Itt megtalálhatod az idei témavezető tanárokat!</small>
      </h1>
      <p>Ők azok, akik segíthetnek válod elérésében, megkönnyíthetik utad egy sikeres szakdolgozat felé.</p>

      <!-- Team Members Row -->
      <div class="row">
        <div class="col-lg-12">
          <h2 class="my-4">Tanárok</h2>
        </div>
      <?php
      
        $query = "SELECT * FROM TANAR";
        $conn = mysqli_connect("localhost","root","LeBr0ncav$","projekt_allamvizsga");
        
        if (!$conn) {
          die("Connection failed: ".mysqli_connect_error());
        }

        $result = mysqli_query($conn, $query);
        $count=1;
        while($row = mysqli_fetch_assoc($result)) {
          echo '<div class="col-lg-4 col-sm-6 text-center mb-4">';
          echo '<img class="rounded-circle img-fluid d-block mx-auto" src="'.$row['fenykep'].'" width="200" height="200">';
          echo '<h3>'.$row['Vezeteknev'].' '.$row['Keresztnev'].' <small>'.$row['Fokozat'].'</small></h3>';
          echo '<p>Elérhetőség: '.$row['Beosztas'].', '.$row['Iroda'].', '.$row['Telefonszam'].'</p>';
          echo '</div>';
          $count++;
        }
        ?>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Credits &copy;Államvizsga 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
