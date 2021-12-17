<?php
require 'conn_DB.php';
//file che permette di visualizzare tutti gli utenti registrati al DB
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