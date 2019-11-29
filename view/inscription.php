<!DOCTYPE html>
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

    if(!empty($_POST['login']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
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
<html>

<head>

    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="Style.css" />
    <title>Devialet | Equipe</title>
    <link rel="icon" type="image/png" href="./Images/JPEG/LogoOnglet.png" sizes="16x16">

</head>

<body>

<header>

    <a href="../index.php"><img src="./Images/JPEG/LogoN.png" alt="LogoDevialet"></a>

    <div id="MenuBurger">

        <input id="Nav_Check" type="checkbox" />

        <ul id="MenuB">
            <li><a href="../index.php">ACCUEIL</a></li>
            <li><a href="./Produit.html">PRODUIT</a></li>
            <li><a href="./Presse.html">PRESSE</a></li>
            <li><a href="./Equipe.html">EQUIPE</a></li>
            <li><a href="./Contact.html">CONTACT</a></li>
            <li><a href="./Rejoindre.html">NOUS REJOINDRE</a></li>
            <li><a href="./FAQ.html">FAQ</a></li>
        </ul>
    </div>

    <nav>
        <ul>
            <li id="Produit"><a href="./Produit.html">PRODUIT</a></li>
            <li id="Presse"><a href="./Presse.html">PRESSE</a></li>
            <li id="Equipe"><a href="./Equipe.html">EQUIPE</a></li>
            <li id="Contact"><a href="./Contact.html">CONTACT</a></li>
            <li id="Rejoindre"><a href="./Rejoindre.html">NOUS REJOINDRE</a>
                <div class="submenu">
                    <div id="metier_1"><a href="./metier_1.html">● Métier 1 ●</a></div>
                    <div id="metier_2"><a href="./metier_2.html">● Métier 2 ●</a></div>
                    <div id="metier_3"><a href="./metier_3.html">● Métier 3 ●</a></div>
                    <div id="metier_4"><a href="./metier_4.html">● Métier 4 ●</a></div>
                </div>
            </li>
            <li id="FAQ"><a href="./FAQ.html">FAQ</a></li>
        </ul>
    </nav>

</header>

<div class="Holygrail-body" align="center">

    <aside class="Holygrail-asideleft">

    </aside>

    <main class="Holygrail-main">


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

    </main>

    <aside class="Holygrail-asideright">

    </aside>

</div>

<footer>
    <p>Contactez nous via le <strong><a href="./Contact.html">formulaire</a></strong>, par <strong>téléphone au 0123456789</strong> ou retrouvez nous directement en <strong><a href="./Boutique.html">boutique</a></strong>.</p>
    <hr>
    <div>
        <ul class="Réseau">
            <li>Rejoignez nous</li>
            <li><a href="https://www.facebook.com/DevialetGlobal/"> <img src="Images/JPEG/facebook.png" alt="facebook entreprise" /> </a></li>
            <li><a href="https://twitter.com/devialet"> <img src="Images/JPEG/twitter.png" alt="twitter entreprise" /> </a></li>
            <li><a href="https://www.linkedin.com/uas/login"> <img src="Images/JPEG/linkedin.png" alt="linkedin entreprise" /> </a></li>
        </ul>
        <div id="newletters">
            <form>
                <p>Newsletters</p>
                <ul id="casenews">
                    <li><input type="email" name="email" placeholder="mail@domaine.com" id="mail"></li>
                    <li><input type="submit" id="submit" value="➤"></li>
                </ul>
            </form>
        </div>
    </div>

    <p id="copyright"> © 2019 Devialet All right reserved - Legal notices  </p>

</footer>

</body>

</html>