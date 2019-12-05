<?php
var_dump(Session::est_connecte());
ModelUtilisateur::checkPassword('DLH    ','paul');
echo 'Bienvenue '.$_SESSION['login'].'!';
