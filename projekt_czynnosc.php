<?php

include 'open_db.php';

$currenttime=date("H:i:s");

$conn=OpenCon();

$klienci=$conn->query("SELECT zlecenia.idz,klienci.nazwisko,zlecenia.problem FROM zlecenia LEFT JOIN klienci ON zlecenia.k_id=klienci.idk");

echo "<center>";
echo "<form action='projekt_dodaj_czynnosc.php' method='post'>
        <br>Materiały: <input name='materialy'>
        <br>Czynność: <input name='czynnosc'>
        <br>Czas: <input name='czas' pattern='[0-9]{2}[:][0-6][0-9][:][0-6][0-9]'>
        <br>Zlecenie: <select name='zlecenie'>";

while($row=$klienci->fetch_row()) {
 echo "<option value='".$row[0]."'>".$row[1].", ".$row[2]."</option>";
}

echo "</select> <br><br><input type='submit' value='Dodaj czynność'> </form>";
echo "<form action='projekt_menu.php'> <input type='submit' value='Powrót do menu'> </form> </center>";

CloseCon($conn);

?>