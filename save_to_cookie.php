<?php
    $id = $_POST['id'];
    session_start();
    $_SESSION["id"]=$id;
    setcookie("id", $id);
    header('location: ./home.php');
?>