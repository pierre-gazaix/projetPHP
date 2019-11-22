<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="Style.css" />
        <link rel="icon" type="image/png" href="./Images/JPEG/LogoOnglet.png">
        <title>Devialet | Accueil</title>

    </head>

    <body>

        <div id="Accueil_boite-video">
            <video autoplay loop muted class="Video-Accueil">
              <source src="./Videos/Presentation.webm.webm" type="video/webm">
               <source src="./Videos/Presentation.mp4.mp4" type="video/mp4">
             </video>
        </div>

        <header class="Accueil_Holygrail-header">

            <a href="./view/viewAccueil.php"><img src="./Images/JPEG/LogoG.png" alt="LogoDevialet"></a>

            <div id="MenuBurger">

                <input id="Nav_Check" type="checkbox" />

                <ul id="MenuB">
                    <li><a href="./Accueil.php">ACCUEIL</a></li>
                    <li><a href="./Produit.html">PRODUIT</a></li>
                    <li><a href="./Presse.html">PRESSE</a></li>
                    <li><a href="./Equipe.html">EQUIPE</a></li>
                    <li><a href="./Contact.html">CONTACT</a></li>
                    <li><a href="./Rejoindre.html">NOUS REJOINDRE</a></li>
                    <li><a href="./FAQ.html">FAQ</a></li>
                </ul>
            </div>

            <nav class="Accueil_Holygrail-nav">
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

    </body>

</html>