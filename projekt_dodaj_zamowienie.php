<?php

include 'open_db.php';

$conn=OpenCon();

$idz=$_POST['zlecenie'];

$faktura=$conn->query("SELECT faktury.idf FROM faktury WHERE z_id=".$idz);

$nazwa=$_POST['nazwa'];
$ilosc=$_POST['ilosc'];
$cena=$_POST['cena'];

echo mysql_num_rows($faktura);

if(!empty($_POST['nazwa']) && !empty($_POST['ilosc']) && !empty($_POST['cena'])) {
 while($row=$faktura->fetch_row()) {
  $sql="INSERT INTO zlecenia_magazynowe (f_id,nazwa,ilosc,cena)
        VALUES ('".$row[0]."','".$nazwa."','".$ilosc."','".$cena."')";
  echo $sql;
 }

 if($conn->query($sql)==TRUE) {
  echo "Zlecenie złożone pomyślnie";
 }
 else {
  echo "Coś poszło źle";
 }
}
else {
 echo "Uzupełnij wszystkie pola!";
}
?>