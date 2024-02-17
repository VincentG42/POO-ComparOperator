<?php

session_start();

if (isset($_POST['floating_pseudo']) && !empty($_POST['floating_pseudo'])
&& isset($_POST['floating_password']) && !empty($_POST['floating_password'])){

    $_SESSION['pseudo'] = $_POST['floating_pseudo'];
    $_SESSION['password'] = $_POST['floating_password'];


    header('Location: ../admin.php');

}

if(isset($_POST['get_back']) && !empty($_POST['get_back'])){

    session_destroy();

    header('Location: ../index.php');

}


?>