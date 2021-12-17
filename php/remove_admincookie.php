<?php
//una volta effettuato il logout da parte dell'admin vengono cancellati i cookie e le sessioni relative
    setcookie("id", null);
    session_start();
    $_SESSION["id"]=null;
    header('Location: ../index.php');

?>