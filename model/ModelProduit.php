<?php
require_once File::build_path(array('model','Model.php'));

class ModelProduit extends Model{

    protected static $nomTable = 'rGztzErq-Produits';
    protected static $nomClasse = 'ModelProduit';
    protected static $primary= 'idProduit';

    private $idProduit;
    private $nomProduit;
    private $description;
    private $couleur;
    private $prix;

    public function __construct($data = array()){
        if (!empty($data)) {
            $this->idProduit = $data["idProduit"];
            $this->nomProduit = $data["nomProduit"];
            $this->description = $data["description"];
            $this->couleur = $data["couleur"];
            $this->prix = $data["prix"];
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
    public static function orderBy($attribut, $order){
        return parent::orderBy($attribut, $order);
    }
    public static function select($primary_value){
        return parent::select($primary_value);
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
    public static function getNomCategorie($id){
        try{
            $req_sql = "SELECT nomCategorie
                    FROM `rGztzErq-Produits` p
                    JOIN `rGztzErq-Categories` c ON c.idCategorie = p.idCategorie
                    WHERE p.`idProduit` =:sql_idProduit";
            $req_prep = Model::$pdo->prepare($req_sql);
            $values = array (
                "sql_idProduit" => $id,
            );
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, self::$nomClasse);
            $tab = $req_prep->fetchAll();
            if(empty($tab))
                return null;
            else
                return $tab[0]->get('nomCategorie');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return false;
    }

    public static function selectAllByIdCategorie($id){
        try{
        $req_sql = "SELECT * 
                    FROM `rGztzErq-Produits` 
                    WHERE `idCategorie` =:sql_idCategorie";
        $req_prep = Model::$pdo->prepare($req_sql);
        $values = array (
            "sql_idCategorie" => $id,
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, self::$nomClasse);
        $tab = $req_prep->fetchAll();
        if(empty($tab))
            return null;
        else
            return $tab;
    } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return false;
    }
}