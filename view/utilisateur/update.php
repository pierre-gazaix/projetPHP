<?php
$controller = 'utilisateur';
if (myGet('action') == 'update') {
    $champ = 'readonly';
    $action = 'index.php?controller=utilisateur&action=updated';
    $legend = 'Modification du compte';
    $nom = htmlspecialchars($u->get('nom'));
    $prenom = htmlspecialchars($u->get('prenom'));
    $login = htmlspecialchars($u->get('login'));
    $mail = htmlspecialchars($u->get('mail'));
}else {
    $champ = 'required';
    $action = 'index.php?controller=utilisateur&action=created';
    $legend = 'Inscription';
    $nom = '';
    $prenom = '';
    $login = '';
    $mail = '';
}
if (Session::est_connecte())
    echo '<a  href="?controller=utilisateur&action=deconnect">Se déconnecter ?</a>'; ?>
<form method="post" action="<?php echo $action;?>">
    <fieldset>
        <legend><?php echo $legend ?></legend>
        <p>
            <label>Nom</label>
            <input type="text" name="nom" id="nom_id"
                   value="<?php echo $nom; ?>"/>
        </p>
        <p>
            <label>Prenom</label>
            <input type="text" name="prenom" id="coul_id"
                   value="<?php echo $prenom; ?>"/>
        </p>
        <p>
            <label>Login</label>
            <input type="text" name="login" id="login_id"
                   value="<?php echo $login; ?>"
            <?php echo $champ;?>/>
        </p>
        <label>Mail</label>
        <input type="email" name="mail" id="mail_id"
               value="<?php echo $mail; ?>"
            <?php echo $champ;?>/>
        </p>
        <p>
            <label>Mot de passe</label>
            <input type="password" name="mdp" id="mdp_id">
        </p>
        <p>
            <label>Confirmer</label>
            <input type="password" name="mdp_c" id="cmdp_id">
        </p>
        <input type='hidden' name='controller' value='utilisateur'>
        <input type='hidden' name='action' value=<?php echo $action;?>>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>
