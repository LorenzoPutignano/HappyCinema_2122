<?php

unset($_COOKIE['email']);
unset($_COOKIE['passw']);
unset($_COOKIE['nome']);
header('location: ./index.php');
echo "ok";

?>