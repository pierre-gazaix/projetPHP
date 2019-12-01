<?php
require_once File::build_path(array('model', 'ModelProduit.php'));// chargement du modèle

class ControllerPanier{

    public static function add (){
        if (!isset($_COOKIE['panier'])) {
            $panier[$_POST['idProduit']] = $_POST['quantite'];
        }
        else{
            $panier=unserialize($_COOKIE['panier']);
            $panier[$_POST['idProduit']] = $_POST['quantite'];
        }
        setcookie("panier", serialize($panier),time()+900);
        header('Location: ./index.php?controller=Panier&action=read');
        exit();
    }
    public static function read(){
        if (isset($_COOKIE['panier']))
            $panier=unserialize($_COOKIE['panier']);
        $controller = 'panier';
        $view = 'detail';
        $pagetitle = 'Votre panier';
        require (File::build_path(array("view","view.php")));
    }
    public static function deleteAll(){
        $panier=array();
        setcookie("panier","2",time()-1);
        header('Location: ./index.php?controller=Panier&action=read');
        exit();
    }
    public static function delete(){
        $panier = unserialize(($_COOKIE['panier']));
        unset($panier[$_GET['idp']]);
        setcookie("panier", serialize($panier),time()+900);
        header('Location: ./index.php?controller=Panier&action=read');
        exit();
    }
}