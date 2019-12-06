<?php
if(Session::est_admin())
    echo '<a href="?controller=produit&action=create">Créer un produit </a> </p>';
foreach ($tab_p as $p){
    $idp_html = htmlspecialchars($p->get('idProduit'));
    $nom_html = htmlspecialchars($p->get('nomProduit'));
    $idp_url = rawurlencode($p->get('idProduit'));
?>
    <p>
        <strong>
        Produit
        </strong>
        <a href="?action=read&controller=produit&idp=<?php echo $idp_url?>"> <?php echo $idp_html?> <?php echo $nom_html?></a>
        <a href="?action=update&controller=produit&idp=<?php echo $idp_url?>"> Modifier</a>
        <a href="?action=delete&controller=produit&idp=<?php echo $idp_url?>"> Supprimer</a>

    <form method="post" action="?action=add&controller=panier">
        <input class="form-control" type="number" placeholder="Quantité" min ="1"
               max="<?php echo $p->get('quantite');?>" step="1" name="quantite" value="" required />
        <input type="hidden" name="idProduit" value="<?php echo $p->get('idProduit');?>" />
        <button class ="btn btn-info my-4 btn-block orange accent-4" type="submit">
            <img src="./view/Images/JPEG/atc.png" alt="atc">
        </button>
    </form>
        <?php "</p>";

}
