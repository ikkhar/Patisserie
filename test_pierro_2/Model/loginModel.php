<?php
session_start();
include ('../Class/Db.php');

if (isset($_POST['a']) && !empty($_POST['a']))
{
    $action = $_POST['a'];
    switch ($action)
    {
        case 'login':
            echo json_encode(login());
            break;

    }
}

function login()
{
    if (isset($_POST['user']) && !empty($_POST['user']))
    {
        $user = $_POST['user'];
        if (isset($_POST['pass']) && !empty($_POST['pass']))
        {
            $pass = $_POST['pass'];

            global $pdo;
            $query = "SELECT * FROM login WHERE nom = '" . $user . "'";

            $q = $pdo->prepare($query);
            if ($q->execute())
            {
                if ($q->rowCount() === 1)
                {
                    $resultat = $q->fetch(PDO::FETCH_ASSOC);
                    $mdp = $resultat["motdepasse"];

                    if (password_verify($pass, $mdp))
                    {

                        $_SESSION['id'] = $resultat["id"];
                        $_SESSION['satus'] = $resultat["status"];
                        return ["login" => true];
                    }
                    return ["login" => false, "errno" => 0];

                }
                return ["login" => false, "errno" => 1];
            }
            return ["login" => false, "errno" => 2];
        }
        return ["login" => false, "errno" => 3];
    }

    return ["login" => false, "errno" => 4];
}

