<!DOCTYPE html>

<html>

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
        </ul>
    </div>

    <nav>
        <ul>
            <li id="Produit"><a href="./view/Produit.html">PRODUIT</a></li>
            <li id="Presse"><a href="./view/Presse.html">PRESSE</a></li>
            <li id="Equipe"><a href="./view/Equipe.html">EQUIPE</a></li>
            <li id="Contact"><a href="./view/Contact.html">CONTACT</a></li>
            <li id="Rejoindre"><a href="./view/Rejoindre.html">NOUS REJOINDRE</a>
                <div class="submenu">
                    <div id="metier_1"><a href="./view/metier_1.html">● Métier 1 ●</a></div>
                    <div id="metier_2"><a href="./view/metier_2.html">● Métier 2 ●</a></div>
                    <div id="metier_3"><a href="./view/metier_3.html">● Métier 3 ●</a></div>
                    <div id="metier_4"><a href="./view/metier_4.html">● Métier 4 ●</a></div>
                </div>
            </li>
            <li id="FAQ"><a href="./view/FAQ.html">FAQ</a></li>
        </ul>
    </nav>

</header>

<div class="Holygrail-body">
    <aside class="Holygrail-asideleft">
        <?php
        if($view == 'list' ||$view == 'updated' ||$view == 'created'  ) {
            $filepath = File::build_path(array('view', $controller, "filter.php"));
            require_once $filepath;
        }
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
    <p>Contactez nous via le <strong><a href="./Contact.html">formulaire</a>
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