<?php
require 'conn_DB.php';
$email = $_POST['email'];
$pass = $_POST['passwd'];

try {
    $sql_query = "select email,password from utente where email='".$email."' and password='".$pass."'";
    $result = $conn->query($sql_query);
    if($result->rowCount() == 1) {
        $row = $result->fetch();
        echo "ok";
    }
    else {
        echo "err";
    }
} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}
?>