var n_posti = prompt ("Inserisci il numero dei posti da prenotare");
$(document).ready(function() {
    
    var par = $("#table").html("");
    var i = 0;
    var j = 0;
    var id = 1;
    var append = " <table> ";
    for (j = 0; j < 7; j++) {
        append += "<tr>";
        for (i=0 ; i < 7; i++) {
            append += "<th> <button type = 'submit'  id = " + id + " onclick='button(id) '> <img src='../img/poltrona.png' height='40' > </button> </th>";
            id++;
        }
        append += "</tr>"  
    }
    append += "</table>";
    par.append(append);
    
});

function button(id) {
        var bottone = document.getElementById(id);
        if (bottone.click) {
            bottone.disabled = true;
            n_posti--;
            if (n_posti < 1) {
                bottone.type = "submit";
            }
        }
}
        //bottone.type = "submit";
        //bottone.disabled = true;
