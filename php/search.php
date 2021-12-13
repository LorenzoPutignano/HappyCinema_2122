<?php
require 'conn_DB.php';
$titolo = $_POST['titolo'];
//r corn
try {
    $sql_query = "select * from films;";
    $result = $conn->query($sql_query);
    if($result->rowCount() > 0) {
        if($row["titolo"] ==  $titolo) {
            //$sql_query_film = "SELECT * from films;";
            echo $row["id_film"].";".$row["titolo"].";".$row["genere"].";".$row["data_uscita"].";".$row["orario_0"].";".$row["orario_1"].";".$row["orario_2"].";".$row["descrizione"].";".$row["durata_film"].$row["immagine"].";".$row["img_film"].";"."|";
            echo "[INFO] film trovato!";
        } else {
            echo "[ERROR] Film non trovato!";
        }
} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}
?>