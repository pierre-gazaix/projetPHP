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

    public static function selectAll(){
        return parent::selectAll();
    }
    public static function select($primary_value){
        return parent::select($primary_value);
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

    public static function update($data,$primary){
        return parent::update($data,$primary);
    }

    public static function delete($primary){
        return parent::delete($primary);
    }
}