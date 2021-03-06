let esiste = "";
$(document).ready(function() {
    $("#registerbut").click(function(event) {
        //al click del button "registerbut" vengono presi i valori dai campi input del register
        //e vengono mandati al php tramite la function ajax_call_php_register se i campi non sono vuoti
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
        //al click del button "loginbt" vengono presi i valori dai campi input del login
        //e vengono mandati al php tramite la function ajax_call_php_login se i campi non sono vuoti
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
        //al click del button "admin_login_bt" vengono presi i valori dai campi input del log adm
        //e vengono mandati al php tramite la function ajax_call_php_login_admin se i campi non sono vuoti
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
        //dopo aver inserito i valori per inserire un nuovo film, al click del button "bt_film", si scatena la
        //function ajax_call_films_add che carica i dati nella table films del DB cinema
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

    $("#bt_film_new").click(function(event) {
        //modifica un film inserito e salvato nel DB in precedenza, apportando le nuove modifiche nel DB
        var img_film_start = $("#imgtosave_new").val();
        var img_film_ok = img_film_start.replace(/[\:/\\]/g, '');
        var img_film_final_new = img_film_ok.replace('Cfakepath', '');
        var titolo_new = $("#titolo_new").val();
        var genere_new = $("#genere_new").val();
        var data_uscita_new = $("#data_uscita_new").val();
        var orario0_new = $("#orario0_new").val();
        var orario1_new = $("#orario1_new").val();
        var orario2_new = $("#orario2_new").val();
        var descrizione_new = $("#descrizione_new").val();
        var durata_new = $("#durata_film_new").val();

        if (!$('#titolo_new').val() & !$('#genere_new').val() & !$('#orario0_new').val() & !$('#descrizione_new').val() & !$('#durata_new').val()) {
            alert('Aweee i campi sono vuoti');
        } else {
            ajax_call_edit_film2(titolo_new, genere_new, data_uscita_new, orario0_new, orario1_new, orario2_new, descrizione_new, durata_new, img_film_final_new);
        }
    });



    $('#log_out').click(function(event) {
        //al click di "log_out" per un user si riporta il valore del COOCKIE  a 0 e l'utente viene indirizzato alla pagina iniziale
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
        //al click di "log_out_admin" per un admin si riporta il valore del COOCKIE  a 0 e l'admin viene indirizzato alla pagina iniziale
        //rispetto alla pagina di controllo home.php
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
        //al click del button "bt_show_add_film" diventer?? visibile solo il div "addfilm", mentre tutti gli altri rimarranno nascosti
        $("#addfilm").css("display", "block");
        $("#removefilm").css("display", "none");
        $("#Tablefilms").css("display", "none");
        $("#usertable").css("display", "none");
        $("#updatefilm").css("display", "none");
        $("#table_orders").css("display", "none");



    });
    $("#bt_show_remove_film").click(function(event) {
        //al click del button "bt_show_remove_film" diventeranno visibili solo i div "removefilm" e "Tablefilms", 
        //mentre tutti gli altri rimarranno nascosti
        $("#addfilm").css("display", "none");
        $("#usertable").css("display", "none");
        $("#removefilm").css("display", "block");
        $("#Tablefilms").css("display", "block");
        $("#updatefilm").css("display", "none");
        $("#table_orders").css("display", "none");



    });
    $("#bt_show_user").click(function(event) {
        //al click del button "bt_show_user" diventer?? visibile solo il div "usertable", mentre tutti gli altri rimarranno nascosti
        $("#addfilm").css("display", "none");
        $("#removefilm").css("display", "none");
        $("#Tablefilms").css("display", "none");
        $("#usertable").css("display", "block");
        $("#updatefilm").css("display", "none");
        $("#table_orders").css("display", "none");

        //tramite questa chiamata ajax si crea una tabella con id, nome e mail di tutti gli utenti registrati al sito
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
                $("#usertable").html(html_append);

            },
            error: function(ret) {

            }
        });
    });

    $("#bt_show_orders").click(function(event) {
        //al click del button "bt_show_orders" diventer?? visibile solo il div "table_orders", mentre tutti gli altri rimarranno nascosti
        $("#addfilm").css("display", "none");
        $("#removefilm").css("display", "none");
        $("#Tablefilms").css("display", "none");
        $("#usertable").css("display", "none");
        $("#updatefilm").css("display", "none");
        $("#table_orders").css("display", "block");

        //tramite questa chiamata ajax si crea una tabella con id_ordine, id_utente, id_film, posto e orario di tutte le 
        //prenotazioni fatte dagli utenti per un film
        $.ajax({
            type: "POST",
            url: "./php/select_ordine.php",
            success: function(ret) {
                const ordine = ret.split("|");
                //console.log(ordine);
                var html_append = "";
                html_append += "<table class=\"table\" style=\"border: 1px solid black;\"><tr><td style=\"border: 1px solid black;\">ID ORDINE</td><td style=\"border: 1px solid black;\">ID UTENTE</td><td style=\"border: 1px solid black;\">ID FILM</td><td style=\"border: 1px solid black;\">POSTO</td><td style=\"border: 1px solid black;\">ORARIO</td></tr>";

                for (var i = 0; i < ordine.length - 1; i++) {
                    const campi = ordine[i].split(",")
                    html_append += "<tr><td style=\"border: 1px solid black;>" + campi[0] + "</td><td style=\"border: 1px solid black;\" >" + campi[0] + "</td><td style=\"border: 1px solid black;\">" + campi[1] + "</td><td style=\"border: 1px solid black;\">" + campi[2] + "</td><td style=\"border: 1px solid black;\">" + campi[3] + "</td><td style=\"border: 1px solid black;\">" + campi[4] + "</td></tr>";
                    console.log(campi);
                }
                $("#table_orders").html(html_append);

            },
            error: function(ret) {

            }
        });
    });
    $("#bt_ordine").click(function() {
        //al click del button "bt_ordine" viene attivata la function ajax_call_order, atta a  registrare la prenotazione nel DB
        dati = $("#bt_ordine").val() + "|" + String(i);
        data = dati.split("|");

        ajax_call_order(data[2], data[0], data[3], data[1]);

    });


});

