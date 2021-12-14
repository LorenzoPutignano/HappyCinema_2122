<?php
    $email = $_POST['emailcok'];
    $passw = $_POST['passwdcok'];
    $nome = $_POST['nomecok'];
    echo $email;
    setcookie("email", "");
    setcookie("passw", "");
    setcookie("nome", "");
?>