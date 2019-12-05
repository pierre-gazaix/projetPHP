<?php
require_once File::build_path(array('model', 'ModelCommande.php'));
require_once File::build_path(array('model', 'ModelLigneCommande.php'));

class ControllerCommande{

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
        $idCommande = ModelCommande::selectMaxIdCommande();
        $panier = unserialize($_POST['p']);
        foreach ($panier as $p => $qte){
            $values=array(
                "idCommande" =>$idCommande['max(idCommande)'],
                "idProduit" => $p,
                "quantite" => $qte);
        ModelLigneCommande::insert($values);
        }
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
    public static function show(){
        $idc = ModelCommande::selectMaxIdCommande();
        $tab_tab_commande = ModelLigneCommande::selectByIdCommande($idc['max(idCommande)']);
        $controller = 'commande';
        if(empty($tab_tab_commande)){
            $view = 'error';
            $pagetitle = 'Erreur!';
        }else {
            $view = 'detail';
            $pagetitle = 'Détail';
        }
        require File::build_path(array('view', 'view.php'));
    }
}
