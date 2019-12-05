<?php

if(isset($_POST['forminscription']))
{
    $login = htmlspecialchars($_POST['login']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);

    if(!empty($_POST['login'])
        && !empty($_POST['mail'])
        && !empty($_POST['mail2'])
        && !empty($_POST['nom'])
        && !empty($_POST['prenom'])
        && !empty($_POST['mdp'])
        && !empty($_POST['mdp2']))
    {

        $loginlength = strlen($login);
        if ($loginlength <= 255)
        {
            if($mail == $mail2)
            {
                if(filter_var($mail, FILTER_VALIDATE_EMAIL))
                {

                    if($mdp == $mdp2){
                       /* "INSEREZ DANS LA TABLE"
                    "INSEREZ DANS LA TABLE"
                    "INSEREZ DANS LA TABLE"
                    "INSEREZ DANS LA TABLE"
                    "INSEREZ DANS LA TABLE"
                    "INSEREZ DANS LA TABLE"
                    "INSEREZ DANS LA TABLE"
                    "INSEREZ DANS LA TABLE"
                    "INSEREZ DANS LA TABLE"
                    "INSEREZ DANS LA TABLE"*/
                }
                    else
                    {
                        $erreur = "Vos mots de passe ne correspondent pas.";
                    }
                }
                else
                {
                    $erreur = "Votre adresse mail n'est pas valide";
                }
            }
            else{
                $erreur = "Vos adresses mails ne correspondent pas.";
            }
        }
        else
        {
            $erreur = "Votre pseudo ne doit pas faire plus de 255 caractères.";
        }
    }
    else{
        $erreur = "Tous les champs doivent être complétés !";
    }
}

?>

        <h2>Inscription</h2>

        <form method="POST" action"">
        <table id="tabletruc">
            <tr>
                <td align="center">
                    <label for="login"> Login </label>
                </td>
                <td>
                    <input type="text" id="login" name="login" value="<?php if(isset($login)) { echo $login; }?>">
                </td>
            </tr>
            <tr>
                <td align="center">
                    <label for="mail"> Mail </label>
                </td>
                <td>
                    <input type="email" id="maill" name="mail"  value="<?php if(isset($mail)) { echo $mail; }?>">
                </td>
            </tr>
            <tr>
                <td align="center">
                    <label for="mail2"> Confirmation mail </label>
                </td>
                <td>
                    <input type="email" id="mail2" name="mail2"  value="<?php if(isset($mail2)) { echo $mail2; }?>">
                </td>
            </tr>
            <tr>
                <td align="center">
                    <label for="nom"> Nom </label>
                </td>
                <td>
                    <input type="text" id="nom" name="nom"  value="<?php if(isset($nom)) { echo $nom; }?>">
                </td>
            </tr>
            <tr>
                <td align="center">
                    <label for="prenom"> Prénom </label>
                </td>
                <td>
                    <input type="text" id="prenom" name="prenom"  value="<?php if(isset($prenom)) { echo $prenom; }?>">
                </td>
            </tr>
            <tr>
                <td align="center">
                    <label for="mdp"> Mot de passe </label>
                </td>
                <td>
                    <input type="password" id="mdp" name="mdp" >
                </td>
            </tr>
            <tr>
                <td align="center">
                    <label for="mdp2"> Confirmation mot de passe </label>
                </td>
                <td>
                    <input type="password" id="mdp2" name="mdp2">
                </td>
            </tr>
        </table>
        <br>
        <input type="submit" name="forminscription" value="Je m'inscris">
        </form>

        <?php

        if(isset($erreur))
        {
            echo '<font color="red">'.$erreur.'</font>';
        }

        ?>