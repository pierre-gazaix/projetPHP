<?php
if (!isset ($_COOKIE['panier']) || empty($panier))
    echo "Votre panier est vide!";
else{
    ?>
    <a href=?action=deleteAll&controller=panier>Vider panier</a>
    <?php
    $totalProduit = 0;
    $totalPanier = 0;
    echo "<legend>Votre panier</legend>"
    ."<hr>";
    foreach ($panier as $idP => $qte){
        $p = ModelProduit::select($idP);
        $nomProduit = $p->get('nomProduit');
        $description = $p->get('description');
        $prix = $p->get('prix');
        $totalProduit = $prix*$qte;
        $totalPanier +=$totalProduit;
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
    <?php echo $totalPanier?>
€</div>
</legend>
    <form action="?controller=commande&action=buy" method="post">
    <input type="hidden" name="mc" id="mc_id" value= <?php echo $totalPanier?>>
    <input type="hidden" name="mc" id="mc_id" value= <?php echo $totalPanier?>>
        <input type="submit" value="Passer la commande" />
<?php }
