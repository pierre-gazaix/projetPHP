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

    public static function selectAll(){
        return parent::selectAll();
    }
    public static function select($primary_value){
        return parent::select($primary_value);
    }
}