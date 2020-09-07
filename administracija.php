<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index projekt</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    include 'connect.php';
    define('UPLPATH', 'img/');

    session_start();

    if(isset($_POST['delete'])){
     $id=$_POST['id'];
     $query = "DELETE FROM user WHERE id=$id ";
     $result = mysqli_query($dbc, $query);
    }

    if(isset($_POST['update'])){
      if (isset($_FILES['slika'])) {
              $picture = $_FILES['slika']['name'];
            }else {
              echo "error";
          }
          $naslov= mysqli_real_escape_string($dbc, $_POST['naslov']);
          $sazetak= mysqli_real_escape_string($dbc, $_POST['sazetak']);
          $tekst=mysqli_real_escape_string($dbc, $_POST['tekst']);
          $date=date('d.m.Y.');
          $kategorija=$_POST['kategorija'];
          if(isset($_POST['arhiva'])){
           $archive=1;
          }else{
           $archive=0;
          }
          $target_dir = 'img/'.$picture;
          move_uploaded_file($_FILES["slika"]["tmp_name"], $target_dir);
          $id=$_POST['id'];
          $query = "UPDATE user SET datum='$date', naslov='$naslov', sazetak='$sazetak', tekst='$tekst',
          slika='$picture', kategorija='$kategorija', arhiva='$archive' WHERE id=$id ";
          $result = mysqli_query($dbc, $query);
          if ($result) {
            header ("Location: administracija.php");            // code...
          }
      }

    ?>
    <body>
      <header>
              <div class="left">
                  <div>
                      <a href="#" class="logo">
            franceinfo<span style="color:orange">:</span>
                      </a>
                  </div>
                </div>
        <div class="clear"></div>
        <nav>
          <ul style="float:right;">
              <?php if (isset($_SESSION['username'])) {
                  echo '<li style="float:left; margin-right:50px;" id="lijevi" class="nav-item"><span class="nav-link">' . $_SESSION['username'] . '</span></li>';
                  echo '<li style="float:left;" id="desni" class="nav-item"><a href="logout.php" class="nav-link">Odjava</a></li>';
              } else {
                  echo '<li style="float:left; margin-right:50px;" id="lijevi" class="nav-item"><a href="login.php" class="nav-link">Prijava</a></li>';
                  echo '<li style="float:left;" id="desni" class="nav-item"><a href="registracija.php" class="nav-link">Registracija</a></li>';
              } ?>
          </ul>

   </div>
              <div class="clear"></div>
        </nav>
      </header>
    <hr>
    <nav>
                  <ul>
                    <li><a href="index.php">Početna</a></li>
                    <li><a href="kategorija.php?id=kultura">Kultura</a></li>
                    <li><a href="kategorija.php?id=politika">Politika</a></li>
                    <li><a href="administracija.php">Administracija</a></li>
                    <li><a href="unos.php">Unos</a></li>
                  </ul>
          <div class="clear"></div>
    </nav>
    <hr class="hr">

    <section class="admin">
                    <?php
                    if ((isset($_SESSION['username'])) && $_SESSION['level'] == 1) {

                      echo '<h4 class="naslov" style="text-align: center;">';
                      echo 'Izmjena vijesti';
                      echo '</h4>';

                        $query = "SELECT * FROM user";
                        $result = mysqli_query($dbc, $query);
                        while($row = mysqli_fetch_array($result)) {

                         echo '
                         <div class="forma"> <form enctype="multipart/form-data" action="" method="POST">
                         <br><br>
                             <div class="form-group">
                                 <label for="naslov">Naslov vijesti:</label>
                                 <input type="text" name="naslov" class="form-control" value="'.$row['naslov'].'">
                             </div>

                             <div class="form-group">
                               <label for="sazetak">Kratak sadržaj vijesti (do 50 znakova):</label>
                               <textarea name="sazetak" id=""  rows="3" class="form-control">'.$row['sazetak'].'</textarea>
                            </div>

                            <div class="form-group">
                               <label for="tekst">Sadržaj vijesti</label>
                               <textarea name="tekst" id="" rows="10" class="form-control">'.$row['tekst'].'</textarea>
                            </div>

                            <div class="form-group">
                                <label for="slika">Slika:</label>
                                <input type="file" class="form-control" id="slika" value="'.$row['slika'].'" name="slika"/>
                                <br><img src="' . UPLPATH . $row['slika'] . '" width=100px>
                            </div>

                            <div class="form-group">
                               <label for="kategorija">Kategorija vijesti:</label>
                               <select name="kategorija" id="" class="form-control" value="'.$row['kategorija'].'">
                               <option value="kultura">Kultura</option>
                               <option value="politika">Politika</option>
                               </select>
                          </div>

                          <div class="form-group">
                               <label>Spremiti u arhivu:</label> ';
                               if($row['arhiva'] == 0) {
                               echo '<input type="checkbox" name="arhiva" id="arhiva"/>';
                               } else {
                               echo '<input type="checkbox" name="arhiva" id="arhiva"
                              checked/>';
                               }
                               echo '

                         </div>

                         <div class="form-group">
                             <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'">
                             <button type="reset" class="btn btn-light btn-outline-secondary value="Poništi">Poništi</button>
                             <button type="submit" name="update" class="btn btn-light btn-outline-secondary value="Prihvati">Izmijeni</button>
                             <button type="submit" name="delete" class="btn btn-light btn-outline-secondary value="Izbriši"> Izbriši</button>
                         </div>
                         <br><br>
                         </form>
                         </div>';
                        }
                    } else if (isset($_SESSION['username']) && $_SESSION['level'] == 0) {
                        echo '<div class="logout" style="text-align:center;">';
                        echo '<h4 style="color:grey;">Bok ' . $_SESSION['username'] . '! Uspješno ste prijavljeni, ali niste administrator.</h4>';
                        echo '</div>';
                    } else {
                        echo '<div class="logout">';
                        echo '<h4 style="color:grey;">Niste prijavljeni. </h4><br/>';
                        echo '<h4 style="color:grey;">Prijavite se <a href="login.php">OVDJE</a>, ili se registrirajte <a href="registracija.php">OVDJE</a>.</h4>';
                        echo '</div>';
                    }
                    ?>
          </section>
    <footer>
    <p class="col-12">france.tv <br></p>
    <p class="col-12" id="autor">Doris Stanić, dstanic@tvz.hr, 2020. </p>
    </footer>
    <!-- JS link -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
