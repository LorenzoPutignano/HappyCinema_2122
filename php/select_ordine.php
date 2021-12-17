<?php
require 'conn_DB.php';
//file che permette di visualizzare tutti gli ordini 
try {
    $sql_query = "SELECT * FROM prenotazioni";    
    $result = $conn->query($sql_query);
    foreach($result as $row){
        echo $row["id_prenotazione"].",".$row["id_utente_cs"].",".$row["id_film_cs"].",".$row["n_posto"].",".$row["orario_sc"]."|";
    }
} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}
?>