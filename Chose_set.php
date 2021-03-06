<?php

//file che permette solo se si e loggati di accedere alla pagina della scelta del posto per la prenotazione
session_start();
$film_scelto = $_SESSION['id_film'];
$orario_scelto = $_SESSION['orario_film'];
$utente_usato = $_SESSION['id_utente'];

if($_SESSION['email'] != null){
    echo "<!doctype html>
        <html lang='en'>
            <head>
                <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
                <!-- Required meta tags -->
                <meta charset='utf-8'>
                <link rel='icon' type='image/x-icon' href='./img/Favico.png'>
                <script src='https://smtpjs.com/v3/smtp.js'></script>
                <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
                <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
                <link rel='stylesheet' href='./css/Postistyle.css'>
                <script src='./js/login.js'></script>

                <!-- Bootstrap CSS -->
                <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>

                <title>Happy Cinema</title>
                <script src='https://smtpjs.com/v3/smtp.js'></script>
                <script>
                function sendmail() {
                    Email.send({
                        SecureToken: '63a34a4d-dac3-4f0d-a569-f865f9e835ed',
                        To: '".$_SESSION['email']."',
                        From: 'lorenzoptg0@gmail.com',
                        Subject: 'POSTO RISERVATO',
                        Body: 'Il tuo ordine ?? stato confermato con successo'
                    }).then(
                        message => alert(message)
                    );
                }
                </script>

            </head>
            <body onload=show_posti(),show_posti_occupati()>
                <a class='navbar-brand' href='index.php'><img src='./img/Logo-Happy-Network.png'  width='190px' srcset=''></a>
                <div class='container'>
                    <div class='screen'></div>
                </div>
                <div style='text-align: center;'>
                    <h2>SELEZIONA IL TUO POSTO</h2>
                </div>
                <div align='center' id='table'></div>                
                <button id='bt_ordine' onclick='sendmail()' value='$film_scelto|".$orario_scelto."|$utente_usato' class='btn btn-primary'><h2>CONFERMA POSTO</h2></button>
                <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js' integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'></script>
                </body>
        </html>";
                }else{
                    $message = 'DEVI ACCEDERE O REGISTRARTI PER PRENOTARE UNO SPETTACOLO';
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    
                    header('location: ./index.php');
                    
                }
?>