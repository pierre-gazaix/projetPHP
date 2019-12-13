<?php
require_once File::build_path(array('model', 'ModelCategorie.php'));

class ControllerCategorie {

    protected static $object = 'categorie';

    public static function readAll() {
        $tab_c = ModelCategorie::selectAll();
        require File::build_path(array('view', 'categorie','list.php'));
    }

    public static function read(){
        $controller = 'categorie';
        $c = ModelCategorie::select(myGet('idCategorie'));
        if(is_null($c)){
            $view = 'error';
            $pagetitle = 'Erreur!';
        }else {
            $view = 'detail';
            $pagetitlt = 'Détail';
        }
        require File::build_path(array('view', 'view.php'));
    }
    public static function create(){
        $c = new ModelCategorie();
        $c->set('idCategorie','');
        $c->set('nomCategorie','');
        $view = 'update';
        $pagetitle = 'Création Categorie';
        require File::build_path(array('view', 'view.php'));
    }
    public static function created(){
        $values = array(
            "idCategorie" =>myGet('idCategorie'),
            "nomnCategorie" => myGet('nomCategorie'));
        $ok = ModelCategorie::insert($values);
        $tab_c = ModelCategorie::selectAll();
        if (!$ok) {
            $view = 'error';
            $pagetitle = 'ERREUR';
        } else {
            $view = 'created';
            $pagetitle = 'Categorie Crée';
        }
        require File::build_path(array('view', 'view.php'));
    }
    public static function update (){
        $c = ModelCategorie::select(myGet('cat'));
        if ($c == null) {
            $view = 'error';
            $pagetitle = 'Erreur!';
        } else {
            $view = 'update';
            $pagetitle = 'Modification de la voiture';
        }
        require File::build_path(array('view', 'view.php'));
    }
    public static function updated (){
        $values = array(
            "idCategorie" =>myGet('idCategorie'),
            "nomCategorie" => myGet('nomCategorie'));
        $ok = ModelCategorie::update($values,myGet('cat'));
        $tab = ModelCategorie::selectAll();
        if(!$ok) {
            $view = 'error';
            $pagetitle = 'Erreur!';
        }else{
            $view = 'updated';
            $pagetitle = 'Catégorie modifiée';
        }
        require File::build_path(array('view', 'view.php'));
    }
    public static function delete(){
        $c = ModelCategorie::select(myGet('cat'));
        if(is_null($c)) {
            $view = 'error';
            $pagetitle = 'Erreur!';
        }else{
            $c->delete(myGet('cat'));
            $tab_c = ModelCategorie::selectAll();
            $view = 'deleted';
            $pagetitle = 'Catégorie supprimée';
        }
        require File::build_path(array('view', 'view.php'));
    }
}
?>
