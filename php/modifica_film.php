<?php
require 'conn_DB.php';
session_start();
$titolo_new = $_POST["titolo_new"];
$genere_new = $_POST["genere_new"];
$data_uscita_new = $_POST["data_uscita_new"];
$orario0_new = $_POST["orario0_new"];
$orario1_new = $_POST["orario1_new"];
$orario2_new = $_POST["orario2_new"];
$descrizione_new = $_POST["descrizione_new"];
$durata_new = $_POST["durata_new"];
$img_film_name_new = $_POST['img_film_new'];

//File che permette la modifica del film che si seleziona
//Senza eliminarlo

try {
    $sql_query_update = "update films set titolo='" . $titolo_new . "', genere='" . $genere_new . "', data_uscita='" . $data_uscita_new . "',
    orario_0='" . $orario0_new . "', orario_1='" . $orario1_new . "', orario_2='" . $orario2_new . "', descrizione='" . $descrizione_new . "',
    durata_film='" . $durata_new . "', img_film='" . $img_film_name_new . "' where id_film='".$_SESSION['id_final']."'";
    $result = $conn->query($sql_query_update);
    if ($result->rowCount() >= 1) {
        echo "ok";
    } else {
        
        echo "err";
    }

} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}

?>