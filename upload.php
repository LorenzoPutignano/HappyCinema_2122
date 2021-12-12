<?php
    $uploaddir = 'images';
    $uploadfile = $uploaddir . basename($_FILES['user_img']['name']);
    if (move_uploaded_file($_FILES['user_img']['tmp_name'], $uploadfile)) {
      echo "[INFO] upload ok";
    } else {
       echo "[ERR] Upload failed";
    }
?> 