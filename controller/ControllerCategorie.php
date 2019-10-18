<?php
require_once File::build_path(array('model', 'ModelCategorie.php'));// chargement du modèle
class ControllerCategorie {
    public static function readAll() {
        $tab_c = ModelCategorie::getAllCategories();     //appel au modèle pour gerer la BD
        require File::build_path(array('view', 'categorie','list.php')); //"redirige" vers la vue
    }
    public static function read(){
        $c = ModelCategorie::getCategorieByNom($_GET['nomCategorie']);
        if($c==null)
            require File::build_path(array('view', 'categorie','error.php'));
        else
            require File::build_path(array('view', 'categorie','detail.php'));
    }
    public static function create(){
        require File::build_path(array('view', 'categorie','create.php'));

    }
    public static function created(){
        $categorie1 = new ModelCategorie($_POST['idCategorie'], $_POST['nomCategorie']);

        $categorie1->save();

        self::readAll();

    }
}
?>
