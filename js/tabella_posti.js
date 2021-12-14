$(document).ready(function() {       
    var par = $("#table").html("");
    var i = 0;
    var j = 0;
    var id = 1;
    var append = " <table> ";
    for (j = 0; j < 7; j++) {
        append += "<tr>";
        for (i=0 ; i < 7; i++) {
            append += "<th> <button type = 'button' id = " + id + " onclick='button(id) '> <img src='../img/poltrona.png' height='40' > </button> </th>";
            id++;
        }
        append += "</tr>"  
    }
    append += "</table>";
    for (i = 0; i < 49; i++){
        $("#" + id).addEventListner
    }
    par.append(append);
});
var i = 0;
function button(id) {
    var bottone = document.getElementById(id);
    if (i == 0) {
        i = id;
    } else {
        i += ";" + id;
    }
    console.log(i);
    bottone.disabled = true;
        /*if (bottone.click) {
            bottone.disabled = true;
            n_posti--;
            if (n_posti == 0) {
                confirm = ("Prenotare i seguenti posti? " + i[n_posti]);
            }
        }*/
}
        //bottone.type = "submit";
        //bottone.disabled = true;
        //bottone.type = "submit";

