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
}