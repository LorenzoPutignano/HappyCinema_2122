<?php
require 'conn_DB.php';
session_start();
$id = $_POST['id'];
$orario = $_POST['orario'];
$_SESSION["id_film"]=$id;
$_SESSION["orario_film"]=$orario;
$email = $_SESSION["email"];


try {
    $sql_query = "select id_utente from utente where email='".$email."'";
    $result = $conn->query($sql_query);
    if($result->rowCount() > 0) {
        $row = $result->fetch();
        $_SESSION["id_utente"]=$row["id_utente"];

    }
    else {
        echo "err";
    }
} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}
?>