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
            "montantCommande" => myGet('mc'),
            "etatCommande" => 'En cours');
        $ok = ModelCommande::insert($values);
        $idCommande = ModelCommande::selectMaxIdCommande();
        $panier = unserialize(myGet('p'));
        foreach ($panier as $p => $qte){
            $values=array(
                "idCommande" =>$idCommande['max(idCommande)'],
                "idProduit" => $p,
                "quantite" => $qte);
        ModelLigneCommande::insert($values);
        $produit = ModelProduit::select($p);
            $valeurs=array(
                "idProduit" => $p,
                "quantite" => $produit->get('quantite')- $qte);
        ModelProduit::update($valeurs,$p);
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
        $idc = myGet('idc');
        $tabCommande = ModelLigneCommande::selectByIdCommande($idc);
        $controller = 'commande';
        if(empty($tabCommande)){
            $view = 'error';
            $pagetitle = 'Erreur!';
        }else {
            $view = 'detail';
            $pagetitle = 'Détail';
        }
        require File::build_path(array('view', 'view.php'));
    }
}
