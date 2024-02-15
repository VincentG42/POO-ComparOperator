<?php
require_once '../config/connect_db.php';
require_once '../config/autoload.php';

$manager = new Manager($db);

var_dump($_POST);


if (isset($_POST['change_premium'])){
    $changePremium = intval($_POST['change_premium']);
    $manager -> updateOperatorToPremium($_POST['tour_id'],$changePremium);

    header ('Location: ../admin.php');
}

?>