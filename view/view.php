<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="./view/Style.css" />
    <link rel="icon" type="image/png" href="./view/Images/JPEG/LogoOnglet.png"
          sizes="16x16">
    <title><?php echo $pagetitle; ?></title>


</head>

<body>

<header>

    <a href="./index.php"><img src="./view/Images/JPEG/LogoN.png" alt="LogoDevialet"></a>

    <div id="MenuBurger">

        <input id="Nav_Check" type="checkbox" />

        <ul id="MenuB">
            <li><a href="./index.php">ACCUEIL</a></li>
            <li><a href="./view/Produit.html">PRODUIT</a></li>
            <li><a href="./view/Presse.html">PRESSE</a></li>
            <li><a href="./view/Equipe.html">EQUIPE</a></li>
            <li><a href="./view/Contact.html">CONTACT</a></li>
            <li><a href="./view/Rejoindre.html">NOUS REJOINDRE</a></li>
            <li><a href="./view/FAQ.html">FAQ</a></li>
            <li><a  href="?controller=Panier&action=read">PANIER</a></li>
            <li><a  href="?controller=commande&action=read">VOS COMMANDES</a></li>
            <li><a  href="?controller=utilisateur&action=connect">SE CONNECTER</a></li>
        </ul>
    </div>

    <nav>
        <ul>
            <li><a href="./index.php?action=accueil">ACCUEIL</a></li>
            <li id="Produit"><a href="./view/Produit.html">PRODUIT</a></li>
            <li id="FAQ"><a href="./view/FAQ.html">FAQ</a></li>
            <li id="panier"><a  href="?controller=Panier&action=read">PANIER</a></li>
            <li id="commande"><a  href="?controller=commande&action=read">COMMANDES</a></li>
            <?php if(!Session::est_connecte()){?>
            <li id="connexion"><a  href="?controller=utilisateur&action=connect">CONNEXION</a></li>
            <?php }else{?>
            <li id="deconnexion"><a  href="?controller=utilisateur&action=update&u=<?php echo $_SESSION['login']?>">MON COMPTE</a></li>
                    <?php }?>
        </ul>
    </nav>

</header>

<div class="Holygrail-body">
    <aside class="Holygrail-asideleft">
        <?php
        /*if($view == 'list' ||$view == 'updated' || $view == 'created' || $view == 'ordered'  ) {
            $filepath = File::build_path(array('view', "produit", "filter.php"));
            require_once $filepath;
        }*/
        ?>
    </aside>

    <main class="Holygrail-main">
        <?php
        $filepath = File::build_path(array('view', $controller, "$view.php"));
        require_once $filepath;
        ?>
    </main>
    <aside class="Holygrail-asideright">

    </aside>

</div>

<footer>
    <p>Contactez nous via le <strong><a href="./view/Contact.html">formulaire</a>
        </strong>, par <strong>téléphone au 0123456789</strong> ou retrouvez nous directement en <strong><a href="./view/Boutique.html">boutique</a></strong>.</p>
    <hr>
    <div>
        <ul class="Réseau">
            <li>Rejoignez nous</li>
            <li><a href="https://www.facebook.com/DevialetGlobal/"> <img src="view/Images/JPEG/facebook.png" alt="facebook entreprise" /> </a></li>
            <li><a href="https://twitter.com/devialet"> <img src="view/Images/JPEG/twitter.png" alt="twitter entreprise" /> </a></li>
            <li><a href="https://www.linkedin.com/uas/login"> <img src="view/Images/JPEG/linkedin.png" alt="linkedin entreprise" /> </a></li>
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