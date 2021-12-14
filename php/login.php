<?php
require 'conn_DB.php';
$email = $_POST['email'];
$pass = $_POST['passwd'];
$pass_cript = hash('sha256',$pass);
setcookie("email", $email);
setcookie("passw", $passw);

try {
    $sql_query = "select nome,email,password from utente where email='".$email."' and password='".$pass_cript."'";
    $result = $conn->query($sql_query);
    if($result->rowCount() > 0) {
        $row = $result->fetch();
        echo $row["nome"];
    }
    else {
        echo "err";
    }
} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}
?>