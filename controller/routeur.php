<?php
require_once File::build_path(array('lib', 'Session.php'));
require_once (File::build_path(array('controller','ControllerCategorie.php')));
require_once (File::build_path(array('controller','ControllerProduit.php')));
require_once (File::build_path(array('controller','ControllerPanier.php')));
require_once (File::build_path(array('controller','ControllerCommande.php')));
require_once (File::build_path(array('controller','ControllerUtilisateur.php')));

function myGet($nomVar){
    if (isset($_GET[$nomVar]))
        return $_GET[$nomVar];
    else if (isset($_POST[$nomVar]))
        return $_POST[$nomVar];
    else
        return NULL;
}

if ( !is_null(myGet('action')) && myGet('action') == 'accueil') {
    $controller = '';
    $view = 'viewAccueil';
    $pagetitle = 'Devialet | Accueil';
    require File::build_path(array('view', 'viewAccueil.php'));
} else {
    if (!is_null(myGet('controller'))) {
        $controller = myGet('controller');
    } else {
        $controller = 'produit';
    }
    $controller_class = 'Controller' . ucfirst($controller);
    if (class_exists($controller_class)) {
        if (!is_null(myGet('action'))) {
            $action = myGet('action');
        } else {
            $action = 'readAll';
        }
        $method = get_class_methods($controller_class);
        if (in_array($action, $method)) {
            $controller_class::$action();
        }
    } else {
        $controller = '';
        $view = 'viewAccueil';
        $pagetitle = 'Devialet | Accueil';
        require File::build_path(array('view', 'viewAccueil.php'));
    }
}
