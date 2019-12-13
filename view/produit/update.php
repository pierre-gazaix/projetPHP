<?php
$controller = static::$object;
if (myGet('action') == 'update') {
    $champ = 'readonly';
    $action = 'index.php?controller=produit&action=updated';
    $legend = 'Modification du produit';
    $select = 'disabled';
    $value ='value='.$cat->get('idCategorie');
}else {
    $champ = 'required';
    $action = 'index.php?controller=produit&action=created';
    $legend = 'Création du produit';
    $select ='';
    $value ='';
}
?>
<form method="post" action="<?php echo $action;?>">
    <fieldset>
        <legend><?php echo $legend;?></legend>
        <p>
            <label>Nom Produit</label>
            <input type="text" name="nom" id="nom_id"
                   value="<?php echo htmlspecialchars($p->get('nomProduit')); ?>"/>
        </p>
        <p>
            <label>Descprition</label>
            <input type="text" name="desc" id="desc_id"
                   value="<?php echo htmlspecialchars($p->get('description')); ?>"/>
        </p>
        <p>
            <label>Couleur</label>
            <input type="text" name="coul" id="coul_id"
                   value="<?php echo htmlspecialchars($p->get('couleur')); ?>"/>
        </p>
        <p>
            <label>Prix</label>
            <input type="number" name="prix" id="p_id"
                   value="<?php echo htmlspecialchars($p->get('prix')); ?>"/>
        </p>
        <p>
            <label>Quantité</label>
            <input type="number" name="qté" id="qte_id"
                   value="<?php echo htmlspecialchars($p->get('quantite')); ?>"/>
        </p>
        <p>
            <label>Id Produit</label>
            <input type="number" name="idp" id="idP_id"
                   value="<?php echo htmlspecialchars($p->get('idProduit')); ?>"
                    <?php echo $champ;?>="true"/>
        </p>
        <p>
            <label for="idCategorie_id">Catégorie</label>
            <select name="idc" id="idCategorie_id" <?php echo $value;?> <?php echo $champ;?>="true"  <?php// echo $select;?> >
                <option value=""> Associez une catégorie</option>

                <?php
                //Boucle qui permet de récupérer tous les noms des catégories
                foreach($tab_c as $catégorie) {
                    if (myGet('action') == 'update'){
                        echo ' <option selected="selected" value="' .htmlspecialchars($cat->get('idCategorie')). '">' . htmlspecialchars($cat->get('nomCategorie')) . '</option>';
                    }else{
                        echo '<option value="' . htmlspecialchars($catégorie->get('idCategorie')) . '">' . htmlspecialchars($catégorie->get('nomCategorie')) . '</option>';
                    }

                }
                ?>
            </select>
        </p>
        <input type="submit" value="Envoyer" />
    </fieldset>
</form>
