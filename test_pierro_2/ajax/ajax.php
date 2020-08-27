<?php
require "../Class/Magasin.php";
require "../Class/Patissier.php";

if (isset($_POST['a']) && !empty($_POST['a']))
{
    $action = $_POST['a'];
    switch ($action)
    {
        case 'getAllrecette':
            echo json_encode(getAllrecette());
            break;
        case 'supprimer_recette':
            echo json_encode(supprimer_recette());
            break;
        case 'ajouter_recette':
            echo json_encode(ajouter_recette());
            break;
        case 'infos_recette':
            echo json_encode(infos_recette());
            break;
        case 'editer_recette':
            echo json_encode(editer_recette());
            break;
        case 'liste_patissier':
            echo json_encode(liste_patissier());
            break;

    }
}

function liste_patissier()
{
    return $retour = Patissier::getAllPatissier();
}

function getAllrecette()
    {
    $retour = Magasin::getAllrecetteFromBd();
    $listePatissier = Patissier::getAllPatissier();
    foreach ($retour as $k => $recette) {

    $retour[$k]['id'] = $recette['id'];
    $retour[$k]['nom'] = $recette['nom'];
    $retour[$k]['type'] = $recette['type'];
    $retour[$k]['recette'] = $recette['recette'];
    $retour[$k]['patissierId'] = $recette['patissierId'];
    $retour[$k]['nomPatissier'] = "-";
        foreach ($listePatissier as $k2 => $infos_pat) {

            if ($infos_pat['id'] == $recette['patissierId'])
            $retour[$k]['nomPatissier'] = $infos_pat['nom'];
    }


    }

    return $retour;

}

function supprimer_recette()
{
    if (isset($_POST['id']) && !empty($_POST['id']))
    {
        $id = $_POST['id'];
        return $retour = Magasin::DeleteRecetteFromBd($id);
    }
    return false;
}

function ajouter_recette()
{
    if (isset($_POST['nom']) && !empty($_POST['nom']))
    {
        $nom = $_POST['nom'];
        if (isset($_POST['type']) && !empty($_POST['type']))
        {
            $type = $_POST['type'];
            if (isset($_POST['recette']) && !empty($_POST['recette']))
            {
                $recette = $_POST['recette'];
                if (isset($_POST['farine']) && !empty($_POST['farine']))
                {
                    $farine = $_POST['farine'];
                    if (isset($_POST['patissier']) && !empty($_POST['patissier']))
                    {
                        $nom = $_POST['nom'];
                        if (isset($_POST['nom']) && !empty($_POST['nom']))
                        {
                            $patissier = $_POST['patissier'];
                        }
                    }
                }
            }
        }
    }
    else
    {
        return false;
    }
    return $retour = Magasin::insertRecetteFromBd($nom, $type, $recette, $farine, $patissier);
}

function infos_recette()
{
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $retour = Magasin::getOneRecetteById($id);
        $listePatissier = Patissier::getAllPatissier();
        $retour['nomPatissier'] = $listePatissier;



        return $retour;

    }
}
    function editer_recette()
    {
        if (isset($_POST['nom']) && !empty($_POST['nom'])) {
            $nom = $_POST['nom'];
            if (isset($_POST['type']) && !empty($_POST['type'])) {
                $type = $_POST['type'];
                if (isset($_POST['recette']) && !empty($_POST['recette'])) {
                    $recette = $_POST['recette'];
                    if (isset($_POST['farine']) && !empty($_POST['farine'])) {
                        $farine = $_POST['farine'];
                        if (isset($_POST['patissier']) && !empty($_POST['patissier'])) {
                            $nom = $_POST['nom'];
                            if (isset($_POST['nom']) && !empty($_POST['nom'])) {
                                $patissierId = $_POST['patissier'];
                            }
                            if (isset($_POST['id']) && !empty($_POST['id'])) {
                                $id = $_POST['id'];
                            }
                        }
                    }
                }
            }
        }
        else
            {
            return false;
        }
        return $retour = Magasin::updateRecetteFromBd($id, $nom, $type, $recette, $farine, $patissierId);
    }


