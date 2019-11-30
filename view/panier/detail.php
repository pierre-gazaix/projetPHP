<?php
if (!isset ($_COOKIE['panier']) || empty($panier))
    echo "Votre panier est vide!";
else{
    ?>
    <a href=?action=deleteAll&controller=panier>Vider panier</a>
    <?php
    $totalProduit = 0;
    $total = 0;
    echo "<legend>Votre panier</legend>"
    ."<hr>";
    foreach ($panier as $idP => $qte){
        $p = ModelProduit::select($idP);
        $nomProduit = $p->get('nomProduit');
        $description = $p->get('description');
        $prix = $p->get('prix');
        $totalProduit = $prix*$qte;
        $total +=$totalProduit;
        $idp_url = rawurlencode($p->get('idProduit'));
        if($p->get('quantite') == 0)
            $enStock = 'Rupture de stock';
        else
            $enStock = 'En stock';
        ?>
        <ul>
            <li><h3><?php echo $nomProduit?></h3></li>
            <li><?php echo $description?></li>
            <li><p><?php echo $enStock ?></p></li>
            <li><?php echo $prix?>€</li>
            <li><p>Quantité: <?php echo $qte?></p></li>
            <lib>Total<div style="text-align:right"></lib>
                    <?php echo $totalProduit?>
                €</div>
            <a href=?action=delete&controller=panier&idp=<?php echo $idp_url?>>Supprimer du panier</a>
        </ul>
        <hr>

        <?php
    }?>
<legend>Total<div style="text-align:right">
    <?php echo $total?>
€</div>
</legend>
    <a class="a_rejoindre" href="../index.php?controller=panier&action=buy">Passer la commande</a>
<?php }
