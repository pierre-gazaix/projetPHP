<?php
$idp_url = rawurlencode($p->get('idProduit'));
$idp_html = htmlspecialchars($p->get('idProduit'));
$nomp_html = htmlspecialchars($p->get('nomProduit'));
$desc_html = htmlspecialchars($p->get('description'));
$coul_html = htmlspecialchars($p->get('couleur'));
$p_html = htmlspecialchars($p->get('prix'));
$nomc_html = htmlspecialchars($p->getNomCategorie($p->get('idProduit')));
echo""
    ."<p>"
    ."<h4>".$nomp_html."</h4>"
    ."<p>"
    ."Descprition: ".$desc_html
    ."</p>"
    ."Couleur : " .$coul_html
    ."<p>"
    ."Prix: ".$p_html
    ."</p>"
    ."Nom categorie: ".$nomc_html
    ." <div class=\"boutonPostuler\">";

    if(Session::est_admin()) {
        echo "<a href = \"?action=update&controller=produit&idp=" . $idp_url
        . "\"> Modifier</a>"
        . "<a href = \"?action=delete&controller=produit&idp=" . $idp_url
        . "\"> Supprimer</a>";
        ;}
    echo"<a href=?action=readAll> Retour </a>"
    ."</div>"
    ."</p>";