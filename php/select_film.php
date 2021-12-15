<?php
require 'conn_DB.php';
$id = $_POST['id'];
$orario = $_POST['orario'];

try {
    $sql_query = "select titolo from films where id_film='".$id."' AND orario_0='".$orario."' OR orario_1='".$orario."' OR orario_2='".$orario."'";
    $result = $conn->query($sql_query);
    if($result->rowCount() > 0) {
        $row = $result->fetch();
        echo $row["titolo"];
    }
    else {
        echo "err";
    }
} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}
?>