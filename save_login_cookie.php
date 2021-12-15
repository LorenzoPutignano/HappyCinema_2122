<?php
    $email = $_POST['email'];
    $passw = $_POST['passwd'];
    $nome = $_POST['nome'];
    session_start();
    $_SESSION["email"]=$email;
    $_SESSION["passw"]=$passw;
    $_SESSION["nome"]=$nome;
    setcookie("email", $email);
    setcookie("passw", $passw);
    setcookie("nome", $nome);
    
    header('location: index.php');
?>