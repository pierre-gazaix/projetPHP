<?php
require_once File::build_path(array('model', 'ModelProduit.php'));// chargement du modèle

class ControllerPanier{

    public static function add (){
        if (!isset($_SESSION['panier'])) {
            $panier[myGet('idProduit')] = myGet('quantite');
        }
        else{
            $panier=$_SESSION['panier'];
            $panier[myGet('idProduit')] = myGet('quantite');
        }
        $_SESSION['panier'] = $panier;
        header('Location: ./index.php?controller=Panier&action=read');
        exit();
    }
    public static function read(){
        if (isset($_SESSION['panier']))
            $panier=$_SESSION['panier'];
        $controller = 'panier';
        $view = 'detail';
        $pagetitle = 'Votre panier';
        require (File::build_path(array("view","view.php")));
    }
    public static function deleteAll(){
        $panier=array();
        unset($_SESSION['panier']);
        header('Location: ./index.php?controller=Panier&action=read');
        exit();
    }
    public static function delete(){
        $panier = $_SESSION['panier'];
        unset($panier[myGet('idp')]);
        $_SESSION['panier'] = $panier;
        header('Location: ./index.php?controller=Panier&action=read');
        exit();
    }
}