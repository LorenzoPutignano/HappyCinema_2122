<?php
    $uploaddir = 'images/';
    $uploadfile = $uploaddir . basename($_FILES['user_img']['name']);
    if (move_uploaded_file($_FILES['user_img']['tmp_name'], $uploadfile)) {
        echo "ok";
        header("location: ./index.html");
    } else {
        echo "err";
        header("location: ./home.php");
    }
?> 