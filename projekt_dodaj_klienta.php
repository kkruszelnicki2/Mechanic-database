<?php

include 'open_db.php';

$conn=OpenCon();

$nazwisko=$_POST['nazwisko'];
$adres=$_POST['adres'];
$telefon=$_POST['telefon'];

$sql = "INSERT INTO klienci (nazwisko,adres,telefon)
        VALUES ('".$nazwisko."','".$adres."','".$telefon."')";

if(!empty($_POST['nazwisko']) && !empty($_POST['adres'])) {
 if($conn->query($sql)==TRUE) {
  echo "Klient dodany pomyślnie";
 }
 else {
  echo "Coś poszło źle :(";
 }
}
else {
 echo "Musisz wypełnić wszystkie dane!";
}

echo "<form action='projekt_klienci.php' method='get'> <input type='submit' value='Powrót'> </form>";

?>