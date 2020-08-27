<?php
session_start();
if (empty($_SESSION['id']))
{
    header('Location: index.php');

}
else
{
    ?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Patisserie</title>

        <link rel="stylesheet" href="style.css" type="text/css"  />

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <style>

        </style>
    </head>

    <header>
        <div>
            <h1 class="mb-0">TP AABAS</h1>
            <a id="deco" href="Views/logOut.php"><p>Déconexion</p></a>
            <?php
            if ($_SESSION['id'] == 1){
                ?> <a href="crudAdmin.php" class="float-left ml-3 "><p class="crudPat">Gestion des patissiers</p></a>
                <?php
            };
            ?>
        </div>
    </header>
    <main>
        <div class="container d-flex justify-content-center align-items-center mainArea">
            <div class="form-container  text-center">
                <input id ="getIdSession" type="hidden" value="<?php echo $_SESSION['id']; ?>"
                <form method="post">
                    <h2>Liste patisserie</h2><hr/>
                </form>
                <button type="button" class="ajoutRec btn btn-primary btn-sm float-left mb-2" data-toggle="modal" data-target="#exampleModal">
                    Ajouter
                </button>
                <table id="datatable"></table>
            </div>

        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-column">
                            <div class="col mb-4">
                                <input type="text" class="form-control nom" name="nom" placeholder="Nom">
                            </div>
                            <div class="col mb-4">
                                <select id="inputState" class="form-control type" name="type">
                                    <option selected>Type</option>
                                    <option>Pain</option>
                                    <option>Patisserie</option>
                                </select>
                            </div>
                            <div class="col mb-4">
                                <input type="text" class="form-control recette" name="recette" placeholder="Recette">
                            </div>
                            <div class="col mb-4">
                                <input type="text" class="form-control farine" name="farine" placeholder="Farine">
                            </div>
                            <div class="col mb-4 patissierAjout">

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary ajouterRecette" data-dismiss="modal">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="myModal-edit" class="modal-edit">

            <!-- Modal content -->

            <div class="modal-content-edit">


                <form method="post">
                    <h2>Editer une recette</h2><hr/>
                    <div class="divCachee" hidden>This div is hidden</div>
                    <div class="form-column">
                        <div class="col mb-4">
                            <input type="text" class="form-control nomEditer" name="nom" placeholder="Nom">
                        </div>
                        <div class="col mb-4">
                            <select id="inputState" class="form-control typeEditer" name="type">
                                <option value="type">Type</option>
                                <option value="pain">Pain</option>
                                <option value="patisserie">Patisserie</option>
                            </select>
                        </div>
                        <div class="col mb-4">
                            <input type="text" class="form-control recetteEditer" name="recette" placeholder="Recette">
                        </div>
                        <div class="col mb-4">
                            <input type="text" class="form-control farineEditer" name="farine" placeholder="Farine">
                        </div>
                        <div class="col mb-4 patissierEditer">

                        </div>
                    </div>
                </form>
                <button class="btn btn-sm btn-success edit-Recette">Editer une recette</button>
                <button class="btn btn-sm btn-danger close-edit">Fermer</button>
            </div>

        </div>
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
    <script type="text/javascript" charset="utf8" src="./Js/crud.js"></script>


    </html>
    <?php
}