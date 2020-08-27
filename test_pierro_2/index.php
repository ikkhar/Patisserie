<?php
session_start();
include ('Class/Db.php');
if (!empty($_SESSION['id']))
{
    header('location: crud.php');
}
else
{ ?>

    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Patisserie</title>
        <link rel="stylesheet" href="style.css" type="text/css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    </head>

    <header>
        <h1 class="mb-0">TP AABAS</h1>
    </header>
    <main class="container d-flex justify-content-center align-items-center">
        <body id="body_bg">
        <div class="container d-flex justify-content-center align-items-center mainArea">
            <div class="form-container col-md-8 col-sm-11 text-center cadre">
                <div align="center">
                    <h3>Boulangerie-Patisserie</h3>
                    <div id="login-form" >
                        <p class="text-danger errorlogin"></p>
                        <label for="patissier">Patissier</label>
                        <input class ="form-control inUser" type="text" name="patissier" id="user_id">
                        <label for="motdepasse">Mot de passe</label>
                        <input class ="form-control inPass" type="password" name="motdepasse" id="user_pass">
                        <button id="" class="btn-login btn btn-sm btn-primary my-3">Log in</button>

                    </div>
                </div>
            </div>
        </div>
        </body>
    </main>

    <footer>
        <p class="mb-0">Pierre</p>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="./Js/login.js"></script>
    <script type="text/javascript" charset="utf8" src="./Js/crud.js"></script>
    </html>

    <?php
}
?>
