<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="./view/Style.css" />
    <link rel="icon" type="image/png" href="./view/Images/JPEG/LogoOnglet.png">
    <title><?php echo $pagetitle; ?></title>

</head>

<body>

<header class="Accueil_Holygrail-header">

    <a href="./index.php"><img src="./view/Images/JPEG/LogoG.png" alt="LogoDevialet"></a>

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

    <nav class="Accueil_Holygrail-nav">
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
<main>
    <?php
    $filepath = File::build_path(array('view', $controller, "$view.php"));
    require_once $filepath;
    ?>
</main>
</body>
</html>