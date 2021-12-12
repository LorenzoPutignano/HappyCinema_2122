$(document).ready(function() {
    $("#registerbut").click(function(event) {
        //prendere valori da HTML
        console.log("cliccato register");
        var client_name = $("#client_name").val();
        var client_surname = $("#client_surname").val();
        var client_email = $("#client_email").val();
        var client_passw = $("#client_pass").val();
        ajax_call_php_register(client_name, client_surname, client_email, client_passw);
    });
    $("#loginbut").click(function(event) {
        //prendere valori da HTML
        //console.log("cliccato login");
        var client_email = $("#client_email").val();
        var client_passw = $("#client_pass").val();
        ajax_call_php_login(client_email, client_passw);
    });
    $("#admin_login_bt").click(function(event) {
        //prendere valori da HTML
        console.log("cliccato login");
        var id_admin = $("#id_admin").val();
        var admin_passw = $("#admin_pass").val();
        ajax_call_php_login_admin(id_admin, admin_passw);
    });

    $("#bt_film").click(function(event) {
        console.log("ciao")
        var img_film_start = $("#img_film").val();
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
        ajax_call_films_add(titolo, genere, data_uscita, orario0, orario1, orario2, descrizione, durata_film, img_film_final);
        ajax_call_films_show_table();
    });


});

function ajax_call_films_show_table() {
    $.ajax({
        type: "POST",
        url: "./php/films.php",

        success: function(ret) {
            console.log(ret)
            const nome = ret.split("|");
            //console.log(nome)
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
        url: "../php/insertfilm.php",
        data: data,
        success: function(ret) {
            console.log(ret);
            if (ret == "ok") {
                alert("Film memorizzato con successo!");
            } else {
                alert("Film gia memorizzato");
            }
        },
        error: function(ret) {

        }
    });
}

function ajax_call_php_register(client_name, client_surname, client_email, client_passw) {
    var data = {};
    data.name = client_name;
    data.surname = client_surname;
    data.email = client_email;
    data.passwd = client_passw;
    //console.log(client_email, client_name, client_passw, client_surname);
    console.log(data);

    $.ajax({
        type: "POST",
        url: "./php/register.php",
        data: data,
        success: function(ret) {
            console.log(ret);
            if (ret == "ok") {
                alert("Utente registrato con successo!");
            } else if (ret == "Err") {
                alert("L'utente esiste, email sbagliata");
            }
        },
        error: function(ret) {

        }
    });
}

function ajax_call_php_login_admin(id_admin, admin_passw) {
    var data = {};
    data.id = id_admin;
    data.passwd = admin_passw;

    console.log(data);

    $.ajax({
        type: "POST",
        url: "./php/login_admin.php",
        data: data,
        success: function(ret) {
            console.log(ret);
            if (ret == "ok") {
                console.log("log adm ok!");
                //$("#loginform").hide();
                //$("#addfilm").show();
                //$("#Tablefilms").show();
            } else {
                alert("Wrong data");
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

    $.ajax({
        type: "POST",
        url: "../php/login.php",
        data: data,
        success: function(ret) {
            //console.log("Ok Logged")
            if (ret == "ok") {
                alert('Benvenuto');
            } else {
                alert("Wrong data")
            }
        },
        error: function(ret) {

        }
    });
}