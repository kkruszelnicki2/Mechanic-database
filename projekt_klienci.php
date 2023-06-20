<?php

include 'open_db.php';

$conn= OpenCon();

$klienci = $conn->query("SELECT * FROM klienci");

echo "<center><table border='1'><tr><td>Nazwisko</td> <td>Adres</td> <td>Numer telefonu</td></tr>";

while($row=$klienci->fetch_row()) {
 echo "<tr>";
 for($i=1;$i<count($row);$i++) {
  echo "<td>".$row[$i]."</td>";
 }
 echo "</tr>";
}

echo "<form action='projekt_dodaj_klienta.php' method='post'> <tr><td><input placeholder='nazwisko' name='nazwisko'></td> <td><input placeholder='Adres' name='adres'></td> <td><input placeholder='Numer telefonu' name='telefon' pattern='[0-9]{9}'></td></tr>";

echo "</table> <br>";

echo "<input type='submit' value='Dodaj klienta'></form>";
echo "<form action='projekt_menu.php' method='get'> <input type='submit' value='Powrót do menu'> </form></center>";

CloseCon($conn);

?>