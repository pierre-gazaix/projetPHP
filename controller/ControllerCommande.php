<?php
require_once File::build_path(array('model', 'ModelCommande.php'));

class ControllerCommande{

    protected static $object = 'commande';

    public static function readAll(){
        $tab_c = ModelCommande::selectAll();
        $controller = 'commande';
        $view = 'list';
        $pagetitle = 'Toutes les commandes';
        require File::build_path(array('view', 'categorie', 'list.php'));
    }

    public static function create(){
        $tab_c = ModelCategorie::selectAll();
        $c = new ModelCommande();
        $c->set('idCommande', '');
        $c->set('dateCommande', '');
        $c->set('login', '');
        $c->set('montantCommande', '');
        $c->set('etatCommande', '');
        $controller = 'commande';
        $view = 'update';
        $pagetitle = 'Création Commande';
        require File::build_path(array('view', 'view.php'));
    }

    public static function created()
    {
        $values = array(
            "idCommande" => $_GET['idCommande'],
            "dateCommande" => $_GET['dateCommande'],
            "login" => $_GET['$login'],
            "montantCommande" => $_GET['montantCommande'],
            "etatCommande" => $_GET['etatCommande']);
        $ok = ModelCommande::insert($values);
        $tab_c = ModelCommande::selectAll();
        $controller = 'commande';
        if (!$ok) {
            $view = 'error';
            $pagetitle = 'ERREUR';
        } else {
            $view = 'created';
            $pagetitle = 'Categorie Crée';
        }
        require File::build_path(array('view', 'view.php'));
    }

    public static function update(){
        $c = ModelCategorie::select($_GET['cat']);
        $controller = 'commande';
        if ($c == null) {
            $view = 'error';
            $pagetitle = 'Erreur!';
        } else {
            $view = 'update';
            $pagetitle = 'Modification de la voiture';
        }
        require File::build_path(array('view', 'view.php'));
    }

    public static function updated()
    {
        $values = array(
            "idCommande" => $_GET['idCommande'],
            "dateCommande" => $_GET['dateCommande'],
            "login" => $_GET['$login'],
            "montantCommande" => $_GET['montantCommande'],
            "etatCommande" => $_GET['etatCommande']);
        $ok = ModelCommande::update($values, $_GET['cat']);
        $tab = ModelCommande::selectAll();
        $controller = 'commande';
        if (!$ok) {
            $view = 'error';
            $pagetitle = 'Erreur!';
        } else {
            $view = 'updated';
            $pagetitle = 'Catégorie modifiée';
        }
        require File::build_path(array('view', 'view.php'));
    }

    public static function delete()
    {
        $c = ModelCommande::select($_GET['cat']);
        $controller = 'commande';
        if (is_null($c)) {
            $view = 'error';
            $pagetitle = 'Erreur!';
        } else {
            $c->delete($_GET['cat']);
            $tab_c = ModelCommande::selectAll();
            $view = 'deleted';
            $pagetitle = 'Catégorie supprimée';
        }
        require File::build_path(array('view', 'view.php'));
    }
    public static function buy (){
        if(isset($_SESSION['login']))
            $login = $_SESSION['login'];
        else
            $login = 'invité';
        $values = array(
            "dateCommande" => date("Y/m/d"),
            "login" => $login,
            "montantCommande" => $_POST['mc'],
            "etatCommande" => 'En cours');
        $ok = ModelCommande::insert($values);
        $qte =
        $controller = 'commande';
        $view = 'list';
        $pagetitle = 'Votre commande';
        header('Location: ./index.php?controller=commande&action=read');
        exit();
    }
    public static function read(){
        if(isset($_SESSION['login']))
            $login = $_SESSION['login'];
        else
            $login = 'invité';
        $tab_c = ModelCommande::selectByLogin($login);
        setcookie("panier","2",time()-1);
        $controller = 'commande';
        $view = 'list';
        $pagetitle = 'Votre commande';
        require File::build_path(array('view', 'view.php'));
    }
}
