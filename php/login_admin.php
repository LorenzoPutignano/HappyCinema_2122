<?php
require 'conn_DB.php';
$id = $_POST['id'];
$pass = $_POST['passwd'];
$pass_cript = hash('sha256',$pass);


try {
    $sql_query = "select id, password from admin_user where id='".$id."' and password='".$pass_cript."'";
    $result = $conn->query($sql_query);
    if($result->rowCount() > 0) {
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