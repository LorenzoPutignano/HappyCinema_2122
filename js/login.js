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
    $("#LoginAdmin").click(function(event) {
        //prendere valori da HTML
        console.log("cliccato login");
        var admin_id = $("#admin_id").val();
        var admin_passw = $("#admin_pass").val();
        ajax_call_php_login_admin(admin_id, admin_passw);
    });

    $("#bt_film").click(function(event) {
        console.log("film");
        var titolo = $("#titolo").val();
        var genere = $("#genere").val();
        var data_uscita = $("#data_uscita").val();
        var orario0 = $("#orario0").val();
        var orario1 = $("#orario1").val();
        var orario2 = $("#orario2").val();
        var descrizione = $("#descrizione").val();
        var durata_film = $("#durata_film").val();
        ajax_call_films_add(titolo, genere, data_uscita, orario0, orario1, orario2, descrizione, durata_film);
    });

    ajax_call_films();

});

function ajax_call_films_add(titolo, genere, data_uscita, orario0, orario1, orario2, descrizione, durata_film) {
    var data = {};
    data.titolo = titolo;
    data.genere = genere;
    data.data_uscita = data_uscita;
    data.orario0 = orario0;
    data.orario1 = orario1;
    data.orario2 = orario2;
    data.descrizione = descrizione;
    data.durata_film = durata_film;
    console.log(titolo, genere, data_uscita, orario0, orario1, orario2, descrizione, durata_film);

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
    console.log(client_email, client_name, client_passw, client_surname);

    $.ajax({
        type: "POST",
        url: "../php/register.php",
        data: data,
        success: function(ret) {
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

function ajax_call_php_login_admin(admin_id, admin_passw) {
    var data = {};
    data.id = admin_id;
    data.passwd = admin_passw;

    $.ajax({
        type: "POST",
        url: "../php/login_admin.php",
        data: data,
        success: function(ret) {
            console.log(ret);
            if (ret == "ok") {
                location.href = "film_add.html";
            } else {
                alert("Wrong data")
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

function ajax_call_films() {
    $.ajax({
        type: "POST",
        url: "./php/films.php",

        success: function(ret) {
            console.log(ret)
            const nome = ret.split("|");
            //console.log(nome)
            var length = nome.length;
            var html_append = "";
            var card = "";


            $("#par").html("");

            for (var i = 0; i < length - 1; i++) {
                const campi = nome[i].split(";")
                card += "<div class='card mb-3' style='max-width: 540px;'><div class='row g-0'><div class='col-md-4'><img src='...' class='img-fluid rounded-start' alt='...'></div><div class='col-md-8'><div class='card-body'><h5 class='card-title'>" + campi[0] + "</h5><h7> Categoria : " + campi[1] + "</h7><br><br><p class='card-text'>" + campi[6] + "</p><p class='card-text'><small class='text-muted'><button>" + campi[3] + "</button><button>" + campi[4] + "</button><button>" + campi[5] + "</button><br><br>Durata film : " + campi[7] + " min </small><br><br><button>Acquista</button></p></div></div></div></div><br>";
            }
            //console.log(nome);
            html_append += "</table>";
            $("#par").append(card);

        },
        error: function(ret) {

        }
    });
}