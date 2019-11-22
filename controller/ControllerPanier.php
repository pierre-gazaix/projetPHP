<?php
class ControllerPanier{

    public static function add (){
        if (empty(unserialize($_COOKIE['panier'])))
            $panier[$_POST['idProduit']] = $_POST['quantite'];
        else{
            $panier=unserialize($_COOKIE['panier']);
            $panier[$_POST['idProduit']] = $_POST['quantite'];
        }
        setcookie("panier", serialize($panier),time()+900);
        header('Location: ./index.php?controller=Panier&action=read');
        exit();
    }
    public static function read(){
        $controller = 'panier';
        $view = 'detail';
        $pagetitle = 'Votre panier';
        require (File::build_path(array("view","view.php")));
    }
    public static function deleteAll(){
        setcookie("panier","2",time()-1);
        header('Location: ./index.php?controller=Panier&action=read');
        exit();
    }
    public static function delete(){
        $panier = unserialize(($_COOKIE['panier']));
        unset($panier[$_GET['idProduit']]);
        setcookie("panier", serialize($panier),time()+900);
        header('Location: ./index.php?controller=Panier&action=read');
        exit();
    }
}