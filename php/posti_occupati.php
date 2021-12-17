<?php
require 'conn_DB.php';
$posto = $_POST['posto'];
$film = $_POST['film'];
$orario = $_POST['orario'];

//file che permette di vedere tutti i posti disponibili e non grazie al controllo del film e dell'orario

try {
    $sql_query = "select * from prenotazioni where id_film_cs='".$film."' AND orario_sc='".$orario."'";
    $result = $conn->query($sql_query);
    foreach($result as $row){
        echo $row["n_posto"].";";
    }
    
} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}
?>