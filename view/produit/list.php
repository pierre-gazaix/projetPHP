<?php
if(Session::est_admin())
    echo '<a href="?controller=produit&action=create">Créer un produit </a> </p>';
foreach ($tab_p as $p){
    $idp_html = htmlspecialchars($p->get('idProduit'));
    $nom_html = htmlspecialchars($p->get('nomProduit'));
    $coul_html = htmlspecialchars($p->get('couleur'));
    $qte_html = htmlspecialchars($p->get('quantite'));
    $idp_url = rawurlencode($p->get('idProduit'));
?>
    <p>
        Produit :
        <a href="?action=read&controller=produit&idp=<?php echo $idp_url?>"> <?php echo $nom_html.' ('.$coul_html.')'?></a>
        <?php
        if(Session::est_admin()){
            '<a href="?action=update&controller=produit&idp=<?php echo $idp_url?>"> Modifier</a>';
            '<a href="?action=delete&controller=produit&idp=<?php echo $idp_url?>"> Supprimer</a>';
        }
    if($p->get('quantite') == 0){
        echo "<h5>"
            ."Rupture de stock"
            ."</h5>";
    }
    else {
        ?>
        <form method="post" action="?action=add&controller=panier">
            <input class="form-control" type="number" placeholder="Quantité" min ="1"
                   max="<?php echo $qte_html;?>" step="1" name="quantite" value="1" required />
            <input type="hidden" name="idProduit" value="<?php echo $idp_html;?>" />
            <button class ="btn btn-info my-4 btn-block orange accent-4" type="submit">
                <img src="./view/Images/JPEG/atc.png" alt="atc">
            </button class ="btn btn-info my-4 btn-block orange accent-4">
        </form>
        </p>

        <?php } ?>
    <?php
}
