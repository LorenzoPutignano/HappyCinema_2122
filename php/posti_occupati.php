<?php
require 'conn_DB.php';
$orario = $_POST['orario_film'];
$id_film = $_POST['id_film'];

try {
    $sql_query = "select n_posto from films where orario_sc='".$orario."' and id_film_cs='".$id_film."');";
    //$sql_query = "select * from prenotazioni;";
    $result = $conn -> query($sql_query);
    echo $result;
} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}
?>