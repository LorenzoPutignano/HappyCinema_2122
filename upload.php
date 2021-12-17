<?php

//file che permette l'upload dell'immagine del film
    $uploaddir = 'images/';
    $uploadfile = $uploaddir . basename($_FILES['user_img']['name']);
    if (move_uploaded_file($_FILES['user_img']['tmp_name'], $uploadfile)) {
        echo "ok";
        header("location: ./index.php");
    } else {
        echo "err";
        header("location: ./home.php");
    }
?> 