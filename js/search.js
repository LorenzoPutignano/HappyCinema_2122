$(document).ready(function() {
    $("#search").click(function(event) {
        var search = $("#isearch").val();
        //var search = document.getElementById("isearch").value;
        //var film = document.getElementsByClassName("card-body");
        //var f = document.getElementsByClassName("card-title");
        ajax_search_film(search);
    });
});

function ajax_search_film(search) {
    var data = {};
    data.titolo = search;
    console.log(data);

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