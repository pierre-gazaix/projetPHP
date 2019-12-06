      <h4>Commandes passées</h4>
<table>
    <tr>
        <td>idCommande</td>
        <td>Login</td>
        <td>Montant de la commande</td>
        <td>Date de la commande</td>
        <td>État de la commande</td>
    </tr>
    <?php
foreach ($tab_c as $c){
    $idc_html = htmlspecialchars($c->get('idCommande'));
    $dtc_html = htmlspecialchars($c->get('dateCommande'));
    $lg_html = htmlspecialchars($c->get('login'));
    $mc_html = htmlspecialchars($c->get('montantCommande'));
    $ec_html = htmlspecialchars($c->get('etatCommande'));
    $idc_url = rawurlencode($c->get('idCommande'));
?>
    <tr>
        <td><a href="?controller=commande&action=show&idc=<?php echo $idc_url?>"><?php echo $idc_html?></a></td>
        <td><?php echo $lg_html?></td>
        <td><?php echo $mc_html?></td>
        <td><?php echo $dtc_html?></td>
        <td><?php echo $ec_html?></td>
    </tr>
<?php
}
?>
</table>
