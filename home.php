<html>
    <head>
        <meta charset='utf-8'></meta>
    </head>
    <body>
        <h1>
            <?php
             if($_SESSION["id"] != null){  
                 echo "
                 <!DOCTYPE html>
                    <html lang='en'>
                    <head>
                        <meta charset='UTF-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <link rel='icon' type='image/x-icon' href='../img/Favico.png'>
                        <title>Happy Cinema</title>
                        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
                        <script src='./js/login.js'></script>
                        <script>
                            function showFilms(){
                                $.ajax({
                                    type: 'POST',
                                    url: './php/films.php',
                                    success: function(ret) {
                                        //console.log(ret)
                                        const nome = ret.split('|');
                                        //console.log(nome)
                                        var length = nome.length;
                                        var html_append = '';
                                        html_append += '<table  class=\'table\' style=\'border: 1px solid black;\'><tr><td style=\'border: 1px solid black;\'>ID</td><td style=\'border: 1px solid black;\'>Titolo</td><td style=\'border: 1px solid black;\'>REMOVE FILM</td><td style=\'border: 1px solid black;\'>EDIT</td></tr>';                                                               
                                        for (var i = 0; i < length - 1; i++) {
                                            const campi = nome[i].split(';');
                                            html_append += '<tr><td style=\'border: 1px solid black;\'>' + campi[0] + '</td><td style=\'border: 1px solid black;\' >' + campi[1] + '</td><td style=\'border: 1px solid black;\'><button id='+campi[0]+' onclick=ajax_call_remove_film(this.id)>REMOVE</button></td><td style=\'border: 1px solid black;\'><button id='+campi[0]+' onclick=FUNCTION_EDIT_FILM(this.id)>EDIT</button></td></tr>';
                                        }
                                        //console.log(nome);
                                        html_append += '</table>';
                                        $('#Tablefilms').html(html_append);
                                    },
                                    error: function(ret) {
                                    }
                                });
                            }
                            showFilms();
                        </script>
                        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
                        <link rel='stylesheet' href='./css/mystyle.css'>
                    </head>
                    <body style=text-align:center>
                        <img src='./img/Logo-Happy-Network.png' width='200px'>
                        <h2>Welcome user ".$_COOKIE['id']."</h2>
                        <button id='log_out_admin'>
                                <span>
                                    <h5>Log Out</h5>
                                </span>
                            </button>
                        <button type='button' id='bt_show_add_film' class='btn btn-primary'>ADD NEW FILM</button>
                        <button type='button' id='bt_show_remove_film' class='btn btn-primary'>REMOVE FILM</button>
                        <button type='button' id='bt_show_orders' class='btn btn-primary'>SHOW ORDERS</button>
                        <br>
                        <div id='boxalert'></div>
                        <div id='addfilm' style='display: none;'>
                            <form class='row g-4' enctype='multipart/form-data' method='POST' action='upload.php'>
                                IMG TO SAVE: <input type='file' id='imgtosave' name='user_img'><br>
                                <div class='col-md-6'>
                                    <label for='titolo' class='form-label'>Titolo</label>
                                    <input type='text' class='form-control' id='titolo'>
                                </div>
                                <div class='col-md-6'>
                                    <label for='genere' class='form-label'>Genere</label>
                                    <input type='text' class='form-control' id='genere'>
                                </div>
                                <div class='col-md-12'>
                                    <label for='data_uscita' class='form-label'>Data di Uscita</label>
                                    <input type='date' class='form-control' id='data_uscita'>
                                </div>
                                <div class='col-md-4'>
                                    <label for='orario0' class='form-label'>Orario 1</label>
                                    <input type='time' class='form-control' id='orario0'>
                                </div>
                                <div class='col-md-4'>
                                    <label for='orario1' class='form-label'>Orario 2</label>
                                    <input type='time' class='form-control' id='orario1'>
                                </div>
                                <div class='col-md-4'>
                                    <label for='orario2' class='form-label'>Orario 3</label>
                                    <input type='time' class='form-control' id='orario2'>
                                </div>
                                <div class='col-md-12'>
                                    <label for='descrizione' class='form-label'>Descrizione</label>
                                    <input type='text' class='form-control' id='descrizione'>
                                </div>
                                <div class='col-md-12'>
                                    <label for='durata_film' class='form-label'>Durata</label>
                                    <input type='text' class='form-control' id='durata_film'>
                                </div>
                                <input type='submit' id='bt_film' class='btn btn-primary'></input>
                            </form>
                        </div>
                        <div id='removefilm' style='display: none;'>
                        <br>
                            <div id='Tablefilms' style='display: none;'></div>
                    </div>
                        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
                    </body>
                    </html>";
                }else{
                    header('location: ./index.php');
                    echo "Error cookie"; 
                }
            ?> 
        </h1>
    </body>
</html>