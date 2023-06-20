<?php

include 'open_db.php';

$conn=OpenCon();

$klient=$conn->query("SELECT zlecenia.idz,klienci.nazwisko,zlecenia.problem FROM zlecenia LEFT JOIN klienci ON zlecenia.k_id=klienci.idk");
echo "<center>";
echo "<form action='projekt_dodaj_zamowienie.php' method='post'>
        <br>Części: <input name='nazwa'>
        <br>Ilość: <input name='ilosc' pattern='[0-9]{1,3}'>
        <br>Cena: <input name='cena' pattern='[0-9]+[.]{0,1}[0-9]{0,2}'>
        <br>Zlecenie: <select name='zlecenie'>";

while($row=$klient->fetch_row()) {
 echo "<option value='".$row[0]."'>".$row[1].", ".$row[2]."</option>";
}

echo "</select> <br><br> <input type='submit' value='Złóż zamówienie'></form>";

echo "<form action='projekt_menu.php'> <input type='submit' value='Powrót do menu'> </form>";
echo "</center>";
CloseCon($conn);

?>