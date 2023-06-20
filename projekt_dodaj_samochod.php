<?php

include 'open_db.php';
$conn=OpenCon();

$klient=$_POST['klient'];
$marka=$_POST['marka'];
$numer=$_POST['numer'];
$pojemnosc=$_POST['pojemnosc'];
$rok=$_POST['rok'];
$przebieg=$_POST['przebieg'];
$vin=$_POST['vin'];

$sql="INSERT INTO samochody (k_id,marka,numer_rejestracyjny,pojemnosc_silnika,rok_produkcji,przebieg,vin)
        VALUES ('".$klient."','".$marka."','".$numer."','".$pojemnosc."','".$rok."','".$przebieg."','".$vin."')";

if(!empty($_POST['marka']) && !empty($_POST['numer']) && !empty($_POST['numer']) && !empty($_POST['pojemnosc']) && !empty($_POST['rok']) && !empty($_POST['przebieg']) && !empty($_POST['vin'])) {
 if($conn->query($sql)) {
  echo "Samochód dodany pomyślnie";
 }
 else {
  echo "Nie udało się dodać samochodu";
 }
}
else {
 echo "Wszystkie pola muszą być uzupełnione!";
}

echo "<br> <form action='projekt_samochod.php' method='get'> <input type='submit' value='Powrót'> </form>";

?>