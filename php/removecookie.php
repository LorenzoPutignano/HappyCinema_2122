<?php
    setcookie("email", null);
    setcookie("passw", null);
    setcookie("nome", null);
    session_start();
    $_SESSION["email"]=null;
    $_SESSION["passw"]=null;
    $_SESSION["nome"]=null;
    header('Location: ../index.php');

?>