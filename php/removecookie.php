<?php
<<<<<<< HEAD
    setcookie("email", null);
    setcookie("passw", null);
    setcookie("nome", null);
=======
    $email = $_POST['email'];
    $passw = $_POST['passwd'];
    $nome = $_POST['nome'];
    echo $email;
    setcookie("email", $email);
    setcookie("passw", $passw);
    setcookie("nome", $nome);
    
    header('location: ../index.php');
>>>>>>> 10314a613f3cec50e7a3212453b3c07c503cd5a9
?>