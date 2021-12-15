<?php
require 'conn_DB.php';
include 'film_edit.php';

$titolo_new = $_POST["titolo_new"];
$genere_new = $_POST["genere_new"];
$data_uscita_new = $_POST["data_uscita_new"];
$orario0_new = $_POST["orario0_new"];
$orario1_new = $_POST["orario1_new"];
$orario2_new = $_POST["orario2_new"];
$descrizione_new = $_POST["descrizione_new"];
$durata_new = $_POST["durata_new"];
$img_film_name_new = $_POST['img_film_new'];

try {
    $sql_query_update = "update films set id_film='" . $id . "', titolo='" . $titolo_new . "', genere='" . $genere_new . "', data_uscita='" . $data_uscita_new . "',
    orario0='" . $orario0_new . "', orario1='" . $orario1_new . "', orario2='" . $orario2_new . "', descrizione='" . $descrizione_new . "',
    durata_film='" . $durata_new . "', img_film='" . $img_film_name_new . "' where id_film='" . $id . "'";
    $result = $conn->query($sql_query_update);
    if ($result->rowCount() >= 1) {
        
        echo"ok";
    } else {
        
        echo "err";
    }

} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}

?>