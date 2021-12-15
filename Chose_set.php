<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="./css/Postistyle.css">
        
        <script>
            $(document).ready(function() {       
            var par = $("#table").html("");
            var i = 0;
            var j = 0;
            var id = 1;
            var append = " <table> ";
            for (j = 0; j < 7; j++) {
                append += "<tr>";
                for (i=0 ; i < 7; i++) {
                    append += "<th> <button type = 'button' class='tim' id = " + id + " onclick='button(id) '> <img src='./img/poltrona.png' height='50' > </button> </th>";
                    id++;
                }
                append += "</tr>"  
            }
            append += "</table>";
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
                $("#" + id).css("background","red");
            }
        </script>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>Hello, world!</title>
    </head>
    <body>
    
        <div align="center" id="table"></div>
        <button type="button" class="btn btn-primary">Primary</button>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>