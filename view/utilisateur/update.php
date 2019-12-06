<?php
$controller = 'utilisateur';
if ($_GET['action'] == 'update') {
    $champ = 'readonly';
    $action = 'updated';
    $legend = 'Modification du compte';
}else {
    $champ = 'required';
    $action = 'created';
    $legend = 'Inscription';
}
?>
<a  href="?controller=utilisateur&action=deconnect">Se déconnecter ?</a>
<form method="get" action="">
    <fieldset>
        <legend><?php echo $legend ?></legend>
        <p>
            <label for="nom_id">Nom</label>
            <input type="text" name="nom" id="nom_id"
                   value="<?php echo htmlspecialchars($u->get('nom')); ?>"/>
        </p>
        <p>
            <label for="prenom_id">Prenom</label>
            <input type="text" name="prenom" id="coul_id"
                   value="<?php echo htmlspecialchars($u->get('prenom')); ?>"/>
        </p>
        <p>
            <label for="login_id">Login</label>
            <input type="text" name="login" id="login_id"
                   value="<?php echo htmlspecialchars($u->get('login')); ?>"
            <?php echo $champ;?>="true"/>
        </p>
        <p>
            <label for="mdp_id">Mot de passe</label>
            <input type="password" name="mdp" id="mdp_id" ?>
        </p>
        <p>
            <label for="cmdp_id">Confirmer</label>
            <input type="password" name="mdp" id="cmdp_id">
        </p>
        <input type='hidden' name='controller' value='utilisateur'>
        <input type='hidden' name='action' value=<?php echo $action;?>>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>
