<!doctype html>
<html lang="it">

<head>
    <!-- modifica di prova -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="./img/Favico.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/login.js"></script>
    <script>
        function showcard(){
            $.ajax({
            type: "POST",
            url: "./php/films.php",

            success: function(ret) {
                //console.log(ret)
                const nome = ret.split("|");
                //console.log(nome)
                var length = nome.length;
                var html_append = "";
                var card = "";

                $("#card").html("");

                for (var i = 0; i < length - 1; i++) {
                    const campi = nome[i].split(";")
                    card += "<div class='card'class='filter' data-string='" + campi[1] + "'><img class='card-img-left' src='./images/" + campi[9] + "' alt='Card image cap'><div class='card-body'><h1 class='card-title'>" + campi[1] + "</h1><h4>Genere : " + campi[2] + "</h4><h5 class='card-text'>" + campi[7] + "</h5><button class='orariobutton' id='"+campi[0]+"|"+campi[4]+"' onclick=orario_scelto(this.id)>" + campi[4] + "</button><button class='orariobutton' id='"+campi[0]+"|"+campi[5]+"' onclick=orario_scelto(this.id)>" + campi[5] + "</button><button class='orariobutton' id='"+campi[0]+"|"+campi[6]+"' onclick=orario_scelto(this.id)>" + campi[6] + "</button></div><div class='card-footer'><small class='text-muted'>Durata Film : " + campi[8] + " minuti</small></div></div>";
                }
                //console.log(nome);
                html_append += "</table>";
                $("#card").append(card);
            },
            error: function(ret) {

            }
        });
        }
        
    </script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/mystyle.css">
    <title>Happy Cinema</title>
</head>

