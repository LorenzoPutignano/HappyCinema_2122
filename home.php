<html>
    <head>
        <meta charset='utf-8'></meta>
    </head>
    <body>
        <h1>
            <?php
             if($_COOKIE['id'] > 0){  
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
                            $.ajax({
                                type: 'POST',
                                url: './php/films.php',

                                success: function(ret) {
                                    console.log(ret)
                                    const nome = ret.split('|');
                                    //console.log(nome)
                                    var length = nome.length;
                                    var html_append = '';


                                    $('#par').html('');
                                    html_append += '<table  class=\'table\' style=\'border: 1px solid black;\'><tr><td style=\'border: 1px solid black;\'>ID</td><td style=\'border: 1px solid black;\'>Titolo</td></tr>';

                                    for (var i = 0; i < length - 1; i++) {
                                        const campi = nome[i].split(';')
                                        html_append += '<tr><td style=\'border: 1px solid black;\'>' + campi[0] + '</td><td style=\'border: 1px solid black;\' >' + campi[1] + '</td></tr>';
                                    }
                                    //console.log(nome);
                                    html_append += '</table>';
                                    $('#Tablefilms').append(html_append);

                                },
                                error: function(ret) {

                                }
                            });
                        </script>
                        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
                    </head>

                    <body>
                        <h2>Welcome user ".$_COOKIE['id']."</h2>
                        <p id='Tablefilms' style='display: none;'></p>
                        <div id='addfilm'>

                            <div class='container'>
                                <a href='../index.html'>
                                    <img src='../img/Logo-Happy-Network.png' width='180px'> </a>
                            </div>
                            <form class='row g-4' enctype='multipart/form-data' method='POST' action=''>
                                IMG TO SAVE: <input type='file' id='img_film' name='user_img'><br>
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
                                    <input type='time' class='form-control' id='durata_film'>
                                </div>
                                <div class='col-cn-1'>
                                    <button type='button' id='bt_film' class='btn btn-primary'>ADD FILM</button>
                                </div>
                            </form>

                            <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
                        </div>
                    </body>

                    </html>";

                }else{
                    header('location: ./index.html');
                    echo "nada cookie"; 
                }
            ?> 
        </h1>
    </body>
</html>