<?php $idp_html = htmlspecialchars($p->get('idProduit'));
echo '<p>La voiture '.($idp_html).' a bien été supprimée !</p>';
require File::build_path(array('view','produit', 'list.php'));//redirige vers la vue
?>
