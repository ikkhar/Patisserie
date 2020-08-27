<?php
include "../Class/Db.php";

class Patissier
{
    private $_id;
    private $_nom;
    private $_status;

    /**
     * Patissier constructor.
     * @param $_id
     * @param $_nom
     * @param $_status
     */
    public function __construct($_id, $_nom, $_status)
    {
        $this->_id = $_id;
        $this->_nom = $_nom;
        $this->_status = $_status;
    }

    /**
     * Patissier constructor.
     * @param $_id
     * @param $_nom
     */

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
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->_status = $status;
    }

    public static function getAllPatissier()
    {
        global $pdo;
        $q = $pdo->prepare('SELECT id, nom , status FROM login WHERE 1');
        if ($q->execute())
        {
            return $resultat = $q->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    public static function DeletePatissier($id)
    {
        global $pdo;
        $sql = "DELETE FROM login WHERE id = $id";
        $q = $pdo->prepare($sql);
        if ($q->execute())
        {
            return true;
        }
        return false;
    }
    public static function insertPatissier($nom, $status, $motdepasse)
    {
        $newmotdepasse = password_hash($motdepasse, PASSWORD_DEFAULT);
        global $pdo;
        $sql = "INSERT INTO login (nom, status, motdepasse) VALUES (:nom, :status, :motdepasse)";
        $q = $pdo->prepare($sql);
        $q->bindParam(':nom', $nom, PDO::PARAM_STR);
        $q->bindParam(':status', $status, PDO::PARAM_STR);
        $q->bindParam(':motdepasse', $newmotdepasse, PDO::PARAM_STR);
        if ($q->execute())
        {
            return ['ajout' => true];
        }
        return ['ajout' => false];
    }

    public static function getOnePatissierById($id)
    {

        global $pdo;

        $q = $pdo->prepare("SELECT * FROM login where id = $id");
        if ($q->execute())
        {

            return $resultat = $q->fetch(PDO::FETCH_OBJ);

        }
        return false;
    }
    public static function updatePatissier($id, $nom, $status)
    {
        global $pdo;

        $sql = "UPDATE login SET nom = :nom, status = :status  WHERE id = $id";

        $q = $pdo->prepare($sql);
        $q->bindParam(':nom', $nom, PDO::PARAM_STR);
        $q->bindParam(':status', $status, PDO::PARAM_STR);

        if ($q->execute())
        {
            return true;
        }
        return false;
    }

}

