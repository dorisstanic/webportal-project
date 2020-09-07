<?php
include 'connect.php';
define('UPLPATH', 'img/');
session_start();

if (isset($_POST['slanje'])) {
  if (isset($_POST['ime'])) {
  $ime =$_POST['ime'];
};

if (isset($_POST['prezime'])) {
  $prezime = $_POST['prezime'];
};

if (isset($_POST['username'])) {
  $username = $_POST['username'];
};

if (isset($_POST['password'])) {
  $lozinka = $_POST['password'];
  $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
}

$razina = 0;
$registriranKorisnik = '';
//Provjera postoji li u bazi već korisnik s tim korisničkim imenom
$sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
$stmt = mysqli_stmt_init($dbc);
if (mysqli_stmt_prepare($stmt, $sql)) {
 mysqli_stmt_bind_param($stmt, 's', $username);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_store_result($stmt);
 }
if (mysqli_stmt_num_rows($stmt) > 0) {
    header('Location: registracija.php?errorRegister=true');
} else {
    $sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($dbc);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $razina);
        mysqli_stmt_execute($stmt);

        $registriranKorisnik = true;

        header('Location: login.php?loginValidation=true');
    }
}
mysqli_close($dbc);
}
?>
