<?php

//file che permette il controllo se l'utente si è loggato o meno
    $id = $_POST['id'];
    session_start();
    $_SESSION["id"]=$id;
    setcookie("id", $id);
    header('location: ./home.php');
?>