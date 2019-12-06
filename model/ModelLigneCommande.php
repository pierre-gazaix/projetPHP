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
            $pdo = Model::$pdo;
            $sql = "SELECT lg.idCommande,nomCategorie,nomProduit,couleur,prix,lg.quantite
                    FROM `rGztzErq-Produits` p
                    INNER JOIN `rGztzErq-Categories` cat
                    ON cat.idCategorie = p.idCategorie
                    INNER JOIN `rGztzErq-LignesCommande` lg
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
            echo $e->getMessage();
            return false;
        }
    }

    public static function insert($data){
        return parent::insert($data);
    }
}