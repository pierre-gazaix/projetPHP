<?php
echo("Le produit " . htmlspecialchars($values['idProduit']) .
    " a bien été créée. <br>");
require File::build_path(array('view','produit', 'list.php'));//redirige vers la vue
?>
