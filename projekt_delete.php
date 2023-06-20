<?php

include 'open_db.php';
$conn = OpenCon();

$checked=$_POST['checked'];

if(isset($_POST['del'])) {
 for($i=0;$i<count($checked);$i++) {
  $faktura=$conn->query("SELECT idf FROM faktury WHERE z_id=".$checked[$i]);

  while($row=$faktura->fetch_row()) {
   $sql = "DELETE FROM zlecenia_magazynowe WHERE f_id=".$row[0];
   $conn->query($sql);
  }

  $sql = "DELETE FROM czynnosci WHERE z_id=".$checked[$i];
  $conn->query($sql);

  $sql = "DELETE FROM faktury WHERE z_id=".$checked[$i];
  $conn->query($sql);

  $faktura->close();

  $sql = "DELETE FROM zlecenia WHERE idz=".$checked[$i];
  if($conn->query($sql)==TRUE) {
   echo "Usunieto zlecenie";
  }
  else {
   echo "Coś nie poszło";
  }
 }
}
else if(isset($_POST['view'])) {
 for($i=0;$i<count($checked);$i++) {
  $zlecenie = $conn->query("SELECT klienci.nazwisko,zlecenia.data,zlecenia.problem FROM zlecenia LEFT JOIN klienci ON zlecenia.k_id=klienci.idk WHERE zlecenia.idz=".$checked[$i]);
  $zamowienia = $conn->query("SELECT zlecenia_magazynowe.nazwa,zlecenia_magazynowe.ilosc,zlecenia_magazynowe.cena FROM zlecenia_magazynowe RIGHT JOIN faktury ON zlecenia_magazynowe.f_id=faktury.idf RIGHT JOIN zlecenia ON
                                zlecenia.idz=faktury.z_id WHERE faktury.z_id=".$checked[$i]);
  $czynnosci = $conn->query("SELECT czynnosci.materialy,czynnosci.czynnosc,czynnosci.czas FROM czynnosci RIGHT JOIN zlecenia ON czynnosci.z_id=zlecenia.idz WHERE zlecenia.idz=".$checked[$i]);
  while($row=$zlecenie->fetch_array()) {
   echo $row[0]."  ".$row[1]."  ".$row[2]."<br>";
  }
  echo "Czynności:<br> <table border='1'> <tr> <td>Materiały</td> <td>Czynność</td> <td>Czas</td> </tr>";
  while($row=$czynnosci->fetch_array()) {
   echo "<tr>";
   for($j=0;$j<count($row)/2;$j++) {
    echo "<td>".$row[$j]."</td>";
   }
   echo "</tr>";
  }
  echo "</table><br>";

  echo "Zlecenia magazynowe:<br> <table border='1'> <tr> <td>Części</td> <td>Ilość</td> <td>Cena</td> </tr>";
  while($row=$zamowienia->fetch_array()) {
   echo "<tr>";
   for($j=0;$j<count($row)/2;$j++) {
    echo "<td>".$row[$j]."</td>";
   }
   echo "</tr>";
  }
  echo "</table><br>";
 }
}
else if(isset($_POST['add'])) {
 if(!empty($_POST['problem'])) {
  $data = date('Y-m-d');
  $ids = $_POST['klient'];
  $problem = $_POST['problem'];

  $klient = $conn->query("SELECT klienci.idk FROM samochody LEFT JOIN klienci ON klienci.idk=samochody.k_id WHERE samochody.ids=".$ids);

  while($row=$klient->fetch_row()) {
   $zlecenie="INSERT INTO zlecenia (k_id,sa_id,data,problem,zrealizowane)
                VALUES ('".$row[0]."','".$ids."','".$data."','".$problem."','0')";
  }

  if($conn->query($zlecenie)) {
   echo "Zlecenie dodane!<br>";
  }

  $idz = $conn->query("SELECT MAX(idz) FROM zlecenia");

  while($row=$idz->fetch_row()) {
   if($conn->query("INSERT INTO faktury (z_id) VALUES ('".$row[0]."')")) {
    echo "Faktura Dodana!<br>";
   }
  }
 }
 else {
  echo 'Dodaj problem!<br>';
 }
}
echo "<form action='projekt_view.php' method='get'><input value='powrót' type='submit'></form>";

CloseCon($conn);
?>