<?php

include 'open_db.php';

$materialy=$_POST['materialy'];
$czynnosc=$_POST['czynnosc'];
$czas=$_POST['czas'];
$idz=$_POST['zlecenie'];

$conn=OpenCon();

if(!empty($_POST['materialy']) && !empty($_POST['czynnosc']) && !empty($_POST['czas'])) {
 $sql="INSERT INTO czynnosci (z_id,materialy,czynnosc,czas)
        VALUES ('".$idz."','".$materialy."','".$czynnosc."','".$czas."')";

 if($conn->query($sql)) {
  echo "Czynność dodana pomyślnie <br>";
 }
}
else {
 echo "Uzupełnij wszystkie dane!";
}

echo "<form action='projekt_czynnosc'> <input type='submit' value='Powrót do menu'> </form>";

CloseCon($conn);

?>