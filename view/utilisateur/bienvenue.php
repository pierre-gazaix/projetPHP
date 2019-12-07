<?php
require_once File::build_path(array('model', 'ModelProduit.php'));
echo "<h4>".'Bienvenue ' .$_SESSION['login'].'!'."</h4>";
$tab_p = ModelProduit::selectAll();
require File::build_path(array('view','produit', 'list.php'));