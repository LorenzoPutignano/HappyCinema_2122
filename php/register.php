<?php
require 'conn_DB.php';
$nome = $_POST['name'];
$cognome = $_POST['surname'];
$email = $_POST['email'];
$pass = $_POST['passwd'];

try {
    $sql_query = "select * from utente where password='" . $pass . "';";
    $result = $conn->query($sql_query);
    if($result->rowCount() == 1) {
        foreach($result as $row) {
            if($row["password"] == $pass) {
                echo "Err";
            }
        }    
    } else {
    $sql_query = "INSERT INTO utente (nome,cognome,email,password) values ('".$nome."','".$cognome."','".$email."','".$pass."')";
    $result = $conn -> query($sql_query);
    echo "ok";
    }
} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}
?>