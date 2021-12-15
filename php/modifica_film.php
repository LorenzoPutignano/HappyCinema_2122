<?php
require 'conn_DB.php';
$id = $_POST['id'];

$titolo_old = $_POST["titolo_old"];
$genere_old = $_POST["genere_old"];
$data_uscita_old = $_POST["data_uscita_old"];
$orario0_old = $_POST["orario0_old"];
$orario1_old = $_POST["orario1_old"];
$orario2_old = $_POST["orario2_old"];
$descrizione_old = $_POST["descrizione_old"];
$durata_old = $_POST["durata_old"];
$img_film_name_old = $_POST['img_film_old'];

$titolo_new = $_POST["titolo_new"];
$genere_new = $_POST["genere_new"];
$data_uscita_new = $_POST["data_uscita_new"];
$orario0_new = $_POST["orario0_new"];
$orario1_new = $_POST["orario1_new"];
$orario2_new = $_POST["orario2_new"];
$descrizione_new = $_POST["descrizione_new"];
$durata_new = $_POST["durata_new"];
$img_film_name_new = $_POST['img_film_new'];

try {
    $sql_query_update = "UPDATE films set titolo='" . $titolo_new . "', genere='" . $genere_new . "', data_uscita='" . $data_uscita_new . "',
    orario0='" . $orario0_new . "', orario1='" . $orario1_new . "', orario2='" . $orario2_new . "', descrizione='" . $descrizione_new . "',
    durata_film='" . $durata_new . "', img_film='" . $img_film_name_new . "' where id_film='" . $id . "';";
$result = $conn->query($sql_query_update);
        if ($result->rowCount() >= 1) {
            
            echo"ok";
        } else {
            
            echo "err";
        }

} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}

?>


<?php
    $user_old = $_POST["user_old"];
    $password_old = $_POST["password_old"];

    $user_new = $_POST["user_new"];
    $password_new = $_POST["password_new"];

    try {
        $conn = new PDO ("mysql:host=".$servername.";dbname=".$db_name, $username_sql, 
                        $password_sql);
        $sql_query_update = "update utente set user='" . $user_new . "', password='" . $password_new . "'
                            where user='" . $user_old . "' and password= '" . $password_old . "'";
        $result = $conn->query($sql_query_update);
        if($result->rowCount() >= 1){
            echo "[INFO] utente aggiorntato!";
        }else {
            echo "[ERROR] user/password già presenti sul DB; impossibile aggiornare utente!";
        }

    } catch(PDOException $exc){
        echo "connessione error " . $exc->getMessage();
    };
?>