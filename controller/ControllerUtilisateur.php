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
        $u->set('mail','');
        $controller = 'utilisateur';
        $view = 'update';
        $pagetitle = 'Création de l\'utilisateur';
        require File::build_path(array('view', 'view.php'));

    }
    public static function created(){
        $mdp = Security::chiffrer(myGet('mdp'));
        $mail = filter_var(myGet('mail'), FILTER_VALIDATE_EMAIL);
        $login = myGet('login');
        $nonce = Security::generateRandomHex();
        if ($mail){
        $values = array(
            "login" => $login,
            "mdp" => $mdp,
            "nom" => myGet('nom'),
            "prenom" => myGet('prenom'),
            "nonce" => $nonce,
            "mail" => $mail);
        $ok = ModelUtilisateur::insert($values);
        $tab_u = ModelUtilisateur::selectAll();
        $contenuMail = "<html>
                        <head> <meta charset=\"utf-8\" /> <title>Devialet</title> </head>
                        <body>
                        <p>Veuillez valider votre inscirption en cliquant sur ce lien :</p>
                        <a href=\"./index.php?controller=utilisateur&action=validate&login=$login&nonce=$nonce\">Validation</a>
                        </body>
                        </html>";
        $mailAEnvoyer = mail($mail,'Validation inscription Devialet',$contenuMail);
        if($mailAEnvoyer){
            header('Location: ./index.php?controller=utilisateur&action=connect');
            exit();
        }else{
            header('Location: ./index.php?controller=utilisateur&action=mailError');
            exit();
        }
        }else {
            header('Location: ./index.php?controller=utilisateur&action=mailWrong');
            exit();
        }
    }

    public static function mailError() {
        $controller='utilisateur';
        $view='mailError';
        $pagetitle='L\'envoi du mail a échoué';
        require_once File::build_path(array('view', 'view.php'));
    }

    public static function mailWrong() {
        $controller='utilisateur';
        $view='mailWrong';
        $pagetitle='Adresse non valide';
        require_once File::build_path(array('view', 'view.php'));
    }

    public static function update (){
        $controller = 'utilisateur';
        $u = ModelUtilisateur::select(myGet('u'));
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
        if(Session::is_user(myGet('login')) || Session::est_admin()) {
            $mdp = Security::chiffrer(myGet('mdp'));
            $values = array(
                "login" => myGet('login'),
                "mdp" => $mdp,
                "nom" => myGet('nom'),
                "prenom" => myGet('prenom'),
                "mail" => myGet('mail'));
            $ok = ModelUtilisateur::update($values, myGet('login'));

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
    public static function validate(){
        $login = myGet('login');
        $nonce = myGet('nonce');
        if (ModelUtilisateur::select($login)){
            if(ModelUtilisateur::selectNonce($login,$nonce)){
                $values = array(
                    "nonce" => NULL);
                $ok = ModelUtilisateur::update($values, $login);
            }else{
                $controller = 'utilisateur';
                $view = 'nonceWrong';
                $pagetitle = 'Validation incorrecte';
                require_once File::build_path(array('view', 'view.php'));
            }
        }else{
            $controller = 'utilisateur';
            $view = 'userWrong';
            $pagetitle = 'Utilisateur non reconnu';
            require_once File::build_path(array('view', 'view.php'));
        }
    }
    public static function connected(){
        $mdp = Security::chiffrer(myGet('password'));
        //On vérifie d'abord que ce n'est pas le compte admin
        if (myGet('login') == 'admin' && $mdp == '05bd6bbcad24f3d626dab924845c1fee9669fb9393eaa403e63012b65a8f33e5') {
            $_SESSION['login'] = myGet('login');
            $_SESSION['statut'] = 3; //Mode admin, on a accès à tout
            $_SESSION['connnectedOnServ'] = true;
            header('Location: ./index.php?controller=utilisateur&action=isConnected');
            exit();
        } else{
            $u = ModelUtilisateur::checkPassword(myGet('login'), $mdp);
            $user = ModelUtilisateur::select(myGet('login'));
            if ($u=='userWrong') {
                header('Location: ./index.php?controller=utilisateur&action=userWrong');
                exit();
            } else if ($u == 'mdpWrong') {
                header('Location: ./index.php?controller=utilisateur&action=mdpWrong');
                exit();
            } else if ($u=='bg'){
                if($user->get('nonce')== NULL){
                    $_SESSION['login'] = myGet('login');
                    $_SESSION['connnectedOnServ'] = true;
                    $_SESSION['statut'] = 2;
                    header('Location: ./index.php?controller=utilisateur&action=isConnected');
                    exit();
                }else{
                    header('Location: ./index.php?controller=utilisateur&action=notValided');
                    exit();
                }
            }
        }
    }
    public static function notValided(){
        $controller = 'utilisateur';
        $view = 'notValided';
        $pagetitle = 'Compte pas encore validé';
        require_once File::build_path(array('view', 'view.php'));
    }
    public static function isConnected(){
        $controller='utilisateur';
        $view='bienvenue';
        $pagetitle = 'Bonjour';
        require_once File::build_path(array('view', 'view.php'));
    }
    public static function userWrong(){
        $controller = 'utilisateur';
        $view = 'userWrong';
        $pagetitle = 'Utilisateur non reconnu';
        require_once File::build_path(array('view', 'view.php'));
    }
    public static function mdpWrong(){
        $controller = 'utilisateur';
        $view = 'mdpWrong';
        $pagetitle = 'Mauvais mot de passe';
        require_once File::build_path(array('view', 'view.php'));
    }

    public static function deconnect () {
        if (Session::est_connecte()) {
            Session::destroySession();
            header('Location: ./index.php');
            exit();
        } else { // On lui dit qu'il n'est pas connecté et lui propose de le faire
            $controller='utlisateur';
            $view = 'connect';
            $pagetitle = 'Vous n\'êtes pas connecté';
        }
        require_once File::build_path(array('view', 'view.php'));
    }
}