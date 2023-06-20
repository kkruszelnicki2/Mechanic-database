<?php

include 'open_db.php';

$conn = OpenCon();

$result = $conn->query('SELECT zlecenia.idz,klienci.nazwisko,zlecenia.data,zlecenia.problem FROM zlecenia LEFT JOIN klienci ON zlecenia.k_id=klienci.idk ORDER BY zlecenia.data');

echo "<center><form action='projekt_delete.php' method='post'>";

echo "<table border='1'>";
echo "<tr><td>Nazwisko</td><td>Data</td><td>Problem</td><td>Zaznacz</td></tr>";

while($row = $result->fetch_row()) {
 echo "<tr>";
 for($i=1;$i<count($row);$i++) {
  echo "<td>".$row[$i]."</td>";
 }
 echo "<td><center><input type='checkbox' name='checked[]' value='".$row[0]."'/></center></td>";
 echo "</tr>";
}

$klienci = $conn->query('SELECT samochody.ids,klienci.nazwisko,samochody.vin FROM klienci RIGHT JOIN samochody ON samochody.k_id=klienci.idk');

echo "<tr> <td><select name='klient'>";

while($row=$klienci->fetch_row()) {
 echo "<option value='".$row[0]."'>".$row[1].", ".$row[2]."</option>";
}

echo "</select></td> <td>".date('Y-m-d')."</td> <td><input name='problem' style='width: 100%'></td> </tr> </table> <br>";

echo "<input name='del' type='submit' value='usuń'> \t";
echo "<input name='view' type='submit' value='Zobacz detale'>\t";
echo "<input name='add' type='submit' value='Dodaj zlecenie'></form>";
echo "<form action='projekt_menu.php' method='get'> <input type='submit' value='powrót do menu'> </form> </center>";

$result->close();
CloseCon($conn);

?>