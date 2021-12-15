$(document).ready(function() {
    $("#registerbut").click(function(event) {
        //prendere valori da HTML
        //console.log("cliccato register");
        var client_name_r = $("#client_name_register").val();
        var client_surname_r = $("#client_surname_register").val();
        var client_email_r = $("#client_email_register").val();
        var client_passw_r = $("#client_pass_register").val();

        if (!$('#client_name_register').val() & !$('#client_surname_register').val() & !$('#client_email_register').val() & !$('#client_pass_register').val()) {
            alert('Aweee i campi sono vuoti');
        } else {
            ajax_call_php_register(client_name_r, client_surname_r, client_email_r, client_passw_r);
        }

    });
    $("#loginbut").click(function(event) {
        var client_email = $("#client_email").val();
        var client_passw = $("#client_pass").val();
        console.log(client_passw + client_email);
        if (!$('#client_email').val() & !$('#client_pass').val()) {
            alert('Aweee i campi sono vuoti');
        } else {
            ajax_call_php_login(client_email, client_passw);
        }

    });
    $("#admin_login_bt").click(function(event) {
        //prendere valori da HTML
        //console.log("cliccato login");
        var id_admin = $("#id_admin").val();
        var admin_passw = $("#admin_pass").val();
        if (!$('#id_admin').val() & !$('#admin_pass').val()) {
            alert('Aweee i campi sono vuoti');
        } else {
            ajax_call_php_login_admin(id_admin, admin_passw);
        }
    });

    $("#bt_film").click(function(event) {
        var img_film_start = $("#imgtosave").val();
        var img_film_ok = img_film_start.replace(/[\:/\\]/g, '');
        var img_film_final = img_film_ok.replace('Cfakepath', '');
        var titolo = $("#titolo").val();
        var genere = $("#genere").val();
        var data_uscita = $("#data_uscita").val();
        var orario0 = $("#orario0").val();
        var orario1 = $("#orario1").val();
        var orario2 = $("#orario2").val();
        var descrizione = $("#descrizione").val();
        var durata_film = $("#durata_film").val();

        if (!$('#titolo').val() & !$('#genere').val() & !$('#orario0').val() & !$('#descrizione').val() & !$('#durata_film').val()) {
            alert('Aweee i campi sono vuoti');
        } else {
            ajax_call_films_add(titolo, genere, data_uscita, orario0, orario1, orario2, descrizione, durata_film, img_film_final);
        }
    });



    $('#log_out').click(function(event) {
        $.ajax({
            type: 'POST',
            url: './php/removecookie.php',

            success: function(ret) {
                window.open("./index.php", "_self");
            },
            error: function(ret) {

            }
        });
    });
    $('#log_out_admin').click(function(event) {
        $.ajax({
            type: 'POST',
            url: './php/remove_admincookie.php',

            success: function(ret) {
                window.open("./index.php", "_self");
            },
            error: function(ret) {

            }
        });
    });
    $("#bt_show_add_film").click(function(event) {
        $("#addfilm").css("display", "block");
        $("#removefilm").css("display", "none");
        $("#Tablefilms").css("display", "none");
        $("#usertable").css("display", "none");

    });
    $("#bt_show_remove_film").click(function(event) {
        $("#addfilm").css("display", "none");
        $("#usertable").css("display", "none");
        $("#removefilm").css("display", "block");
        $("#Tablefilms").css("display", "block");

    });
    $("#bt_show_user").click(function(event) {
        $("#addfilm").css("display", "none");
        $("#removefilm").css("display", "none");
        $("#Tablefilms").css("display", "none");
        $("#usertable").css("display", "block");
        $.ajax({
            type: "POST",
            url: "./php/select_user.php",
            success: function(ret) {
                const user = ret.split("|");
                var length = user.length;
                var html_append = "";
                html_append += "<table class=\"table\" style=\"border: 1px solid black;\"><tr><td style=\"border: 1px solid black;\">ID UTENTE</td><td style=\"border: 1px solid black;\">Nome</td><td style=\"border: 1px solid black;\">Cognome</td><td style=\"border: 1px solid black;\">EMAIL</td></tr>";

                for (var i = 0; i < length - 1; i++) {
                    const campi = user[i].split(";")
                    html_append += "<tr><td style=\"border: 1px solid black;>" + campi[0] + "</td><td style=\"border: 1px solid black;\" >" + campi[0] + "</td><td style=\"border: 1px solid black;\">" + campi[1] + "</td><td style=\"border: 1px solid black;\">" + campi[2] + "</td><td style=\"border: 1px solid black;\">" + campi[3] + "</td></tr>";
                }
                $("#usertable").append(html_append);

            },
            error: function(ret) {

            }
        });
    });

    $("#bt_show_orders").click(function(event) {
        $("#addfilm").css("display", "none");
        $("#removefilm").css("display", "none");
        $("#Tablefilms").css("display", "none");
        $("#usertable").css("display", "none");

    });

});

