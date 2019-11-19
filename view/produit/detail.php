<?php
$idp_url = rawurlencode($p->get('idProduit'));
$idp_html = htmlspecialchars($p->get('idProduit'));
$nomp_html = htmlspecialchars($p->get('nomProduit'));
$desc_html = htmlspecialchars($p->get('description'));
$coul_html = htmlspecialchars($p->get('couleur'));
$p_html = htmlspecialchars($p->get('prix'));
$idc_html = htmlspecialchars($p->get('idCategorie'));
echo""
    ."<p>"
    ."".($idp_html). ": ".$nomp_html
    ."<br>"
    ."Descprition".$desc_html
    ."<br>"
    ."Couleur :" .$coul_html
    ."<br>"
    ."Prix:".$p_html
    ."<br>"
    ."idCategorie:".$idc_html
    ."<br>"
    ."<a href = \"?action=update&controller=produit&idp=".$idp_url
    ."\"> Modifier</a>"
    ."<a href = \"?action=delete&controller=produit&idp=". $idp_url
    ."\"> Supprimer</a>"
    ."<a href=?action=readAll> Retour </a>"
    ."</p>";