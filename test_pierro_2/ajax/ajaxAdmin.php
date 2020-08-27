<?php
require "../Class/Patissier.php";

if (isset($_POST['a']) && !empty($_POST['a']))
{
    $action = $_POST['a'];
    switch ($action)
    {
        case 'getAllPatissier':
            echo json_encode(getAllPatissier());
            break;
        case 'supprimer_patissier':
            echo json_encode(supprimer_patissier());
            break;
        case 'ajouter_patissier':
            echo json_encode(ajouter_patissier());
            break;
        case 'infos_patissier':
            echo json_encode(infos_patissier());
            break;
        case 'editer_patissier':
            echo json_encode(editer_patissier());
            break;

    }
}

function getAllPatissier()
{
    return $retour = Patissier::getAllPatissier();
    //$listePatissier = Magasin::getAllrecetteFromBd();
    //foreach ($retour as $k => $recette) {
    //$retour['id'][$k] = $recette['id'];
    //$retour['nom'][$k] = $recette['nom'];
    //$retour['type'][$k] = $recette['type'];
    //$retour['recette'][$k] = $recette['recette'];
    //$retour['patissierId'][$k] = $recette['patissierId'];
    //$retour['nomPatissier'][$k] = $recette['patissierId'];
    //    }
    //var_dump($retour);
    //return $retour;

}

function supprimer_patissier()
{
    if (isset($_POST['id']) && !empty($_POST['id']))
    {
        $id = $_POST['id'];
        return $retour = Patissier::DeletePatissier($id);
    }
    return false;
}

function ajouter_patissier()
{

    if (isset($_POST['nom']) && !empty($_POST['nom']))
    {
        $nom = $_POST['nom'];
        if (isset($_POST['status']) && !empty($_POST['status']))
        {
            $status = $_POST['status'];
            if (isset($_POST['motDePasse']) && !empty($_POST['motDePasse']))
            {
                $motDePasse = $_POST['motDePasse'];
            }

        }
        else
        {
            return false;
        }
        return $retour = Patissier::insertPatissier($nom, $status, $motDePasse);
    }
}

function infos_patissier()
{

    if (isset($_POST['id']) && !empty($_POST['id']))
    {
        $id = $_POST['id'];
        return $retour = Patissier::getOnePatissierById($id);
    }
    return false;
}

function editer_patissier()
{
    if (isset($_POST['id']) && !empty($_POST['id']))
    {
        $id = $_POST['id'];
        if (isset($_POST['nom']) && !empty($_POST['nom']))
        {
            $nom = $_POST['nom'];
            if (isset($_POST['status']) && !empty($_POST['status']))
            {
                $status = $_POST['status'];

            }

        }
    }
    else
    {
        return false;
    }
    return $retour = Patissier::updatePatissier($id, $nom, $status);
}

