<?php
include "../Class/Db.php";

class Magasin
{
    private $_id;
    private $_nom;
    private $_type;
    private $_recette;
    private $_farine;
    private $_patissierId;

    /**
     * Magasin constructor.
     * @param $_id
     * @param $_nom
     * @param $_type
     * @param $_recette
     * @param $_farine
     * @param $_patissierId
     */
    public function __construct($_id, $_nom, $_type, $_recette, $_farine, $_patissierId)
    {
        $this->_id = $_id;
        $this->_nom = $_nom;
        $this->_type = $_type;
        $this->_recette = $_recette;
        $this->_farine = $_farine;
        $this->_patissierId = $_patissierId;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->_nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->_nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->_type = $type;
    }

    /**
     * @return mixed
     */
    public function getRecette()
    {
        return $this->_recette;
    }

    /**
     * @param mixed $recette
     */
    public function setRecette($recette)
    {
        $this->_recette = $recette;
    }

    /**
     * @return mixed
     */
    public function getFarine()
    {
        return $this->_farine;
    }

    /**
     * @param mixed $farine
     */
    public function setFarine($farine)
    {
        $this->_farine = $farine;
    }

    /**
     * @return mixed
     */
    public function getPatissierId()
    {
        return $this->_patissierId;
    }

    /**
     * @param mixed $patissierId
     */
    public function setPatissierId($patissierId)
    {
        $this->_patissierId = $patissierId;
    }

    public static function getAllrecetteFromBd()
    {
        global $pdo;

        $liste = [];
        $q = $pdo->prepare('SELECT * FROM magasin ');
        if ($q->execute())
        {
            $resultat = $q->fetchAll(PDO::FETCH_OBJ);

            foreach ($resultat as $key => $recette)
            {

                $liste[$key]['id'] = $recette->id;

                if (is_null($recette->nom))
                {
                    $liste[$key]['nom'] = '-';
                }
                else
                {
                    $liste[$key]['nom'] = $recette->nom;
                }
                if (is_null($recette->type))
                {
                    $liste[$key]['type'] = '-';
                }
                else
                {
                    $liste[$key]['type'] = $recette->type;
                }
                if (is_null($recette->recette))
                {
                    $liste[$key]['recette'] = '-';
                }
                else
                {
                    $liste[$key]['recette'] = $recette->recette;
                }
                if (is_null($recette->farine))
                {
                    $liste[$key]['farine'] = '-';
                }
                else
                {
                    $liste[$key]['farine'] = $recette->farine;
                }
                if (is_null($recette->patissierId))
                {
                    $liste[$key]['patissierId'] = '-';
                }
                else
                {
                    $liste[$key]['patissierId'] = $recette->patissierId;
                }
            }

            return $liste;
        }

    }

    public static function DeleteRecetteFromBd($id)
    {
        global $pdo;
        $sql = "DELETE FROM magasin WHERE id = $id";
        $q = $pdo->prepare($sql);
        if ($q->execute())
        {
            return true;
        }
        return false;
    }

    public static function insertRecetteFromBd($nom, $type, $recette, $farine, $patissierId)
    {
        global $pdo;
        $sql = "INSERT INTO magasin (nom, type, recette, farine, patissierId) VALUES (:nom, :type, :recette, :farine, :patissierId)";
        $q = $pdo->prepare($sql);
        $q->bindParam(':nom', $nom, PDO::PARAM_STR);
        $q->bindParam(':type', $type, PDO::PARAM_STR);
        $q->bindParam(':recette', $recette, PDO::PARAM_STR);
        $q->bindParam(':farine', $farine, PDO::PARAM_STR);
        $q->bindParam(':patissierId', $patissierId, PDO::PARAM_INT);
        if ($q->execute())
        {
            return true;
        }
        return false;
    }

    public static function getOneRecetteById($editId)
    {
        global $pdo;

        $q = $pdo->prepare("SELECT * FROM magasin where id = $editId");
        if ($q->execute())
        {
            return $resultat = $q->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }

    public static function updateRecetteFromBd($id, $nom, $type, $recette, $farine, $patissierId)
    {
        global $pdo;

        $sql = "UPDATE magasin SET nom = :nom, type = :type, recette = :recette,  farine = :farine,  patissierId = :patissierId  WHERE id = $id";

        $q = $pdo->prepare($sql);
        $q->bindParam(':nom', $nom, PDO::PARAM_STR);
        $q->bindParam(':type', $type, PDO::PARAM_STR);
        $q->bindParam(':recette', $recette, PDO::PARAM_STR);
        $q->bindParam(':farine', $farine, PDO::PARAM_STR);
        $q->bindParam(':patissierId', $patissierId, PDO::PARAM_INT);
        if ($q->execute())
        {
            return true;
        }
        return false;
    }

}

