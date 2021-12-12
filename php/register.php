<?php
require 'conn_DB.php';
$nome = $_POST['name'];
$cognome = $_POST['surname'];
$email = $_POST['email'];
echo $email;
$pass = $_POST['passwd'];
$pass_cript = hash('sha256',$pass);

try {
    $sql_query = "select email from utente;";
    $result = $conn->query($sql_query);
    if($result->rowCount() == 1) {
        foreach($result as $row) {
            if($row["email"] == $email) {
                echo "Err";
            } else {
                $sql_query = "INSERT INTO utente (nome,cognome,email,password) values ('".$nome."','".$cognome."','".$email."','".$pass_cript."')";
                $result = $conn -> query($sql_query);
                echo "ok";
            }
        }    
    }
} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}
?>