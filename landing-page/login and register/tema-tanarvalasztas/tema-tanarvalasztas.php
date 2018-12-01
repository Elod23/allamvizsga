<!DOCTYPE html>
  <?php
    session_start();
  ?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Téma és Vezetőtanár választás</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/logo-nav.css" rel="stylesheet">
  <style type="text/css">
  table {
    font-family: "Lato","sans-serif";   }       /* added custom font-family  */
    table.one {                                 
      margin-bottom: 3em;
      border-collapse:collapse;   }  
      td {                            /* removed the border from the table data rows  */
        text-align: center;    
        width: 10em;                   
        padding: 1em;       }      
        th {                              /* removed the border from the table heading row  */
          text-align: center;                
          padding: 1em;
          background-color: #9a8262;       /* added a red background color to the heading cells  */
          color: white;       }                 /* added a white font color to the heading text */
          tr {   
            height: 1em;    }
            table tr:nth-child(even) {            /* added all even rows a #eee color  */
              background-color: #eee;     }
              table tr:nth-child(odd) {            /* added all odd rows a #fff color  */
                background-color:#fff;      }
              </style>

            </head>

            <body>

              <!-- Navigation -->
              <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                <div class="container">
                  <a class="navbar-brand" href="#">
                    <img src="http://placehold.it/300x60?text=Logo" width="150" height="30" alt="">
                  </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item active">
                        <a class="nav-link" href="#">Főoldal
                          <span class="sr-only">(current)</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Rólunk</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Határidők</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Kapcsolat</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>

              <!-- Page Content -->
              <div class="container">
                <h1 class="mt-5">UBB FSEGA</h1>
                <p>Kérem vagy válasszon a kihirdetett témák közül, vagy írja be saját témáját, majd válassza ki kivel szeretné államvizsgáját írni!</p>
              </div>
              <!-- /.container -->
              <!-- php script -->
            <div class="container">
              <?php
              require('C:\xampp\htdocs\projekt-allamvizsga\landing-page\db.php');

              if (isset($_POST['email'])) {
                $check_query = "SELECT ID FROM HALLGATO WHERE EMAIL='".$_POST['email']."'";
                $_SESSION['mail'] = $_POST['email'];
                
                $result_1 = mysqli_query($conn, $check_query);
                $num_results = mysqli_num_rows($result_1);
                if ($num_results == 0) {
                  $query = "INSERT INTO HALLGATO(CNP, Beiratkozasi_szam, Csaladnev, Keresztnev, Email, Jelszo) VALUES ('".$_POST['CNP']."','".$_POST['beiratkozasi_szam']."','".$_POST['csaladnev']."','".$_POST['keresztnev']."','".$_POST['email']."','".sha1($_POST['password'])."')";

                  $result = mysqli_query($conn, $query);

                  if ($result) {
                    $msg = "Ön sikeresen regisztrált ".$_POST['email']." emailcímmel!";
                    echo "<script type='text/javascript'>alert('".$msg."');</script>";
                  }else {
                    $msg = "Egy hiba lépett fel rendszerünkben, kérem próbálkozzon újra később!";
                    echo "<script type='text/javascript'>alert('".$msg."');</script>";
                  }
                }
            } 
            ?>
            <table border="1px" align="center">
              <th>Sorszám</th>
              <th>Cím</th>
              <th>Kategória</th>
              <th>Vezető Tanár:</th>
              <?php
              $query = "select TemaID, Cim, Kategoria,Tanar.Vezeteknev, Tanar.Keresztnev from Tema inner join Tanar on (Tema.TanarID = Tanar.TanarID)";
              $result = mysqli_query($conn, $query);

              if ($result->num_rows >0) {
      //szetbontjuk
                while($row=$result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>".$row['TemaID']."</td>";
                  echo "<td>".$row['Cim']."</td>";
                  echo "<td>".$row['Kategoria']."</td>";
                  echo "<td>".$row['Vezeteknev'].' '.$row['Keresztnev']."</td>";
                  echo "</tr>";
                }
              }else{
                echo "Jelenleg nem erheto el egy tema sem!";
              }
              ?>  
            </table>
          </div>

          <div class="container">
            <h4>Kérem válassza ki tanárát, majd írja be a kidolgozni szánt téma címét(lehet saját is, a fenti címek orientatívak)</h4>
            <form class="form-horizontal" method="post" action="../login.php" id="tanarform">

              <div class="form-group">
                <label for="tema" class="cols-sm-2 control-label">Téma</label>
                <div class="cols-sm-10">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="tema" id="tema"  placeholder="Téma ide..." required />
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="tanar" class="cols-sm-2 control-label">Vezető Tanár</label>
                <div class="cols-sm-10">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>

                      <?php

                        $query_teachers = "Select TanarID,Vezeteknev, Keresztnev from Tanar";
                        $result_teacher = mysqli_query($conn, $query_teachers);
                        echo "<select name='dropdown' form='tanarform'>";
                        //szetbontas majd osszeragasztas a dropdownhoz
                        while ($row = mysqli_fetch_array($result_teacher)) {
                          echo "<option value='".$row['TanarID']."'>".$row['Vezeteknev'].' '.$row['Keresztnev']."</option>";
                        }
                        echo "</select>";
                        ?>
                  </div>
                </div>
              </div>
              
              <div class="form-group ">
                <button type="submit" class="btn btn-primary btn-lg btn-block login-button" >Mehet</button>
              </div>
            </form>
          
          </div>

          <!-- Bootstrap core JavaScript -->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>