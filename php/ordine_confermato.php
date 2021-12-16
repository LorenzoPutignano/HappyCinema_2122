<?php
require 'conn_DB.php';
$film = $_POST['film'];
$orario = $_POST['orario'];
$utente = $_POST['utente'];
$posto = $_POST['posto'];

try {
    $sql_query = "INSERT INTO prenotazioni (id_utente_cs,id_film_cs,n_posto,orario_sc) values ('".$utente."','".$film."','".$posto."','".$orario."')";
    $result = $conn -> query($sql_query);
    echo "ok";
} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}
?>