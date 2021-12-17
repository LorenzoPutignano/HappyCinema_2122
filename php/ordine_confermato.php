<?php
require 'conn_DB.php';
$film = $_POST['film'];
$orario = $_POST['orario'];
$utente = $_POST['utente'];
$posto = $_POST['posto'];

//file che permette l'invio una volta effettuata la prenotazione, di mandare le info al db 

try {
    $sql_query = "insert into prenotazioni (id_utente_cs,id_film_cs,n_posto,orario_sc) values ('".$utente."','".$film."','".$posto."','".$orario."')";
    //$sql_query = "select * from prenotazioni;";
    $result = $conn -> query($sql_query);
    echo "ok";
} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}
?>