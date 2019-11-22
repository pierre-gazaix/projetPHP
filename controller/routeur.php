<?php
require_once (File::build_path(array('controller','ControllerCategorie.php')));
require_once (File::build_path(array('controller','ControllerProduit.php')));
require_once (File::build_path(array('controller','ControllerPanier.php')));

    if (isset($_GET['controller'])){
        $controller = $_GET['controller'];
    }else{
        $controller = 'produit';
    }
    $controller_class = 'Controller'.ucfirst($controller);
    if(class_exists($controller_class)) {
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = 'readAll';
        }
        $method = get_class_methods($controller_class);
        if (in_array($action, $method)) {
            $controller_class::$action();
        }
    }else {
            $controller = '';
            $view = 'viewAccueil';
            $pagetitle = 'Devialet | Accueil';
            require File::build_path(array('view', 'viewAccueil.php'));
}
