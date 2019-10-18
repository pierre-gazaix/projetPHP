<?php
require_once File::build_path(array('model','Model.php'));

class ModelProduit{
    private $idProduit;
    private $nomProduit;
    private $description;
    private $couleur;
    private $prix;

    /*public function __construct($idProduit = NULL, $nomProduit = NULL,
                                $description = NULL, $couleur = NULL, $prix = NULL){
        if(!is_null($idProduit)&&!is_null($nomProduit)&&!is_null($description)
            &&!is_null($couleur) &&!is_null($prix)) {
            $this->idProduit = $idProduit;
            $this->nomProduit = $nomProduit;
            $this->description = $description;
            $this->couleur = $couleur;
            $this->prix = $prix;
        }
    }*/
    public function __construct($data = array())
    {
        if (!empty($data)) {
            $this->idProduit = $data["idProduit"];
            $this->nomProduit = $data["nomProduit"];
            $this->description = $data["description"];
            $this->couleur = $data["couleur"];
            $this->prix = $data["prix"];
        }
    }


    public function getIdProduit(){return $this->idProduit;}
    public function setIdProduit($idProduit){$this->idProduit = $idProduit;}

    public function getNomProduit(){return $this->nomProduit;}
    public function setNomProduit($nomProduit){$this->nomProduit = $nomProduit;}

    public function getDescription(){return $this->description;}
    public function setDescription($description){$this->description = $description;}

    public function getCouleur(){return $this->couleur;}
    public function setCouleur($couleur){$this->couleur = $couleur;}

    public function getPrix(){return $this->prix;}
    public function setPrix($prix){$this->prix = $prix;}



}