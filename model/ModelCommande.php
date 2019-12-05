<?php
require_once File::build_path(array('model','Model.php'));

class ModelCommande extends Model {

    protected static $nomTable = 'rGztzErq-Commandes';
    protected static $nomClasse = 'ModelCommande';
    protected static $primary= 'idCommande';

    private $idCommande;
    private $dateCommande;
    private $login;
    private $montantCommande;
    private $etatCommande;

    public function __construct($data = array()){
        if (!empty($data)) {
            $this->idProduit = $data["idCategorie"];
            $this->nomProduit = $data["nomCategorie"];
        }
    }

    public function get($nom_attribut){
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }

    public function set($nom_attribut, $valeur) {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }
    public static function selectMaxIdCommande(){
            try {
                $pdo = self::$pdo;
                $nomTable = static::$nomTable;
                $nomClasse = static::$nomClasse;
                $clePrimaire = static::$primary;

                $sql = "SELECT max(idCommande) 
                    FROM `{$nomTable}` ";
                $requete = $pdo->prepare($sql);

                $requete->execute();
                $requete->setFetchMode(PDO::FETCH_ASSOC);
                $objet = $requete->fetchAll();
                if (isset($objet[0]))
                    return $objet[0];
                else
                    return null;

            } catch (PDOException $e) {
                return false;
            }
        }

    public static function selectByLogin($login){
        try {
            $pdo = self::$pdo;
            $nomTable = static::$nomTable;
            $nomClasse = static::$nomClasse;
            $clePrimaire = static::$primary;

            $sql = "SELECT * 
                    FROM `{$nomTable}` 
                    WHERE `login`=:sql_pk";
            $requete = $pdo->prepare($sql);
            $valeur = array(
                "sql_pk" => $login);

            $requete->execute($valeur);
            $requete->setFetchMode(PDO::FETCH_CLASS, $nomClasse);
            $objet = $requete->fetchAll();
            if (isset($objet))
                return $objet;
            else
                return null;
        } catch (PDOException $e) {
            return false;
        }
    }
    public static function insert($data){
        return parent::insert($data);
    }
}