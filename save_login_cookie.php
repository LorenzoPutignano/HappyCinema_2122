<?php
    $email = $_POST['email'];
    $passw = $_POST['passwd'];
    $nome = $_POST['nome'];
    setcookie("email", $email);
    setcookie("passw", $passw);
    setcookie("nome", $nome);
    
    header('location: index.php');
?>