//funzione che manda mail di conferma
function sendmail() {
    Email.send({
        SecureToken: '63a34a4d-dac3-4f0d-a569-f865f9e835ed',
        To: client_email,
        From: 'lorenzoptg0@gmail.com',
        Subject: 'HAPPY-CINEMA [POSTO RISERVATO]',
        Body: 'Il tuo ordine ?? stato confermato con successo'
    }).then(
        client_email => alert(client_email)
    );
}


function show_posti_occupati(n_posto) {
    //mostra i posti occupati oscurandoli in rosso
    dati = $("#bt_ordine").val() + "|" + String(i);
    test = dati.split("|");

    var data = {};
    data.posto = test[3];
    data.film = test[0];
    data.orario = test[1];
    $.ajax({
        type: "POST",
        url: "./php/posti_occupati.php",
        data: data,
        success: function(ret) {
            //console.log(ret);
            butdis = ret.split(';');
            //console.log(butdis);
            for (var f = 0; f < butdis.length - 1; f++) {
                $('#' + butdis[f] + '').prop('disabled', true);
                $('#' + butdis[f] + '').css("background-color", "#fa6472");

            }
        },
        error: function(ret) {

        }
    });
}


function ajax_call_order(id_utente_cs, id_film_cs, n_posto, orario_sc) {
    //memorizza la prenotazione nel DB
    var data = {};
    data.utente = id_utente_cs;
    data.film = id_film_cs;
    data.posto = n_posto;
    data.orario = orario_sc;

    $.ajax({
        type: "POST",
        url: "./php/ordine_confermato.php",
        data: data,
        success: function(ret) {
            console.log(ret);
            window.open("index.php", "_self");

        },
        error: function(ret) {

        }
    });
}


function ajax_call_ciao_film(id_film) {
    //mostra una table con tutti i campi del film che si vuole modificare
    var data = {};
    data.id = id_film;
    //console.log(data);
    $("#usertable").css("display", "block");

    $.ajax({
        type: "POST",
        url: "./php/film_edit.php",
        data: data,
        success: function(ret) {
            console.log(ret);
            const nome = ret.split('|');
            //console.log(nome)
            var length = nome.length;
            var html_append = "";

            html_append += '<table  class=\'table\' style=\'border: 1px solid black;\'><tr><td style=\'border: 1px solid black;\'>ID</td><td style=\'border: 1px solid black;\'>Titolo</td><td style=\'border: 1px solid black;\'>Genere</td><td style=\'border: 1px solid black;\'>Data_uscita</td><td style=\'border: 1px solid black;\'>orario1</td><td style=\'border: 1px solid black;\'>orario2</td><td style=\'border: 1px solid black;\'>orario3</td><td style=\'border: 1px solid black;\'>descrizione</td><td style=\'border: 1px solid black;\'>Durata_film</td><td style=\'border: 1px solid black;\'>Img_name</td></tr>';

            for (var i = 0; i < length - 1; i++) {
                const campi = nome[i].split(';')
                    //console.log(campi);
                html_append += '<tr><td style=\'border: 1px solid black;\'>' + campi[0] + '</td><td style=\'border: 1px solid black;\' >' + campi[1] + '</td><td style=\'border: 1px solid black;\' >' + campi[2] + '</td><td style=\'border: 1px solid black;\' >' + campi[3] + '</td><td style=\'border: 1px solid black;\' >' + campi[4] + '</td><td style=\'border: 1px solid black;\' >' + campi[5] + '</td><td style=\'border: 1px solid black;\' >' + campi[6] + '</td><td style=\'border: 1px solid black;\' >' + campi[7] + '</td><td style=\'border: 1px solid black;\' >' + campi[8] + '</td><td style=\'border: 1px solid black;\' >' + campi[9] + '</td></tr>';
            }

            html_append += '</table>';

            $('#usertable').html(html_append);
            $("#updatefilm").css("display", "block");


        },
        error: function(ret) {

        }
    });
}

