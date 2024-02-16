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


if (isset($_POST['add_destination']) && !empty($_POST['add_destination'])
&& isset($_POST['price']) && !empty($_POST['price'])
&& isset($_POST['operator_id']) && !empty($_POST['operator_id'])
){

    $checkDestination = $manager ->checkDestinationOperator($_POST['add_destination'], intval($_POST['operator_id']));
    var_dump($checkDestination);

    if ($checkDestination){

            $manager ->updatePriceDestination($checkDestination['id'], $_POST['price']);
    } else {
        $data = [
            'location' => $_POST['add_destination'],
            'price' => $_POST['price'],
            'tour_operator_id' => $_POST['operator_id'],
            'bg_image' =>""
        ];
        $manager -> createDestination($data);
    }

    header ('Location: ../admin.php');
}

if (isset($_POST['destination_to_delete']) && !empty($_POST['destination_to_delete'])){
            $manager ->deleteDestination($_POST['destination_to_delete']);


            header ('Location: ../admin.php');
}


?>