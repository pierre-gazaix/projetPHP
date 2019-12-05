<?php
require_once File::build_path(array('model','Model.php'));

class ModelLigneCommande extends Model {

    protected static $nomTable = 'rGztzErq-LignesCommande';
    protected static $nomClasse = 'ModelCommande';
    protected static $primary= 'idCommande';

    private $idCommande;
    private $idProduit;


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

    public static function selectByIdCommande($idC){
        try {
            $pdo = self::$pdo;
            $nomClasse = static::$nomClasse;

            $sql = "SELECT lg.idCommande,nomCategorie,nomProduit,couleur,prix,lg.quantite
                    FROM `rgztzerq-produits` p
                    INNER JOIN `rgztzerq-categories` cat
                    ON cat.idCategorie = p.idCategorie
                    INNER JOIN `rgztzerq-lignescommande` lg
                    ON lg.idProduit = p.idProduit
                    WHERE lg.idCommande =:sql_idc";
            $requete = $pdo->prepare($sql);
            $valeur = array(
                "sql_idc" => $idC);

            $requete->execute($valeur);
            $requete->setFetchMode(PDO::FETCH_ASSOC);
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