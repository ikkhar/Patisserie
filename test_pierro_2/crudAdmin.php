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
    </head>

    <header>
        <div>
            <h1 class="mb-0">TP AABAS</h1>
            <a id="deco" href="Views/logOut.php"><p>Déconexion</p></a>
            <?php
            if ($_SESSION['id'] == 1)
            {
                ?> <a href="crud.php" class="float-left ml-3 "><p class="crudPat">Liste recettes</p></a>
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
                    <h2>Liste patissier</h2><hr/>
                </form>
                <button type="button" class="btn btn-primary btn-sm float-left mb-2" data-toggle="modal" data-target="#exampleModalAdmin">
                    Ajouter
                </button>
                <table id="datatableAdmin"></table>
            </div>

        </div>
        <div class="modal fade" id="exampleModalAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <select id="inputState" class="form-control status" name="status">
                                    <option selected>Status</option>
                                    <option>Admin</option>
                                    <option>Patissier</option>
                                </select>
                            </div>
                            <div class="col mb-4">
                                <input type="password" class="form-control motDePasse" name="motDePasse" placeholder="Mot de passe">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary ajouterPatissier" data-dismiss="modal">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="myModal-editPat" class="editPat-modal">

            <!-- Modal content -->

            <div class="modal-content-edit">


                <form method="post">
                    <h2>Editer un patissier</h2><hr/>
                    <div class="divCachee" hidden>This div is hidden</div>
                    <div class="form-column">
                        <div class="col mb-4">
                            <input type="text" class="form-control nomEditerPat" name="nom" placeholder="Nom">
                        </div>
                        <div class="col mb-4">
                            <select id="inputState" class="form-control statusEditerPat" name="status">
                                <option value="status">Status</option>
                                <option value="Admin">Admin</option>
                                <option value="Patissier">Patissier</option>
                            </select>
                        </div>

                    </div>
                </form>
                <button class="btn btn-sm btn-success edit-Pat">Editer un patissier</button>
                <button class="btn btn-sm btn-danger close-editPat">Fermer</button>
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

    <script type="text/javascript" charset="utf8" src="./Js/crudAdmin.js"></script>


    </html>
    <?php
}

