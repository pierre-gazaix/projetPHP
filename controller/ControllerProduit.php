<?php
require_once File::build_path(array('model', 'ModelProduit.php'));// chargement du modèle

class ControllerProduit {

    protected static $object = 'produit';

    public static function readAll() {
        $tab_p = ModelProduit::selectAll();
        $controller = 'produit';
        $view = 'list';
        $pagetitle = 'Tous les produits';
        require File::build_path(array('view','view.php'));
    }
    public static function read(){
        $p = ModelProduit::select($_GET['idp']);
        $controller = 'produit';
        if($p==null){
            $view = 'error';
            $pagetitle = 'Erreur!';
        }else {
            $view = 'detail';
            $pagetitle = 'Détail';
        }
        require File::build_path(array('view', 'view.php'));
    }
    public static function order(){
        $tab_p = ModelProduit::orderBy($_GET['attribut'], 'ASC');
        $controller = 'produit';
        $view = 'ordered';
        $pagetitle = 'Produit trié';
        require File::build_path(array('view', 'view.php'));
    }
    public static function create(){
        $tab_c = ModelCategorie::selectAll();
        $p = new ModelProduit();
        $p->set('idCategorie','');
        $p->set('nomCategorie','');
        $p->set('description','');
        $p->set('couleur','');
        $p->set('prix','');
        $controller = 'produit';
        $view = 'update';
        $pagetitle = 'Création Produit';
        require File::build_path(array('view', 'view.php'));
    }
    public static function created(){
        $values = array(
            "idProduit" =>$_GET['idp'],
            "nomProduit" => $_GET['nom'],
            "description" =>$_GET['desc'],
            "couleur" =>$_GET['coul'],
            "prix" => $_GET['prix'],
            "idCategorie" => $_GET['idC']);
        $ok = ModelProduit::insert($values);
        $tab_p = ModelProduit::selectAll();
        $controller = 'produit';
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
        $tab_c = ModelCategorie::selectAll();
        $p = ModelProduit::select($_GET['idp']);
        $cat = ModelCategorie::select($p->get('idCategorie'));
        $controller = 'produit';
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
            "idProduit" =>$_GET['idp'],
            "nomProduit" =>$_GET['nom'],
            "description" =>$_GET['desc'],
            "couleur" =>$_GET['coul'],
            "prix" => $_GET['prix'],
            "idCategorie" => $_GET['idC']);
        $ok = ModelProduit::update($values,$_GET['idp']);
        $tab_p = ModelProduit::selectAll();
        $controller = 'produit';
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
        $controller = 'produit';
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
