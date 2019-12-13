<?php
$idp_url = rawurlencode($p->get('idProduit'));
$idp_html = htmlspecialchars($p->get('idProduit'));
$nomp_html = htmlspecialchars($p->get('nomProduit'));
$desc_html = htmlspecialchars($p->get('description'));
$coul_html = htmlspecialchars($p->get('couleur'));
$p_html = htmlspecialchars($p->get('prix'));
$nomc_html = htmlspecialchars($p->getNomCategorie($p->get('idProduit')));
$qte_html = htmlspecialchars($p->get('quantite'));
echo""
    ."<p>"
    ."<h4>".$nomp_html."</h4>"
    ."<p>"
    ."Descprition: ".$desc_html
    ."</p>"
    ."Couleur : " .$coul_html
    ."<p>"
    ."Prix: ".$p_html
    ."</p>";
    if($p->get('quantite') == 0){
        echo "<p>"
            ."Il n'en reste plus, désolé! "
            ."</p>";
    }
    else{
        echo "<p>"
            ."Il en reste ".$qte_html;
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

        <?php
        echo "</p>";
    }
    echo " <div class=\"boutonPostuler\">";

    if(Session::est_admin()) {
        echo "<a href = \"?action=update&controller=produit&idp=" . $idp_url
        . "\"> Modifier</a>"
        . "<a href = \"?action=delete&controller=produit&idp=" . $idp_url
        . "\"> Supprimer</a>";
        ;}
    echo"<a href=?action=readAll> Retour </a>"
    ."</div>"
    ."</p>";?>

