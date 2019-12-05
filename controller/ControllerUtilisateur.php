<?php
require_once File::build_path(array('model', 'ModelUtilisateur.php'));
require_once File::build_path(array('lib', 'Session.php'));
require_once File::build_path(array('lib', 'Security.php'));

class ControllerUtilisateur
{
    public static function create(){
        $u = new ModelUtilisateur();
        $u->set('login','');
        $u->set('mdp','');
        $u->set('nom','');
        $u->set('prenom','');
        $controller = 'utilisateur';
        $view = 'update';
        $pagetitle = 'Création de l\'utilisateur';
        require File::build_path(array('view', 'view.php'));

    }
    public static function created(){
        $mdp = Security::chiffrer($_GET['mdp']);
        $values = array(
            "login" => $_GET['login'],
            "mdp" => $mdp,
            "nom" => $_GET['nom'],
            "prenom" => $_GET['prenom']);
        $ok = ModelUtilisateur::insert($values);
        $tab_u = ModelUtilisateur::selectAll();
        header('Location: ./index.php?controller=utilisateur&action=connect');
        exit();;

    }
    public static function connect() {
        $controller='utilisateur';
        $view='connect';
        $pagetitle='Bienvenue';
        require_once File::build_path(array('view', 'view.php'));
    }
    public static function connected(){
        $mdp = Security::chiffrer($_POST['password']);
        echo ModelUtilisateur::checkPassword($_POST['login'],$mdp);
        var_dump(ModelUtilisateur::checkPassword($_POST['login'],Security::chiffrer($_POST['password'])));
        //On vérifie d'abord que ce n'est pas le compte admin
        if ($_POST['login'] == "admin" && $_POST['password'] == "dayyaan") {
            $_SESSION['login'] = $_POST['login'];// Si c'est un admin on passe diirectement par là et on ne vérifie rien
            $_SESSION['statut'] = 3; //Mode admin, on a accès à tout
            $_SESSION['connnectedOnServ'] = true;
        }
    else if(ModelUtilisateur::checkPassword($_POST['login'],Security::chiffrer($_POST['password']))){
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['connnectedOnServ'] = true;
        }
    else{
        echo 'Utilisateur non reconnu';
    }
       header('Location: ./index.php?controller=utilisateur&action=isConnected');
        exit();
    }

    public static function isConnected(){
        $controller='utilisateur';
        $view='bienvenue';
        $pagetitle = 'Bonjour';
        require_once File::build_path(array('view', 'view.php'));
    }

    /**
     * Permet de se déconnecter
     */
    public static function deconnect () {
        if (Session::est_connecte()) {
            Session::destroySession();
            header('Location: ./index.php?controller=utilisateur&action=connect');
            exit();
        } else { // On lui dit qu'il n'est pas connecté et lui propose de le faire
            $controller='utlisateur';
            $view = 'error';
            $pagetitle = 'Vous n\'êtes pas connecté';
        }
        require_once File::build_path(array('view', 'view.php'));
    }
}