<html>
    <head>
        <meta charset='utf-8'></meta>
    </head>
    <body>
        <h1>
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
                            type: "POST",
                            url: "./php/films.php",
                
                            success: function(ret) {
                                //console.log(ret)
                                const nome = ret.split("|");
                                //console.log(nome)
                                var length = nome.length;
                                var html_append = "";
                                var card = "";
                
                                $("#card").html("");
                
                                for (var i = 0; i < length - 1; i++) {
                                    const campi = nome[i].split(";")
                                    card += "<div class='card'class='filter' data-string='" + campi[1] + "'><img class='card-img-left' src='./images/" + campi[9] + "' alt='Card image cap'><div class='card-body'><h1 class='card-title'>" + campi[1] + "</h1><h4>Genere : " + campi[2] + "</h4><h5 class='card-text'>" + campi[7] + "</h5><button class='orariobutton'>" + campi[4] + "</button><button class='orariobutton'>" + campi[5] + "</button><button class='orariobutton'>" + campi[6] + "</button></div><div class='card-footer'><small class='text-muted'>Durata Film : " + campi[8] + " minuti</small></div></div>";
                                }
                                //console.log(nome);
                                html_append += "</table>";
                                $("#card").append(card);
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

                    <body style=text-align:left>
                        <img src='./img/Logo-Happy-Network.png' width='200px'>
                        
                        <button align='right' type='button' id='bt_show_add_film' class='btn btn-primary' style='
                        float: right'>ADD NEW FILM</button>
                        <h2>Welcome admin </h2> 
                        
                        
                        <button type='button' id='bt_show_remove_film' class='btn btn-primary'>REMOVE FILM</button>
                        <br>
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
                            <div class='input-group mb-3'>
                                <span class='input-group-text' id='basic-addon1'>ID</span>
                                <input type='number' class='form-control' placeholder='INSERIRE ID FILM DA ELIMINARE' aria-label='ID_FILM' id='id_film_remove' aria-describedby='basic-addon1'>
                                <button type='button' id='bt_film_remove' class='btn btn-primary' onload='showFilms()'>REMOVE</button>
                            </div>
                    </div>
                    <div id="content" class="d-flex flex-row justify-content-center flex-wrap container-fluid ">
                        <div id="card"></div>
                    </div>
                        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
                    </body>

                    </html>
        </h1>
    </body>
</html>