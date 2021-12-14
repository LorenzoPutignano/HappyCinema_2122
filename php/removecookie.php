<?php
    $email = $_POST['emailcok'];
    $passw = $_POST['passwdcok'];
    $nome = $_POST['nomecok'];
    echo $email;
    setcookie("email", null);
    setcookie("passw", null);
    setcookie("nome", null);
?>