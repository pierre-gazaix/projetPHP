<?php $idp_html = htmlspecialchars($p->get('idProduit'));
echo '<p>Le produit '.($idp_html).' a bien été supprimé !</p>';
require File::build_path(array('view','produit', 'list.php'));//redirige vers la vue
