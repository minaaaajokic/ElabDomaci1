<?php
require "dbBroker.php";
require "models/Tretman.php";

$zaposleni = trim($_GET['zaposleni']);
$sortiranje = trim($_GET['sortiranje']);

$tretmani = Tretman::pretraziTretmane($zaposleni, $sortiranje, $konekcija);

?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Klijent</th>
            <th>Tretman</th>
            <th>Zaposleni</th>
            <th>Datum</th>
        </tr>
    </thead>
    <tbody>
 <?php

foreach ($tretmani as $tretman){
    ?>
    <tr>
        <td><?= $tretman->ime . " " . $tretman->prezime?></td>
        <td><?= $tretman->naziv?></td>
        <td><?= $tretman->imeZap . " " . $tretman->prezimeZap?></td>
        <td><?= $tretman->datum ?></td>
    </tr>
<?php
}
?>
    </tbody>
</table>

