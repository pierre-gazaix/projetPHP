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
        $controller = 'produit';
        if(Session::est_admin()) {
            $tab_c = ModelCategorie::selectAll();
            $p = new ModelProduit();
            $p->set('idCategorie', '');
            $p->set('nomCategorie', '');
            $p->set('description', '');
            $p->set('couleur', '');
            $p->set('prix', '');
            $view = 'update';
            $pagetitle = 'Création Produit';
        }else{
            $view = 'notUser';
            $pagetitle ='Petit filou!';
        }
        require File::build_path(array('view', 'view.php'));
    }
    public static function created(){
        $controller = 'produit';
        if(Session::est_admin()) {
            $values = array(
                "idProduit" => $_GET['idp'],
                "nomProduit" => $_GET['nom'],
                "description" => $_GET['desc'],
                "couleur" => $_GET['coul'],
                "prix" => $_GET['prix'],
                "idCategorie" => $_GET['idC']);
            $ok = ModelProduit::insert($values);
            $tab_p = ModelProduit::selectAll();
            if (!$ok) {
                $view = 'error';
                $pagetitle = 'ERREUR';
            } else {
                $view = 'created';
                $pagetitle = 'Categorie Crée';
            }
        }else{
            $view = 'notUser';
            $pagetitle ='Petit filou!';
        }
        require File::build_path(array('view', 'view.php'));
    }
    public static function update (){
        $controller = 'produit';
        if(Session::est_admin()) {
            $tab_c = ModelCategorie::selectAll();
            $p = ModelProduit::select($_GET['idp']);
            $cat = ModelCategorie::select($p->get('idCategorie'));
            if ($p == null) {
                $view = 'error';
                $pagetitle = 'Erreur!';
            } else {
                $view = 'update';
                $pagetitle = 'Modification du produit';
            }
        }else{
            $view = 'notUser';
            $pagetitle ='Petit filou!';
        }
        require File::build_path(array('view', 'view.php'));
    }
    public static function updated (){
        $controller = 'produit';
        if(Session::est_admin()) {
            $values = array(
                "idProduit" => $_GET['idp'],
                "nomProduit" => $_GET['nom'],
                "description" => $_GET['desc'],
                "couleur" => $_GET['coul'],
                "prix" => $_GET['prix'],
                "idCategorie" => $_GET['idC']);
            $ok = ModelProduit::update($values, $_GET['idp']);
            $tab_p = ModelProduit::selectAll();
            if (!$ok) {
                $view = 'error';
                $pagetitle = 'Erreur!';
            } else {
                $view = 'updated';
                $pagetitle = 'Catégorie modifiée';
            }
        }else{
            $view = 'notUser';
            $pagetitle ='Petit filou!';
        }
        require File::build_path(array('view', 'view.php'));
    }
    public static function delete(){
        $controller = 'produit';
        if(Session::est_admin()) {
            $p = ModelProduit::select($_GET['idp']);
            if (is_null($p)) {
                $view = 'error';
                $pagetitle = 'Erreur!';
            } else {
                $p->delete($_GET['idp']);
                $tab_p = ModelProduit::selectAll();
                $view = 'deleted';
                $pagetitle = 'Produit supprimée';
            }
        }else{
            $view = 'notUser';
            $pagetitle ='Petit filou!';
        }
        require File::build_path(array('view', 'view.php'));
    }
}
