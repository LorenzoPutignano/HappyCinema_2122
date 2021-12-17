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
$img_film_name = $_POST['img_film'];


//prende in input le varie celle dei film e le inserisce nelle tabelle

try {
    $sql_query = "INSERT INTO films (titolo,genere,data_uscita,orario_0,orario_1,orario_2,descrizione,durata_film,img_film) values ('".$titolo."','".$genere."','".$data_uscita."','".$orario1."','".$orario2."','".$orario3."','".$descrizione."','".$duratafilm."','".$img_film_name."')";
    $result = $conn -> query($sql_query);
    echo "ok";
} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}
?>