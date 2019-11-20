<?php
require_once File::build_path(array('model','Model.php'));

class ModelCategorie extends Model {

    protected static $nomTable = 'rGztzErq-Categories';
    protected static $nomClasse = 'ModelCategorie';
    protected static $primary= 'idCategorie';

    private $idCategorie;
    private $nomCategorie;

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

    public static function insert($data){
        return parent::insert($data);
    }

    public static function update($data,$primary){
        return parent::update($data,$primary);
    }

    public static function delete($primary){
        return parent::delete($primary);
    }
//SELECT *
//FROM `rGztzErq-Categories`c
//JOIN `rGztzErq-Produits` p ON c.idCategorie = p.idCategorie
//WHERE p.idCategorie = 1
}