function ajax_call_edit_film2(titolo_new, genere_new, data_uscita_new, orario0_new, orario1_new, orario2_new, descrizione_new, durata_new, img_film_final_new) {
    //acchiappa e manda al file modifica_film.php i nuovi dati del film per effettuare l'UPLOAD
    var data = {};
    data.titolo_new = titolo_new;
    data.genere_new = genere_new;
    data.data_uscita_new = data_uscita_new;
    data.orario0_new = orario0_new;
    data.orario1_new = orario1_new;
    data.orario2_new = orario2_new;
    data.descrizione_new = descrizione_new;
    data.durata_new = durata_new;
    data.img_film_new = img_film_final_new;

    $.ajax({
        type: "POST",
        url: "./php/modifica_film.php",
        data: data,
        success: function(ret) {
            console.log(ret);
            if (ret == "ok") {
                $("#boxalert").html("<div id='tempalert' class='alert alert-success'>[INFO] Film modificato con successo!</div>");
                removealert();
                $("#updatefilm").css("display", "none");
            } else {
                $("#boxalert").html("<div id='tempalert' class='alert alert-warning'>[ERROR] Il film non pu?? essere modificato!</div>");
                removealert();
            }
        },
        error: function(ret) {

        }
    });
}


function orario_scelto(id) {
    //alert("mando dati scelti alla pagina");
    //qui va fatta la apertura della scelta posti
    const dati = id.split("|");
    var data = {};
    data.id = dati[0];
    data.orario = dati[1];


    $.ajax({
        type: "POST",
        url: "./php/select_film.php",
        data: data,
        success: function(ret) {
            console.log(ret);
            //qui gli devi mandare le info che servono per fare la prenotazione
            //fai la post al file chose_set e preleva i dati dal file
            $.post("./Chose_set.php", data);
            window.open("./Chose_set.php", "_self");
        },
        error: function(ret) {

        }
    });
}

function button(id) {
    //cambia lo sfondo del button a seconda che il posto sia prenotato, disponibile o selezionato
    var j = 0;
    var e = 0;
    var bottone = document.getElementById(id);
    elimina = false;
    if (i == 0) {
        i = id;
    } else {
        i += ";" + id;
    }
    $("button#" + id + ".tim").css("background-color", "#ffffff8c");
    console.log(i);
    //console.log("i: " + i);
    var split = i.split(";");
    for (j = 0; j < split.length - 1; j++) {
        if (split[j] == id) {
            elimina = true;

        }
    }
    if (elimina == true) {
        for (j = 0; j < split.length - 2; j++) {
            if (e == 0) {
                e = split[j];
            } else {
                e += ";" + split[j];
            }
        }
        i = e;
        //console.log("i: " + i);
        $("button#" + id + ".tim").css({ backgroundColor: 'rgba(0, 255, 255, 0.014)' });
    }
}

var i = 0;

function show_posti() {
    //crea una table attraverso un for con all'interno tutti i button per selezionare i posti
    var par = $("#table").html("");
    var i = 0;
    var j = 0;
    var id = 1;
    var append = " <table> ";
    for (j = 0; j < 7; j++) {
        append += "<tr>";
        for (i = 0; i < 7; i++) {
            append += "<th> <button type = 'button' class='tim' id = " + id + " onclick='button(id) '> <img src='./img/Posto.png' height='40' > </button> </th>";
            id++;
        }
        append += "</tr>"
    }
    append += "</table>";
    par.append(append);
}


function showFilms() {
    //crea una table con id e titolo dei film gi?? esistenti nel momento in cui clicchi add film nella schermata di admin
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
    //alert temporizzati
    window.setTimeout(function() {
        $("#tempalert").fadeTo(1000, 0).slideUp(1000, function() {
            $(this).remove();
        });
    }, 400);

}

function ajax_call_remove_film(id_film) {
    //rimuove un film 
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
    //nella pagina principale cerca un film facendo un controllo sulle iniziali e lo mette in sovraimpressione
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

function ajax_call_films_add(titolo, genere, data_uscita, orario0, orario1, orario2, descrizione, durata_film, img_film_final) {
    //acchiappa i valori inseriti nel form di insert film e li salva nel DB come nuovo film
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
    //effettua la registrazione di un nuovo utente nel DB
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
    //function di login admin che reindirizza alla pagina di admin (home.php)
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
                $("#paragrafoerror").html("<div id='tempalert' class='alert alert-warning'>Utente non esistente! Effettua il login</div>");
                removealert();
            }
        },
        error: function(ret) {

        }
    });
}


function ajax_call_php_login(client_email, client_passw) {
    //function di login utente
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