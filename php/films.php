<?php
require 'conn_DB.php';
//file che permette il print delle card, prende tutto dalla db e manda solo la parte inerente ai film

try {
    $sql_query = "SELECT * FROM films";    
    $result = $conn->query($sql_query);
    foreach($result as $row){
        echo $row["id_film"].";".$row["titolo"].";".$row["genere"].";".$row["data_uscita"].";".$row["orario_0"].";".$row["orario_1"].";".$row["orario_2"].";".$row["descrizione"].";".$row["durata_film"].";".$row["img_film"].";"."|";
    }
} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}
?>