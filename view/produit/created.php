<?php
echo("Le produit " . htmlspecialchars($values['idProduit']) .
    " a bien été crée. <br>");
require File::build_path(array('view','produit','list.php'));//redirige vers la vue
?>
