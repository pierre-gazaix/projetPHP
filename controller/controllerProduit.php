<?php
require_once File::build_path(array('model', 'ModelVoiture.php'));// chargement du modèle
class ControllerVoiture {
    public static function readAll() {
        $tab_v = ModelVoiture::getAllVoitures();     //appel au modèle pour gerer la BD
        require File::build_path(array('view', 'voiture','list.php')); //"redirige" vers la vue
    }
    public static function read(){
        $v = ModelVoiture::getVoitureByImmat($_GET['immat']);
        if($v==null)
            require File::build_path(array('view', 'voiture','error.php'));
        else
            require File::build_path(array('view', 'voiture','detail.php'));
    }
    public static function create(){
        require File::build_path(array('view', 'voiture','create.php'));

    }
    public static function created(){
        $voiture1 = new ModelVoiture($_POST['immatriculation'], $_POST['couleur'],
            $_POST['marque']);

        $voiture1->save();

        self::readAll();

    }
}
?>
