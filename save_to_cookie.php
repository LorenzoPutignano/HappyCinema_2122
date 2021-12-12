<?php
    $id = $_POST['id'];
    setcookie("id", $id);
    header('location: ./home.php'); 
?>