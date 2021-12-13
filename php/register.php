<?php
require 'conn_DB.php';
$bool = FALSE;
$nome_r = $_POST['name_r'];
$cognome_r = $_POST['surname_r'];
$email_r = $_POST['email_r'];
$pass_r = $_POST['passwd_r'];
$pass_cript_r = hash('sha256',$pass_r);

try {
    $query = "INSERT INTO utente (nome, cognome,email,password) SELECT * FROM (SELECT'".$nome_r."','".$cognome_r."','".$email_r."','".$pass_cript_r."')"."AS tmp WHERE NOT EXISTS (SELECT email, password FROM utente where email='".$email_r."'"."and password='".$pass_cript_r."') LIMIT 1;";
    $result = $conn->query($query);
    if($result->rowCount() == 1) {
        echo "[INFO] utente inserito!";
        header("location: ./index.html");
    } else {
        echo "[ERROR] user/password già presenti sul DB! Prova a registrarti usando user/password diverse!";
    }
} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}
?>