<?php
require 'conn_DB.php';

try {
    $sql_query = "SELECT * FROM utente";    
    $result = $conn->query($sql_query);
    foreach($result as $row){

        echo $row["id_utente"].";".$row["nome"].";".$row["cognome"].";".$row["email"].";"."|";
    }
} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}
?>