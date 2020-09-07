
<!DOCTYPE html>
<html>
<head lang="en">
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
      <nav class="ul" >
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
    <form  enctype="multipart/form-data" action="skripta.php" method="post">

        <div class="form-group">
            <label for="naslov">Naslov vijesti</label>
            <input type="text" name="naslov" class="form-control" id="naslov">
            <span id="porukaNaslov" class="error"></span>
        </div>

        <div class="form-group">
            <label for="sazetak">Kratak sadržaj vijesti (do 50 znakova)</label>
            <textarea class="form-control" name="sazetak" id="sazetak" rows="3"></textarea>
            <span id="porukaSazetak" class="error"></span>
        </div>

        <div class="form-group">
            <label for="tekst">Sadržaj vijesti</label>
            <textarea class="form-control" name="tekst" id="tekst" rows="10"></textarea>
            <span id="porukaTekst" class="error"></span>
        </div>

          <div class="form-group">
           <label for="kategorija">Kategorija vijesti</label>
               <select name="kategorija" id="kategorija" class="form-control">
                 <option value="" disabled selected>Odabir kategorije</option>
                 <option value="kultura">Kultura</option>
                 <option value="politika">Politika</option>
               </select>
            <span id="porukaKategorija" class="error"></span>
         </div>

         <div class="form-group">
           <label for="slika">Slika </label>
           <input type="file" accept="image/jpg,image/gif" class="form-control" name="slika" id="slika"/>
           <span id="porukaSlika" class="error"></span>
        </div>

        <div class="form-group">
       <label for="arhiva">Spremiti u arhivu  </label>
       <input type="checkbox" name="arhiva" id="arhiva">
       </div>

       <div class="form-group">
        <button type="reset" name="ponisti" class="btn btn-light btn-outline-secondary  mt-3" value="Poništi">Poništi</button>
        <button type="submit" name="Prihvati" class="btn btn-light btn-outline-secondary mt-3" value="Prihvati" id="slanje">Prihvati</button>
      </div>


    </form>

    <script type = "text/javascript">
        document.getElementById("slanje").onclick = function(event) {
        var slanje_forme = true;



        var poljeNaslov = document.getElementById("naslov");
        var naslov = document.getElementById("naslov").value;
        var porukaNaslov = document.getElementById("porukaNaslov").value;
        if (naslov.length<5 || naslov.length > 30)  {
            slanje_forme = false;
            poljeNaslov.style.border ="1px dashed red";
            document.getElementById("porukaNaslov").innerHTML = "Naslov vijesti mora imati između 3 i 30 znakova!<br>";
        } else {
          poljeNaslov.style.border="1px solid green";
          porukaNaslov.style.color="red";
          document.getElementById("porukaNaslov").innerHTML="";
        }

        var poljeSazetak = document.getElementById("sazetak");
        var sazetak = document.getElementById("sazetak").value;
        if (sazetak.length < 10 || sazetak.length > 100) {
         slanje_forme = false;
         poljeSazetak.style.border="1px dashed red";
         document.getElementById("porukaSazetak").innerHTML="Kratak sadržaj mora imati između 10 i 100 znakova!<br>";
         } else {
         poljeSazetak.style.border="1px solid green";
         document.getElementById("porukaSazetak").innerHTML="";
         }

         var poljeTekst = document.getElementById("tekst");
         var tekst = document.getElementById("tekst").value;
         if (tekst.length == 0) {
         slanje_forme = false;
         poljeTekst.style.border="1px dashed red";
         document.getElementById("porukaTekst").innerHTML="Sadržaj mora biti unesen!<br>";
         } else {
         poljeTekst.style.border="1px solid green";
         document.getElementById("porukaTekst").innerHTML="";
         }

         var poljeSlika = document.getElementById("slika");
         var slika = document.getElementById("slika").value;
         if (slika.length == 0) {
         slanje_forme = false;
         poljeSlika.style.border="1px dashed red";
         document.getElementById("porukaSlika").innerHTML="Slika mora biti odabrana!<br>";
         } else {
         poljeSlika.style.border="1px solid green";
         document.getElementById("porukaSlika").innerHTML="";
         }

         var poljeKategorija = document.getElementById("kategorija");
         if(document.getElementById("kategorija").selectedIndex == 0) {
         slanje_forme = false;
         poljeKategorija.style.border="1px dashed red";

        document.getElementById("porukaKategorija").innerHTML="Kategorija mora biti odabrana!<br>";
         } else {
         poljeKategorija.style.border="1px solid green";
         document.getElementById("porukaKategorija").innerHTML="";
         }


        if (slanje_forme != true) {
            event.preventDefault();
        }

    }
    </script>


	</section>

	<footer>
	<p class="col-12">france.tv</p>
    <p class="col-12" id="autor">Doris Stanić, dstanic@tvz.hr, 2020. </p>
	</footer>



</body>

</html>
