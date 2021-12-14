<?php
    setcookie("email", null);
    setcookie("passw", null);
    setcookie("nome", null);
    session_start();
    $_SESSION["email"]=null;
    header('Location: ../index.php');

?>