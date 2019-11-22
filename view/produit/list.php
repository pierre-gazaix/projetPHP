<?php

echo '<a href="?controller=produit&action=create">Créer un produit </a> </p>';
foreach ($tab_p as $p){
    $idp_html = htmlspecialchars($p->get('idProduit'));
    $nom_html = htmlspecialchars($p->get('nomProduit'));
    $idp_url = rawurlencode($p->get('idProduit'));

    echo ""
        ."<p>"
        ."<strong>"
        ."Produit "
        ."</strong>"
        ."<a href=?action=read&controller=produit&idp=$idp_url
        .>$idp_html $nom_html</a>"
        ."<a href=?action=update&controller=produit&idp=$idp_url
        .> Modifier</a>"

        ."<a href=?action=delete&controller=produit&idp=$idp_url
        .> Supprimer</a>"

        ."<a href=?action=read&controller=panier
        .> Ajouter au panier</a>"

        ."</p>";
}
