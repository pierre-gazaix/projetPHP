<?php
require_once File::build_path(array('model','Model.php'));

class ModelProduit{
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

    public static function getAllProduits() {
        $sql = "SELECT* FROM proj_php_Produits;";
        $rep = Model::$pdo->prepare($sql);
        $rep->execute();
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
        $tab_voit = $rep->fetchAll();

        if (empty($tab_prod))
            return false;
        return $tab_prod;
    }
}