<?php
//una volta effettuato il logout da parte dell'utente vengono cancellati i cookie e le sessioni relative

    setcookie("email", null);
    setcookie("passw", null);
    setcookie("nome", null);
    session_start();
    $_SESSION["email"]=null;
    $_SESSION["passw"]=null;
    $_SESSION["nome"]=null;
    header('Location: ../index.php');

?>