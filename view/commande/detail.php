<legend>Votre commande n°<?php echo $tab_tab_commande[0]['idCommande']?></legend>
<table>
    <tr>
        <td>Nom categorie</td>
        <td>Nom produit</td>
        <td>Couleur</td>
        <td>Prix</td>
        <td>Quantité</td>
    </tr>
    <?php
    foreach ($tab_tab_commande as $tab_commande) {
            $nomc_html = htmlspecialchars($tab_commande['nomCategorie']);
            $nomp_html = htmlspecialchars($tab_commande['nomProduit']);
            $coul_html = htmlspecialchars($tab_commande['couleur']);
            $p_html = htmlspecialchars($tab_commande['prix']);
            $qte_html = htmlspecialchars($tab_commande['quantite']);
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
<a href=?controller=commande&action=read>Revenir aux commandes <a/>
