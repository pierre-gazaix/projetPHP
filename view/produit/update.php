<?php
$controller = static::$object;
if ($_GET['action'] == 'update') {
    $champ = 'readonly';
    $action = 'updated';
    $legend = 'Création du produit';
    $select = 'disabled';
    $value ='value='.$cat->get('idCategorie');
}else {
    $champ = 'required';
    $action = 'created';
    $legend = 'Modification du produit';
    $select ='';
    $value ='';
}
?>
<form method="get" action="">
    <fieldset>
        <legend><?php echo $legend;?></legend>
        <p>
            <label for="nom_id">Nom Produit</label>
            <input type="text" name="nom" id="nom_id"
                   value="<?php echo htmlspecialchars($p->get('nomProduit')); ?>"/>
        </p>
        <p>
            <label for="desc_id">Descprition</label>
            <input type="text" name="desc" id="desc_id"
                   value="<?php echo htmlspecialchars($p->get('description')); ?>"/>
        </p>
        <p>
            <label for="coul_id">Couleur</label>
            <input type="text" name="coul" id="coul_id"
                   value="<?php echo htmlspecialchars($p->get('couleur')); ?>"/>
        </p>
        <p>
            <label for="p_id">Prix</label>
            <input type="number" name="prix" id="p_id"
                   value="<?php echo htmlspecialchars($p->get('prix')); ?>"/>
        </p>
        <p>
            <label for="idP_id">Id Produit</label>
            <input type="number" name="idp" id="idP_id"
                   value="<?php echo htmlspecialchars($p->get('idProduit')); ?>"
                    <?php echo $champ;?>="true"/>
        </p>
        <p>
            <label for="idCategorie_id">Catégorie</label>
            <select name="idC" id="idCategorie_id" <?php echo $value;?> <?php echo $champ;?>="true"  <?php// echo $select;?> >
                <option value=""> Associez une catégorie</option>

                <?php
                //Boucle qui permet de récupérer tous les noms des catégories
                foreach($tab_c as $catégorie) {
                    if ($_GET['action'] == 'update'){
                        echo ' <option selected="selected" value="' .$cat->get('idCategorie'). '">' . $cat->get('nomCategorie') . '</option>';
                    }else{
                        echo '<option value="' . $catégorie->get('idCategorie') . '">' . $catégorie->get('nomCategorie') . '</option>';
                    }

                }
                ?>
            </select>
        </p>
        <input type='hidden' name='action' value=<?php echo $action;?>>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>