function ajax_call_ciao_film(id_film) {
    var data = {};
    data.id = id_film;

    //console.log(data);

    $.ajax({
        type: "POST",
        url: "./php/film_edit.php",
        data: data,
        success: function(ret) {
            console.log(ret);
            const nome = ret.split('|');
            //console.log(nome)
            var length = nome.length;
            var html_append = '';

            html_append += '<table  class=\'table\' style=\'border: 1px solid black;\'><tr><td style=\'border: 1px solid black;\'>ID</td><td style=\'border: 1px solid black;\'>Titolo</td><td style=\'border: 1px solid black;\'>Genere</td><td style=\'border: 1px solid black;\'>Data_uscita</td><td style=\'border: 1px solid black;\'>orario1</td><td style=\'border: 1px solid black;\'>orario2</td><td style=\'border: 1px solid black;\'>orario3</td><td style=\'border: 1px solid black;\'>descrizione</td><td style=\'border: 1px solid black;\'>Durata_film</td><td style=\'border: 1px solid black;\'>Img_name</td></tr>';

            for (var i = 0; i < length - 1; i++) {
                const campi = nome[i].split(';')
                //console.log(campi);
                html_append += '<tr><td style=\'border: 1px solid black;\'>' + campi[0] + '</td><td style=\'border: 1px solid black;\' >' + campi[1] + '</td><td style=\'border: 1px solid black;\' >' + campi[2] + '</td><td style=\'border: 1px solid black;\' >' + campi[3] + '</td><td style=\'border: 1px solid black;\' >' + campi[4] + '</td><td style=\'border: 1px solid black;\' >' + campi[5] + '</td><td style=\'border: 1px solid black;\' >' + campi[6] + '</td><td style=\'border: 1px solid black;\' >' + campi[7] + '</td><td style=\'border: 1px solid black;\' >' + campi[8] + '</tr>';            
            }

            html_append += '</table>';
            $('#Tablefilms').append(html_append);

        },
        error: function(ret) {

        }
    });
}



function ajax_call_edit_film2() {
    var data = {};
    data.id = id_film_edit;

    //console.log(data);

    $.ajax({
        type: "POST",
        url: "./php/.php",
        data: data,
        success: function(ret) {
            //console.log(ret);
            if (ret == "ok") {
                $("#boxalert").html("<div id='tempalert' class='alert alert-success'>film eliminato correttamente!</div>");
                removealert();
                console.log("film eliminato correttamente!");
                $("#Tablefilms").html = "";
                showFilms();
            } else {
                $("#boxalert").html("<div id='tempalert' class='alert alert-danger'>film non esistente</div>");
                removealert();
                //console.log("film non esistente!");
            }
        },
        error: function(ret) {

        }
    });
}


function orario_scelto(id) {
    //qui va fatta la apertura della scelta posti
    const dati = id.split("|");
    console.log(dati[0], dati[1])
    var data = {};
    data.id = dati[0];
    data.orario = dati[1];


    $.ajax({
        type: "POST",
        url: "./php/select_film.php",
        data: data,
        success: function(ret) {
            //qui gli devi mandare le info che servono per fare la prenotazione
            //fai la post al file chose_set e preleva i dati dal file
            window.open("./Chose_set.php", "_self");
        },
        error: function(ret) {

        }
    });
}


function showFilms() {
    $.ajax({
        type: 'POST',
        url: './php/films.php',

        success: function(ret) {
            console.log(ret)
            const nome = ret.split('|');
            //console.log(nome)
            var length = nome.length;
            var html_append = '';

            html_append += '<table  class=\'table\' style=\'border: 1px solid black;\'><tr><td style=\'border: 1px solid black;\'>ID</td><td style=\'border: 1px solid black;\'>Titolo</td></tr>';

            for (var i = 0; i < length - 1; i++) {
                const campi = nome[i].split(';')
                html_append += '<tr><td style=\'border: 1px solid black;\'>' + campi[0] + '</td><td style=\'border: 1px solid black;\' >' + campi[1] + '</td></tr>';
            }
            //console.log(nome);
            html_append += '</table>';
            $('#Tablefilms').html(html_append);

        },
        error: function(ret) {

        }
    });
}

function removealert() {
    window.setTimeout(function() {
        $("#tempalert").fadeTo(1000, 0).slideUp(1000, function() {
            $(this).remove();
        });
    }, 400);

}

function ajax_call_remove_film(id_film) {
    var data = {};
    data.id = id_film;

    //console.log(data);

    $.ajax({
        type: "POST",
        url: "./php/film_elimina.php",
        data: data,
        success: function(ret) {
            //console.log(ret);
            if (ret == "ok") {
                $("#boxalert").html("<div id='tempalert' class='alert alert-success'>film eliminato correttamente!</div>");
                removealert();
                console.log("film eliminato correttamente!");
                $("#Tablefilms").html = "";
                showFilms();
            } else {
                $("#boxalert").html("<div id='tempalert' class='alert alert-danger'>film non esistente</div>");
                removealert();
                //console.log("film non esistente!");
            }
        },
        error: function(ret) {

        }
    });
}


