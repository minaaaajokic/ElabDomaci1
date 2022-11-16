<?php
require "dbBroker.php";
require "models/Tip.php";

$tipovi = Tip::vratiTipove($konekcija);

foreach ($tipovi as $tip){

    ?>
    <option value="<?= $tip->tipID ?>"><?= $tip->naziv ?> </option>

<?php
}
?>