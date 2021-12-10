$(document).ready(function() {
    $("#search").click(function(event) {
        var search = document.getElementById("isearch").value;
        var film = document.getElementsByClassName("card-title").value;
        alert(film);
    });
});