<?php
require_once File::build_path(array('model', 'ModelProduit.php'));// chargement du modèle

class ControllerProduit {

    protected static $object = 'produit';

    public static function readAll() {
        $tab_p = ModelProduit::selectAll();
        require File::build_path(array('view', 'voiture','list.php'));
    }
    public static function read(){
        $p = ModelProduit::select($_GET['idp']);
        if($p==null){
            $view = 'error';
            $pagetitlt = 'Erreur!';
        }else {
            $view = 'detail';
            $pagetitlt = 'Détail';
        }
        require File::build_path(array('view', 'view.php'));
    }
    public static function create(){
        $p = new ModelProduit();
        $p->set('idCategorie','');
        $p->set('nomCategorie','');
        $view = 'update';
        $pagetitle = 'Création Produit';
        require File::build_path(array('view', 'view.php'));
    }
    public static function created(){
        $values = array(
            "idProduit" =>$_POST['idProduit'],
            "nomProduit" => $_POST['nomProduit']);
        $ok = ModelExercices::insert($values);
        $tab_p = ModelExercices::selectAll();
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
        $p = ModelCategorie::select($_GET['cat']);
        if ($p == null) {
            $view = 'error';
            $pagetitle = 'Erreur!';
        } else {
            $view = 'update';
            $pagetitle = 'Modification du produit';
        }
        require File::build_path(array('view', 'view.php'));
    }
    public static function updated (){
        $values = array(
            "idProduit" =>$_POST['idProduit'],
            "nomProduit" => $_POST['nomProduit']);
        $ok = ModelProduit::update($values,$_POST['idp']);
        $tab_p = ModelProduit::selectAll();
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
        $p = ModelProduit::select($_GET['idp']);
        if(is_null($p)) {
            $view = 'error';
            $pagetitle = 'Erreur!';
        }else{
            $p->delete($_GET['idp']);
            $tab_p = ModelProduit::selectAll();
            $view = 'deleted';
            $pagetitle = 'Catégorie supprimée';
        }
        require File::build_path(array('view', 'view.php'));
    }
}
?>
