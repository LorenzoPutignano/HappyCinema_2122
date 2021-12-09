<?php
require 'conn_DB.php';
$titolo = $_POST['name'];
$genere = $_POST['surname'];
$data_uscita = $_POST['email'];
$orario1 = $_POST['passwd'];
$orario2 = $_POST['passwd'];
$orario3 = $_POST['passwd'];
$descrizione = $_POST['passwd'];
$duratafilm = $_POST['passwd'];


try {
    $sql_query = "INSERT INTO films (titolo,genere,data_uscita,orario_0,orario_1,orario_2,descrizione,durata_film) values ('".$titolo."','".$genere."','".$data_uscita."','".$orario1."','".$orario2."','".$orario3."','".$descrizione."','".$duratafilm."')";
    $result = $conn -> query($sql_query_insert);
    echo "[INFO] Film memorizzato con successo!";
} catch (PDOException $exc) {
    echo "error msg: " . $exc->getMessage();
}
?>