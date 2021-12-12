<?php
header('Set-Cookie: cross-site-cookie=name; SameSite=None; Secure');
    $id = $_POST['id'];
    setcookie("id", $id);
    header('location: ./home.php');
?>