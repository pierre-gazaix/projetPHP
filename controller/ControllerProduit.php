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
        $p = ModelProduit::select(myGet('idp'));
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
   /* public static function order(){
        $tri = myGet('attribut');
        if ($tri =='sansTri')
            $tab_p = ModelProduit::selectAll();
        else
            $tab_p = ModelProduit::orderBy('prix','DESC');

        $controller = 'produit';
        $view = 'ordered';
        $pagetitle = 'Produit triés';
        require File::build_path(array('view', 'view.php'));
    }*/
    public static function create(){
        $controller = 'produit';
        if(Session::est_admin()) {
            $tab_c = ModelCategorie::selectAll();
            $p = new ModelProduit();
            $p->set('idCategorie', '');
            $p->set('nomCategorie', '');
            $p->set('description', '');
            $p->set('couleur', '');
            $p->set('quantite', '');
            $p->set('prix', '');
            $view = 'update';
            $pagetitle = 'Création Produit';
        }else{
            $controller='error';
            $view = 'notUser';
            $pagetitle ='Petit filou!';
        }
        require File::build_path(array('view', 'view.php'));
    }
    public static function created(){
        $controller = 'produit';
        if(Session::est_admin()) {
            $values = array(
                "idProduit" => myGet('idp'),
                "nomProduit" => myGet('nom'),
                "description" => myGet('desc'),
                "couleur" => myGet('coul'),
                "quantite" => myGet('qté'),
                "prix" => myGet('prix'),
                "idCategorie" => myGet('idc'));
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
            $controller='error';
            $view = 'notUser';
            $pagetitle ='Petit filou!';
        }
        require File::build_path(array('view', 'view.php'));
    }
    public static function update (){
        $controller = 'produit';
        if(Session::est_admin()) {
            $tab_c = ModelCategorie::selectAll();
            $p = ModelProduit::select(myGet('idp'));
            $cat = ModelCategorie::select($p->get('idCategorie'));
            if ($p == null) {
                $view = 'error';
                $pagetitle = 'Erreur!';
            } else {
                $view = 'update';
                $pagetitle = 'Modification du produit';
            }
        }else{
            $controller='error';
            $view = 'notUser';
            $pagetitle ='Petit filou!';
        }
        require File::build_path(array('view', 'view.php'));
    }
    public static function updated (){
        $controller = 'produit';
        if(Session::est_admin()) {
            $values = array(
                "idProduit" => myGet('idp'),
                "nomProduit" => myGet('nom'),
                "description" => myGet('desc'),
                "couleur" => myGet('coul'),
                "prix" => myGet('prix'),
                "quantite" => myGet('qté'),
                "idCategorie" => myGet('idc'));

            $ok = ModelProduit::update($values, myGet('idp'));
            $tab_p = ModelProduit::selectAll();
            if (!$ok) {
                $view = 'error';
                $pagetitle = 'Erreur!';
            } else {
                $view = 'updated';
                $pagetitle = 'Catégorie modifiée';
            }
        }else{
            $controller='error';
            $view = 'notUser';
            $pagetitle ='Petit filou!';
        }
        require File::build_path(array('view', 'view.php'));
    }
    public static function delete(){
        $controller = 'produit';
        if(Session::est_admin()) {
            $p = ModelProduit::select(myGet('idp'));
            if (is_null($p)) {
                $view = 'error';
                $pagetitle = 'Erreur!';
            } else {
                $p->delete(myGet('idp'));
                $tab_p = ModelProduit::selectAll();
                $view = 'deleted';
                $pagetitle = 'Produit supprimée';
            }
        }else{
            $controller='error';
            $view = 'notUser';
            $pagetitle ='Petit filou!';
        }
        require File::build_path(array('view', 'view.php'));
    }
}
