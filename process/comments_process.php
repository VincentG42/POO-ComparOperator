<?php
require_once '../config/connect_db.php';
require_once '../config/autoload.php';

$manager = new Manager($db);

if(isset($_POST['message']) && !empty($_POST['message'])
&& isset($_POST['author']) && !empty($_POST['author'])
&& isset($_POST['tour_operator_id']) && !empty($_POST['tour_operator_id'])
){

    var_dump($_POST);
    
    $data=[
        'message' => $_POST['message'],
        'author' => $_POST['author'],
        'tour_operator_id' => intval( $_POST['tour_operator_id'] )
    ];


    $manager -> createReview($data);

    header('Location: ../location.php');
}

?>