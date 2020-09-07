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
<h5 class="card-title text-center">Registracija</h5>
<form enctype="multipart/form-data" action="redirectRegistracija.php"  method="post">

    <div class="form-group">
        <label for="ime">Ime</label>
        <input class="form-control" type="text" id="ime" name="ime" autocomplete="off">
        <span id="porukaIme" class="error"></span>
    </div>

    <div class="form-group">
        <label for="prezime">Prezime</label>
        <input class="form-control" type="text" id="prezime" name="prezime" autocomplete="off">
        <span id="porukaPrezime" class="error"></span>
    </div>

    <div class="form-group">
        <label for="username">Korisničko ime</label>
        <input class="form-control" type="text" id="username" name="username" autocomplete="off">
        <span id="porukaUsername" class="error"></span>
    </div>

  <div class="form-group">
    <label for="password">Lozinka</label>
    <input class="form-control" type="password" id="password" name="password" autocomplete="off">
    <span id="porukaPassword" class="error"></span>
  </div>

  <div class="form-group">
    <label for="password2">Ponovi lozinku</label>
    <input class="form-control" type="password" id="password2" name="password2" autocomplete="off">
    <span id="porukaPassword2" class="error"></span>
  </div>


  <div class="form-group">
    <button type="submit" id="slanje" class="btn btn-light btn-outline-secondary mt-3" name="slanje">Registracija</button>
      <div id="porukaRegister" style="text-align:center;color:red;"></div>
  </div>
</form>

<script type="text/javascript">
  document.getElementById("slanje").onclick = function(event) {
    var slanje_forme = true;

// Ime korisnika mora biti uneseno
var poljeIme = document.getElementById("ime");
var ime = document.getElementById("ime").value;
if (ime.length == 0) {
slanje_forme = false;
poljeIme.style.border="1px dashed red";
document.getElementById("porukaIme").innerHTML="Unesite ime!";
} else {
poljeIme.style.border="1px solid green";
document.getElementById("porukaIme").innerHTML="";
}
// Prezime korisnika mora biti uneseno
var poljePrezime = document.getElementById("prezime");
var prezime = document.getElementById("prezime").value;
if (prezime.length == 0) {
slanje_forme = false;
poljePrezime.style.border="1px dashed red";
document.getElementById("porukaPrezime").innerHTML="Unesite prezime!";
} else {
poljePrezime.style.border="1px solid green";
document.getElementById("porukaPrezime").innerHTML="";
}

// Korisničko ime mora biti uneseno
var poljeUsername = document.getElementById("username");
var username = document.getElementById("username").value;
if (username.length == 0) {
slanje_forme = false;
poljeUsername.style.border="1px dashed red";
document.getElementById("porukaUsername").innerHTML="Unesite korisničko ime!";
} else {
poljeUsername.style.border="1px solid green";
document.getElementById("porukaUsername").innerHTML="";
}

// Provjera podudaranja lozinki
var poljePassword = document.getElementById("password");
var password = document.getElementById("password").value;
var poljePassword2 = document.getElementById("password2");
var password2 = document.getElementById("password2").value;
if (password.length == 0 || password2.length == 0 || password != password2) {
slanje_forme = false;
poljePassword.style.border="1px dashed red";
poljePassword2.style.border="1px dashed red";
document.getElementById("porukaPassword").innerHTML="Lozinke nisu iste!";
document.getElementById("porukaPassword2").innerHTML="Lozinke nisu iste!";
} else {
poljePassword.style.border="1px solid green";
poljePassword2.style.border="1px solid green";
document.getElementById("porukaPassword").innerHTML="";
document.getElementById("porukaPassword2").innerHTML="";
}

if (slanje_forme != true) {
event.preventDefault();
}

};

</script>


	</section>

	<footer>
	<p class="col-12">france.tv</p>
    <p class="col-12" id="autor">Doris Stanić, dstanic@tvz.hr, 2020. </p>
	</footer>

</body>

</html>

<?php
if (isset($_GET['errorRegister'])) {
    $error = $_GET['errorRegister'];

    if ($error) {
        echo '<script type="text/javascript">';
        echo 'document.getElementById("porukaRegister").innerHTML = "Registration failed, please try again."';
        echo '</script>';
    }
}

?>
