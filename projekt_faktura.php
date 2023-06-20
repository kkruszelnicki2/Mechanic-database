<?php

include 'open_db.php';

$conn=OpenCon();

$sql = "SELECT faktury.idf,klienci.nazwisko,zlecenia.data,zlecenia.problem FROM faktury LEFT JOIN zlecenia ON zlecenia.idz=faktury.z_id LEFT JOIN klienci ON klienci.idk=zlecenia.k_id WHERE zlecenia.zrealizowane=0";

$faktury = $conn->query($sql);

echo "<center>";

echo "<table border='1'> <tr> <td>Klient</td> <td>Data zlecenia</td> <td>Problem</td> <td>Koszt netto</td> <td>Koszt brutto</td> <td></td> </tr>";

while($row=$faktury->fetch_row()) {
 echo "<tr>";

 for($i=1;$i<count($row);$i++) {
  echo "<td>".$row[$i]."</td>";
 }
 $cena=$conn->query("SELECT SUM(cena) FROM zlecenia_magazynowe WHERE f_id='".$row[0]."'");

 while($row2=$cena->fetch_row()) {
  echo "<form action='projekt_faktura_uzupelnij.php' method='post'><td><input placeholder='MIN ".round($row2[0],2)."' name='netto' pattern='[0-9]+[.]{0,1}[0-9]{0,2}'> </td> <td> <input name='brutto' pattern='[0-9]+[.]{0,1}[0-9]{0,2}'> </td>";
  echo "<td> <center> <input type='hidden' name='idf' value='".$row[0]."'> <input type='submit' value='Uzupełnij'> </form> </center> </td> </tr>";
 }
}

echo "</table>";

echo "<form action='projekt_menu.php'> <input type='submit' value='Powrót do menu'> </form>";

echo "</center>";
CloseCon($conn);

?>