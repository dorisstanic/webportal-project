<!DOCTYPE html>
<html lang="en">

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
  $kategorija = $_GET['id'];
  ?>
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

  <section>




    <div class="container-fluid">
      <h4 class="col-3 kategorija">
        <?php echo $kategorija; ?>
     </h4>

          <div >

          <?php
          $query = "SELECT * FROM user WHERE arhiva=0 AND kategorija='$kategorija' ORDER BY datum ASC";
          $result = mysqli_query($dbc, $query);
           $i=0;
           if (!$result) {
               printf("Error: %s\n", mysqli_error($dbc));
               exit();
           }
           while($row = mysqli_fetch_array($result)) {
             echo "<br>";
             echo '<div class="row">';
             echo '<div style="text-align: center;" class="col-sm-12">';
             echo '<a href="clanak.php? id='.$row['id'].'& kategorija='.$row['kategorija'].'  ">';
             echo '<img width="70%" src="' . UPLPATH . $row['slika'] . '" />';
             echo '</a>';
             echo '<h1 class="vijesth1"><a href="clanak.php?id='.$row['id'].'&kategorija='.$row['kategorija'].'">';
             echo $row['naslov'];
             echo '</a></h1>';
             echo '<h6>'. $row['sazetak'] . '</h6><br>';
             echo '</div>';
             echo '</div>';
             echo "<br><hr>";
          }?>

            <div class="clear"></div>
        </div>
    </div>


  </section>

	<footer>
	<p class="col-12">france.tv <br></p>
  <p class="col-12" id="autor">Doris Stanić, dstanic@tvz.hr, 2020. </p>
	</footer>
</body>

</html>