<body onload="showcard()">
    <nav class="navbar fixed-top navbar-light">
        <a class="navbar-brand" href="index.php"><img src="./img/Logo-Happy-Network.png" alt="" width="190px" srcset=""></a>
        <div class="d-flex justify-content-end">
        <?php
            session_start();
            if($_SESSION["email"] != null){
                echo  "<div class='container-fluid'> 
                <div class='btn-group' role='group'>
                    <button id='btnGroupDrop1' type='button' class='btn dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>
                  <img src='./img/utente.png' id='imguser' alt=''><b>".$_COOKIE['nome']."
                </b></button>
                    <ul class='dropdown-menu' aria-labelledby='btnGroupDrop1'>
                        <li>
                            <button class='navbar-toggler' type='button' data-bs-toggle='offcanvas' id='log_out'>
                                <span>
                                    <h5>Log Out</h5>
                                </span>
                            </button>
                        </li>
                        <br>
                        <li>
                            <button id='my_orders' class='navbar-toggler' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasorders' aria-controls='offcanvasNavbar'>
                                <span>
                                    <h5>My Orders</h5>
                                </span>
                            </button>
                        </li>
                        
                    </ul>
                </div>";
             }
            ?>
            <?php
            session_start();
            if($_SESSION["email"] == null){
                echo "<div class='container-fluid'> 
                <div class='btn-group' role='group'>
                    <button id='btnGroupDrop1' type='button' class='btn dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>
                  <img src='./img/utente.png' id='imguser' alt=''> Log In
                </button>
                    <ul class='dropdown-menu' aria-labelledby='btnGroupDrop1'>
                        <li>
                            <button class='navbar-toggler' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvaslogin' aria-controls='offcanvasNavbar'>
                                <span>
                                    <h5>Log In</h5>
                                </span>
                            </button>
                        </li>
                        <br>
                        <li>
                            <button class='navbar-toggler' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasregister' aria-controls='offcanvasNavbar'>
                                <span>
                                    <h5>Register</h5>
                                </span>
                            </button>
                        </li>
                        <br>
                        <li>
                            <button class='navbar-toggler' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvaslogin_admin' aria-controls='offcanvasNavbar'>
                                <span>
                                    <h5>Log Admin</h5>
                                </span>
                            </button>
                        </li>
                    </ul>
                </div>";
             }
             ?>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span>
                <img src="./img/ricerca.png" width="40px" alt="">
            </span>
          </button>
        </div>
        <div class="offcanvas offcanvas-end d-flex" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item dropdown">
                        <div class="d-flex justify-content-center">
                            <form class="d-flex">
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                                <input class="filter" type="search" placeholder="Search" aria-label="Search" id="isearch">
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="offcanvas offcanvas-end d-flex" tabindex="-1" id="offcanvaslogin" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item dropdown">
                        <div class="d-flex justify-content-center">
                            <form id="loginmenu" required>
                                <input type="email" class="form-control" placeholder="Email" aria-label="Email" id="client_email" aria-describedby="basic-addon1" required><br>
                                <input type="password" id="client_pass" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" required><br>
                                <button type="submit" id="loginbut" class="btn btn-primary">Login</button>
                                <div id="boxalert"></div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="offcanvas offcanvas-end d-flex" tabindex="-1" id="offcanvasorders" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item dropdown">
                        <div class="d-flex justify-content-center">
                            <form id="orders" required>
                                <h1>ORDINI EFFETTUATI</h1>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="offcanvas offcanvas-end d-flex" tabindex="-1" id="offcanvasregister" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item dropdown">
                        <div class="d-flex justify-content-center">
                            <form id="registermenu">
                                <input type="name" class="form-control" placeholder="Nome" aria-label="Nome" id="client_name_register" aria-describedby="basic-addon1" required><br>
                                <input type="name" class="form-control" placeholder="Cognome" aria-label="Nome" id="client_surname_register" aria-describedby="basic-addon1" required><br>
                                <input type="email" class="form-control" placeholder="Email" aria-label="Username" id="client_email_register" aria-describedby="basic-addon1" required><br>
                                <input type="password" id="client_pass_register" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" required><br>
                                <button type="button" id="registerbut" class="btn btn-primary">Register</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="offcanvas offcanvas-end d-flex" tabindex="-1" id="offcanvaslogin_admin" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item dropdown">
                        <div class="d-flex justify-content-center">
                            <form id="login_admin_menu" method="POST" enctype="multipart/form-data" action="save_to_cookie.php">
                                <input type="text" class="form-control" placeholder="Id" aria-label="id" id="id_admin" aria-describedby="basic-addon1" required><br>
                                <input type="password" id="admin_pass" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" required><br>
                                <button type="button" id="admin_login_bt" class="btn btn-primary">Admin Login</button>
                                <div id="paragrafoerror"></div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="content" class="d-flex flex-row justify-content-center flex-wrap container-fluid ">
        <div id="card"></div>
    </div>
    <footer class="footer">
        <div class="text-center text-dark footer">
            ?? 2021 Copyright:
            <a class="text-dark " href="https://www.happy-network.eu/ ">HappyCinema.com</a>
        </div>
    </footer>

    <!--Funzione per la ricerca delle card nella index page -->
    <script type="text/javascript">
        $(".filter").on("keyup", function() {
            var input = $(this).val().toUpperCase();
            var visibleCards = 0;
            var hiddenCards = 0;

            $(".container").append($("<div class='card-group card-group-filter'></div>"));


            $(".card").each(function() {
                if ($(this).data("string").toUpperCase().indexOf(input) < 0) {

                    $(".card-group.card-group-filter:first-of-type").append($(this));
                    $(this).hide();
                    hiddenCards++;

                } else {

                    $(".card-group.card-group-filter:last-of-type").prepend($(this));
                    $(this).show();
                    visibleCards++;

                    if (((visibleCards % 4) == 0)) {
                        $(".container").append($("<div class='card-group card-group-filter'></div>"));
                    }
                }
            });

            $(".card-group").each(function() {
                if ($(this).find("div").length == 0) {
                    $(this).remove();
                }
            })
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p " crossorigin="anonymous "></script>

</body>

</html>