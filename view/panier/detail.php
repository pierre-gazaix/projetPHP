<?php

if (Session::est_connecte()){
    $control = 'commande';
    $act = 'buy';
}
else{
    $control = 'utilisateur';
    $act = 'createPanier';
}
if (!isset ($_SESSION['panier']) || empty($panier))
    echo "Votre panier est vide!";
else{
    ?>
    <a href="?action=deleteAll&controller=panier">Vider panier</a>
    <?php
    $totalProduit = 0;
    $totalPanier = 0;
    echo "<h2>Votre panier</h2>"
    ."<hr>";
    foreach ($panier as $idP => $qte){
        $p = ModelProduit::select($idP);
        $nomProduit = htmlspecialchars($p->get('nomProduit'));
        $description = htmlspecialchars($p->get('description'));
        $prix = htmlspecialchars($p->get('prix'));
        $totalProduit = htmlspecialchars($prix*$qte);
        $totalPanier +=$totalProduit;
        $idp_url = rawurlencode($p->get('idProduit'));
        ?>
        <ul>
            <li><h3><?php echo $nomProduit?></h3></li>
            <li><?php echo $description?></li>
            <li><?php echo $prix?>€</li>
            <li><p>Quantité: <?php echo $qte?></p></li>
            <li><h4>Total <?php echo $totalProduit?>€</h4></li>
            <li><a href="?action=delete&controller=panier&idp=<?php echo $idp_url?>">Supprimer du panier</a></li>
        </ul>
        <hr>

        <?php
    }?>
<h3>Total
    <?php echo $totalPanier?>
€</h3>

    <form method="post" action="?controller=<?php echo $control?>&action=<?php echo $act?>" >
    <input type="hidden" name="mc" id="mc_id" value= <?php echo $totalPanier?>>
    <input type="hidden" name="p" id="p_id" value= <?php echo serialize($panier)?>>
        <input type="submit" value="Passer la commande" />
    </form>
<?php }
