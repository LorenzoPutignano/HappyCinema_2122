<?php
require 'conn_DB.php';

try {
    $sql_query = "SELECT * FROM films";    
    $result = $conn->query($sql_query);
    foreach($result as $row){
        echo $row["titolo"].";".$row["genere"].";".$row["data_uscita"].";".$row["orario_0"].";".$row["orario_1"].";".$row["orario_2"].";".$row["descrizione"].";".$row["durata_film"].";"."|";
    }
} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}
?>