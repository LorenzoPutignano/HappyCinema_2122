<?php
require 'conn_DB.php';
include 'film_edit.php';

$titolo = '';
$genere = "";
$data_uscita = "";
$orario0 = "";
$orario1 = "";
$orario2 = "";
$descrizione = "";
$durata_film = "";
$img_film_name = "";


try {
    $sql_query = "select * from films where id_film='" . $id . "'";
    $result = $conn -> query($sql_query);
    if($result->rowCount() > 0) {
        $row = $result->fetch();
        $titolo = $row["titolo"];
        $genere = $row["genere"];
        $data_uscita = $row["data_uscita"];
        $orario0 = $row["orario0"];
        $orario1 = $row["orario1"];
        $orario2 = $row["orario2"];
        $descrizione = $row["descrizione"];
        $durata_film = $row["durata_film"];
        $img_film_name = $row["img_film"];
    }

} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}
?>