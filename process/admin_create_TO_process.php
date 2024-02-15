<?php
require_once '../config/connect_db.php';
require_once '../config/autoload.php';


$manager = new Manager($db);


// var_dump($_POST);


if (isset($_POST['name_TO']) && (!empty($_POST['name_TO']))
    && isset($_POST['site']) && (!empty($_POST['site']))
){
    isset($_POST['premium']) ? $premium = 1 : $premium = 0;
    // var_dump($premium);
    $dataTO = ['name_TO' => $_POST['name_TO'],
                'link' => $_POST['site'],
                'grade_count' => 0,
                'grade_total' => 0,
                'is_premium' => $premium
    ];
    $manager ->createTourOperator($dataTO);

    $_POST['name_TO'] ="";
    $_POST['site'] ="";
}

header ('Location: ./admin.php');

?>