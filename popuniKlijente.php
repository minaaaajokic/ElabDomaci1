<?php
require "dbBroker.php";
require "models/Klijent.php";

$klijenti = Klijent::vratiKlijente($konekcija);

foreach ($klijenti as $klijent){

    ?>
    <option value="<?= $klijent->klijentID ?>"><?=$klijent->ime . " " . $klijent->prezime ?> </option>

<?php
}
?>