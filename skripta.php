<?php
include 'connect.php';
define('UPLPATH', 'img/');

if (isset($_POST['Prihvati'])) {
    $date=date('d.m.Y.');
    $naslov =   mysqli_real_escape_string($dbc, $_POST['naslov']);
    $sazetak =   mysqli_real_escape_string($dbc, $_POST['sazetak']);
    $tekst =   mysqli_real_escape_string($dbc, $_POST['tekst']);
    $kategorija= $_POST['kategorija'];

    if (isset($_FILES['slika'])) {
        $picture = $_FILES['slika']['name'];
    }else {
      echo "error";
    }
    $arhiva = $_POST['arhiva'];
    if(isset($_POST['arhiva'])){
     $archive=1;
    }else{
     $archive=0;
    }
}

  $destinacijaSlike = 'img/'.$picture;
  move_uploaded_file($_FILES['slika']['tmp_name'], $destinacijaSlike);

  $query = "INSERT INTO user (datum, naslov, sazetak, tekst, slika, kategorija, arhiva ) VALUES ('$date', '$naslov', '$sazetak',
    '$tekst', '$picture','$kategorija', '$archive')";
  $result= mysqli_query($dbc, $query) or die (mysqli_error($dbc));
    mysqli_close($dbc);
  if(move_uploaded_file($_FILES['slika']['tmp_name'], $destinacijaSlike)){
        $poruka = "Image uploaded successfully";
    }
    else {
        $poruka = "There was a problem uploading the picture";
    }


 ?>

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
     <header>
             <div class="left">
                 <div>
                     <a href="#" class="logo">
 					franceinfo<span style="color:orange">:</span>
                     </a>
                 </div>
 			</div>
 			<div class="clear">
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
 				<div class="clear">
 	</nav>
 	<hr class="hr">


<section role="main">
        <section >
    		<h4 class="col-3 kategorija">
    			<?php echo $kategorija; ?>
       </h4>
       </section>

       <section>
    		<h1 class="vijesth1">
    			<?php echo $naslov; ?>
    		</h1>
        </section>

        <section>
          <h6>
            <?php echo $sazetak ?>
          </h6>
        </section>


	<section class="slika">
    <?php echo "<img width='100%' src='img/$picture'/>";   ?>

		</section>


		<section >
			<p class='vijest'>
				<?php echo "<br>";
          echo $tekst ; ?>
			</p>
		</section>

	</section>

 	<footer>
 	<p class="col-12">france.tv</p>
     <p class="col-12" id="autor">Doris Stanić, dstanic@tvz.hr, 2020. </p>
 	</footer>
 </body>

 </html>
