<?php
require_once File::build_path(array('model', 'ModelProduit.php'));// chargement du modèle

class ControllerProduit {
    public static function readAll() {
        $tab_p = ModelProduit::getAllProduits();     //appel au modèle pour gerer la BD
        require File::build_path(array('view', 'voiture','list.php')); //"redirige" vers la vue
    }
    public static function read(){
        $p = ModelVoiture::getVoitureByImmat($_GET['immat']);
        if($p==null)
            require File::build_path(array('view', 'voiture','error.php'));
        else
            require File::build_path(array('view', 'voiture','detail.php'));
    }
    public static function create(){
        require File::build_path(array('view', 'voiture','create.php'));

    }
    public static function created(){
        $produit1 = new ModelVoiture($_POST['immatriculation'], $_POST['couleur'],
            $_POST['marque']);

        $produit1->save();

        self::readAll();

    }
}
?>
