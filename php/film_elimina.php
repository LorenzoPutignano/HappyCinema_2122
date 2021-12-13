<?php
require 'conn_DB.php';
$id = $_POST['id'];

try {
    $sql_query = "delete from films where id_film ='" . $id . "';";
    $result = $conn->query($sql_query);
        if ($result->rowCount() >= 1) {
            
            echo"ok";
        }
        else {
            
            echo "err";
        }

} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}

?>