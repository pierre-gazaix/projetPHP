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
        exit();

    }

    public static function update (){
        $controller = 'utilisateur';
        $u = ModelUtilisateur::select($_GET['u']);
        if(Session::is_user($u->get('login')) || Session::est_admin()){
            if (empty($u)) {
                $view = 'error';
                $pagetitle = 'Erreur!';
            } else {
                $view = 'update';
                $pagetitle = 'Votre compte';
            }
        }else{
            $view = 'notUser';
            $pagetitle ='Petit filou!';
        }
        require File::build_path(array('view', 'view.php'));
    }
    public static function updated (){
        $controller = 'utilisateur';
        if(Session::is_user($_GET['login']) || Session::est_admin()) {

            $mdp = Security::chiffrer($_GET['mdp']);
            $values = array(
                "login" => $_GET['login'],
                "mdp" => $mdp,
                "nom" => $_GET['nom'],
                "prenom" => $_GET['prenom']);
            $ok = ModelUtilisateur::update($values, $_GET['login']);

            if (!$ok) {
                $view = 'error';
                $pagetitle = 'Erreur!';
            } else {
                header('Location: ./index.php?controller=utilisateur&action=update&u=' . $_SESSION['login']);
                exit();
            }
        }else{
            $view = 'notUser';
            $pagetitle ='Petit filou!';
        }
        require File::build_path(array('view', 'view.php'));
    }
    public static function connect() {
        $controller='utilisateur';
        $view='connect';
        $pagetitle='Bienvenue';
        require_once File::build_path(array('view', 'view.php'));
    }
    public static function connected(){
         $mdp = Security::chiffrer($_POST['password']);
        //On vérifie d'abord que ce n'est pas le compte admin
        if ($_POST['login'] == 'admin' && $mdp == '05bd6bbcad24f3d626dab924845c1fee9669fb9393eaa403e63012b65a8f33e5') {
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['statut'] = 3; //Mode admin, on a accès à tout
            $_SESSION['connnectedOnServ'] = true;
            header('Location: ./index.php?controller=utilisateur&action=isConnected');
            exit();
        }
        else if(ModelUtilisateur::checkPassword($_POST['login'],$mdp)){
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['connnectedOnServ'] = true;
            $_SESSION['statut'] = 2;
            header('Location: ./index.php?controller=utilisateur&action=isConnected');
            exit();
        }
        else{
            echo 'Utilisateur non reconnu';
        }

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