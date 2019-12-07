<h4>Votre commande n°<?php echo $tabCommande[0]['idCommande']?></h4>
<table>
    <tr>
        <td>Nom categorie</td>
        <td>Nom produit</td>
        <td>Couleur</td>
        <td>Prix</td>
        <td>Quantité</td>
    </tr>
    <?php
    foreach ($tabCommande as $commande) {
            $nomc_html = htmlspecialchars($commande['nomCategorie']);
            $nomp_html = htmlspecialchars($commande['nomProduit']);
            $coul_html = htmlspecialchars($commande['couleur']);
            $p_html = htmlspecialchars($commande['prix']);
            $qte_html = htmlspecialchars($commande['quantite']);
            ?>
            <tr>
                <td><?php echo $nomc_html ?></td>
                <td><?php echo $nomp_html ?></td>
                <td><?php echo $coul_html ?></td>
                <td><?php echo $p_html ?></td>
                <td><?php echo $qte_html ?></td>
            </tr>
            <?php
        }
    ?>
</table>
<a href="?controller=commande&action=read">Revenir aux commandes </a>
