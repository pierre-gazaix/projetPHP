<?php
echo("Le produit " . htmlspecialchars($values['idProduit']) .
    " a bien été modifié et enregistré. <br>");
require File::build_path(array('view','produit','list.php'));
?>