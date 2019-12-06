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
<form method="get">
    <fieldset>
        <legend><?php echo $legend ?></legend>
        <p>
            <label>Nom</label>
            <input type="text" name="nom" id="nom_id"
                   value="<?php echo htmlspecialchars($u->get('nom')); ?>"/>
        </p>
        <p>
            <label>Prenom</label>
            <input type="text" name="prenom" id="coul_id"
                   value="<?php echo htmlspecialchars($u->get('prenom')); ?>"/>
        </p>
        <p>
            <label>Login</label>
            <input type="text" name="login" id="login_id"
                   value="<?php echo htmlspecialchars($u->get('login')); ?>"
            <?php echo $champ;?>/>
        </p>
        <p>
            <label>Mot de passe</label>
            <input type="password" name="mdp" id="mdp_id">
        </p>
        <p>
            <label>Confirmer</label>
            <input type="password" name="mdp" id="cmdp_id">
        </p>
        <input type='hidden' name='controller' value='utilisateur'>
        <input type='hidden' name='action' value=<?php echo $action;?>>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>
