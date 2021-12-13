$(document).ready(function() {
    $("#search").click(function(event) {
        var search = document.getElementById("isearch").value;
        var film = document.getElementsByClassName("card-body");
        var f = document.getElementsByClassName("card-title");
        alert(f);
    });
});