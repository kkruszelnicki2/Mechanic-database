<?php

$idf=$_POST['idf'];

include 'open_db.php';

$conn=OpenCon();

$data = date("Y-m-d");

$netto=$_POST['netto'];
$brutto=$_POST['brutto'];

if(!empty($_POST['netto']) && !empty($_POST['brutto']) && $_POST['brutto'] > $_POST['netto']) {
 $faktura="UPDATE faktury SET data_wystawienia='".$data."', koszt_netto='".$netto."', koszt_brutto='".$brutto."' WHERE idf='".$idf."' ";

 $fakt=$conn->query("SELECT z_id FROM faktury WHERE idf='".$idf."'");

 while($row=$fakt->fetch_row()) {
  $zlecenie="UPDATE zlecenia SET zrealizowane='1' WHERE idz='".$row[0]."'";
 }

 if($conn->query($faktura)) {
  echo "Faktura uzupełniona pomyślnie<br>";
 }

 if($conn->query($zlecenie)) {
  echo "Zlecenie wykonane pomyślnie<br>";
 }
}
else if($_POST['brutto'] <= $_POST['netto']) {
 echo "Cena brutto musi być większa od ceny netto!<br>";
}
else {
 echo "Musisz uzupełnić obie ceny!<br>";
}

CloseCon($conn);

echo "<form action='projekt_faktura.php' method='get'> <input type='submit' value='Powrót'> </form>"

?>