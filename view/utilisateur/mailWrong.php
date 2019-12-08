<?php
echo "<h3>".'Adresse non valide'."</h3>";
$u = new ModelUtilisateur();
$u->set('login','');
$u->set('mdp','');
$u->set('nom','');
$u->set('prenom','');
$u->set('mail','');
require File::build_path(array('view','utilisateur', 'update.php'));