<?php
    $servername = "localhost";
    $username_sql = "root";
    $password_sql ="";
    $db_name ="test4";

    $user = $_POST["user2"];
    $password = $_POST["passwd2"];

    try {
        $conn = new PDO ("mysql:host=".$servername.";dbname=".$db_name, $username_sql, 
                        $password_sql);
        $sql_query = "select * from utente where password='" . $password . "';";
        $result = $conn->query($sql_query);
        if($result->rowCount() == 1){     //se il conteggio delle righe è maggiore di zero
            foreach($result as $row) {
                if($row["password"] == $password) {
                    echo "[INFO] password già memorizzata!";
                }
            }
        }else {
            $sql_query_insert = "INSERT INTO utente (user, password) VALUES ('" . $user . "', '" . $password . "');";
            $result = $conn -> query($sql_query_insert);
            echo "[INFO] user e password memorizzati con successo!";
        }
    } catch(PDOException $exc){
        echo "connessione error " . $exc->getMessage();
    };
?>

<?php
require 'conn_DB.php';
$nome = $_POST['name'];
$cognome = $_POST['surname'];
$email = $_POST['email'];
$pass = $_POST['passwd'];

try {
    $sql_query = "select * from utente where password='" . $password . "';";
    $result = $conn->query($sql_query);
    if($result->rowCount() == 1) {
        foreach($result as $row) {
            if($row["password"] == $password) {
                echo "[INFO] password già memorizzata!";
            }
        }
    else {
        $sql_query = "INSERT INTO utente (nome,cognome,email,password) values ('".$nome."','".$cognome."','".$email."','".$pass."')";
        $result = $conn -> query($sql_query_insert);
        echo "[INFO] user e password memorizzati con successo!";
    }
} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}
?>