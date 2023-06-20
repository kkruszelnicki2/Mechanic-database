<?php

include "open_db.php";

$conn=OpenCon();

$klienci=$conn->query("SELECT idk,nazwisko FROM klienci");

$samochody=$conn->query("SELECT klienci.nazwisko,samochody.marka,samochody.numer_rejestracyjny,samochody.pojemnosc_silnika,samochody.rok_produkcji,samochody.przebieg,samochody.vin FROM samochody LEFT JOIN klienci ON samochody.k_id=klienci.idk");

echo "<center> <table border='1'> <tr> <td>Właściciel</td> <td>Marka</td> <td>Numer rejestracyjny</td> <td>Pojemność silnik</td> <td>Rok produkcji</td> <td>Przebieg</td> <td>VIN</td> </tr>";

while($row=$samochody->fetch_row()) {
 echo "<tr>";
 for($i=0;$i<count($row);$i++) {
  echo "<td>".$row[$i]."</td>";
 }
 echo "</tr>";
}

echo "<form action='projekt_dodaj_samochod.php' method='post'> <tr> <td> <select name='klient' id='klient'>";

while($row=$klienci->fetch_row()) {
 echo "<option value='".$row[0]."'>".$row[1]."</option>";
}
echo "</select> </td> <td><input placeholder='marka' name='marka'></td> <td><input placeholder='Numer rejestracyjny' name='numer' pattern='[A-Z0-9]{5,7}'></td>
<td><input placeholder='Pojemność silnika' name='pojemnosc' pattern='[0-9]{0,5}'></td> <td><input placeholder='Rok produkcji' name='rok' pattern='[1-2]{1}[0-9]{3}'></td>
<td><input placeholder='Przebieg' name='przebieg' pattern='[0-9]{0,7}'></td> <td><input placeholder='VIN' name='vin' pattern='[A-Z0-9]{17}'></td> </tr> </table> <br> <input type='submit' value='Dodaj samochod'> </form>";

echo "</table> <br>";

echo "<form action='projekt_menu.php' method='get'> <input type='submit' value='Powrót do menu'> </form>";

echo "</center>";

?>