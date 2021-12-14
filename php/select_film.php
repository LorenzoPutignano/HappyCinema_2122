<?php
require 'conn_DB.php';
$id = $_POST['id'];


try {
    $sql_query = "select titolo from films where orario_0='".$id."' OR orario_1='".$id."' OR orario_2='".$id."'";
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