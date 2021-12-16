<?php
require 'conn_DB.php';
$posto = $_POST['posto'];
$film = $_POST['film'];
$orario = $_POST['orario'];



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