function ajax_search_film(search) {
    var data = {};
    data.titolo = search;
    //console.log(data);

    $.ajax({
        type: "POST",
        url: "./php/search.php",
        data: data,
        success: function(ret) {
            const nome = ret.split("|");
            var length = nome.length;
            var html_append = "";

            $("#par").html("");
            html_append = "<table class=\"table\" style=\"border: 1px solid black;\"><tr><td style=\"border: 1px solid black;\">Nome</td><td style=\"border: 1px solid black;\">Cognome</td><td>Classe</td><td style=\"border: 1px solid black;\">Sesso</td></tr>";

            for (var i = 0; i < length - 1; i++) {
                const campi = nome[i].split(";")
                html_append = "<tr><td style=\"border: 1px solid black;>" + campi[0] + "</td><td style=\"border: 1px solid black;\" >" + campi[1] + "</td><td style=\"border: 1px solid black;\">" + campi[2] + "</td><td style=\"border: 1px solid black;\">" + campi[3] + "</td></tr>";
            }
            console.log(nome);
            html_append = "</table>";
            $("#Tablefilms").append(html_append);

        },
        error: function(ret) {

        }
    });
}



function ajax_call_films_show_table() {
    $.ajax({
        type: "POST",
        url: "./php/films.php",

        success: function(ret) {
            //console.log(ret)
            const nome = ret.split("|");
            var length = nome.length;
            var html_append = "";

            $("#par").html("");
            html_append += "<table class=\"table\" style=\"border: 1px solid black;\"><tr><td style=\"border: 1px solid black;\">Nome</td><td style=\"border: 1px solid black;\">Cognome</td><td>Classe</td><td style=\"border: 1px solid black;\">Sesso</td></tr>";

            for (var i = 0; i < length - 1; i++) {
                const campi = nome[i].split(";")
                html_append += "<tr><td style=\"border: 1px solid black;>" + campi[0] + "</td><td style=\"border: 1px solid black;\" >" + campi[1] + "</td><td style=\"border: 1px solid black;\">" + campi[2] + "</td><td style=\"border: 1px solid black;\">" + campi[3] + "</td></tr>";
            }
            //console.log(nome);
            html_append += "</table>";
            $("#Tablefilms").append(html_append);

        },
        error: function(ret) {

        }
    });
}

function ajax_call_films_add(titolo, genere, data_uscita, orario0, orario1, orario2, descrizione, durata_film, img_film_final) {
    var data = {};
    data.titolo = titolo;
    data.genere = genere;
    data.data_uscita = data_uscita;
    data.orario0 = orario0;
    data.orario1 = orario1;
    data.orario2 = orario2;
    data.descrizione = descrizione;
    data.durata_film = durata_film;
    data.img_film = img_film_final;
    console.log(data.img_film);

    $.ajax({
        type: "POST",
        url: "./php/insertfilm.php",
        data: data,
        success: function(ret) {
            //console.log(ret);
            if (ret == "ok") {
                //alert("Film memorizzato con successo!");
                //window.open("./home.php", "_self");
            } else {
                //alert("Film gia memorizzato");
                //window.open("./home.php", "_self");
            }
        },
        error: function(ret) {

        }
    });
}

function ajax_call_php_register(client_name_r, client_surname_r, client_email_r, client_passw_r) {
    var data = {};
    data.name_r = client_name_r;
    data.surname_r = client_surname_r;
    data.email_r = client_email_r;
    data.passwd_r = client_passw_r;
    console.log(data);
    $.ajax({
        type: "POST",
        url: "./php/register.php",
        data: data,
        success: function(ret) {
            console.log(ret);
            if (ret == "ok") {
                alert("Utente registrato con successo!");
                window.open("./index.php", "_self");
            } else if (ret == "err") {
                alert("L'utente esiste, email sbagliata");
            }
        },
        error: function(ret) {

        }
    });
}
//admin connection

function ajax_call_php_login_admin(id_admin, admin_passw) {
    var data = {};
    data.id = id_admin;
    data.passwd = admin_passw;

    //console.log(data);

    $.ajax({
        type: "POST",
        url: "./php/login_admin.php",
        data: data,
        success: function(ret) {
            console.log(ret);
            if (ret == "ok") {
                //alert("log adm ok!");
                $.post("./save_to_cookie.php", data);
                window.open("./home.php", "_self");
            } else {
                $("#paragrafoerror").html("<h3 style='text-align:center;color: #ee0000 !important;'>Wrong Acces!</h3>");
            }
        },
        error: function(ret) {

        }
    });
}


function ajax_call_php_login(client_email, client_passw) {
    var data = {};
    data.email = client_email;
    data.passwd = client_passw;
    console.log(data);

    $.ajax({
        type: "POST",
        url: "./php/login.php",
        data: data,
        success: function(ret) {
            if (ret == "err") {
                $("#boxalert").html("<div id='tempalert' class='alert alert-warning'>Utente non esistente! Effettua il login</div>");
                removealert();
                //alert("Wrong data")

            } else {
                data.nome = ret;
                $("#boxalert").html("<div id='tempalert' class='alert alert-warning'>[INFO] login in ok!</div>");
                removealert();
                //alert("logged")
                $.post("save_login_cookie.php", data);
                window.open("index.php", "_self");
            }
        },
        error: function(ret) {

        }
    });
}