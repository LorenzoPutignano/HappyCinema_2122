<?php
require 'conn_DB.php';
$titolo = $_POST['titolo'];
$genere = $_POST['genere'];
$data_uscita = $_POST['data_uscita'];
$orario1 = $_POST['orario0'];
$orario2 = $_POST['orario1'];
$orario3 = $_POST['orario2'];
$descrizione = $_POST['descrizione'];
$duratafilm = $_POST['durata_film'];


try {
    $sql_query = "INSERT INTO films (titolo,genere,data_uscita,orario_0,orario_1,orario_2,descrizione,durata_film) values ('".$titolo."','".$genere."','".$data_uscita."','".$orario1."','".$orario2."','".$orario3."','".$descrizione."','".$duratafilm."')";
    $result = $conn -> query($sql_query_insert);
    echo "ok";
} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}
?>