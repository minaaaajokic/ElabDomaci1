<?php
require "dbBroker.php";
require "models/Tretman.php";

$tretmani = Tretman::pretraziTretmane("1", "asc", $konekcija);;

foreach ($tretmani as $tretman){

    ?>
    <option value="<?= $tretman->tretmanID ?>"><?= $tretman->ime . " " . $tretman->prezime . " (" . $tretman->naziv . " - " . $tretman->datum . " )"?></option>

<?php
}
?>