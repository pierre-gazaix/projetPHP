    DROP TABLE `rGztzErq-LignesCommande`;
    DROP TABLE `rGztzErq-Commandes`;
    DROP TABLE `rGztzErq-Produits`;
    DROP TABLE `rGztzErq-Categories`;
    DROP TABLE `rGztzErq-Utilisateurs`;

    CREATE TABLE `rGztzErq-Categories`(
                                        `idCategorie` INT(11) NOT NULL AUTO_INCREMENT,
                                        `nomCategorie` VARCHAR(500) NOT NULL ,
                                        PRIMARY KEY (`idCategorie`))
      ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

    CREATE TABLE `rGztzErq-Produits` (
                                       `idProduit` INT(11) NOT NULL AUTO_INCREMENT,
                                       `nomProduit` VARCHAR(500),
                                       `description` VARCHAR(15000),
                                       `couleur` VARCHAR(24),
                                       `prix` INT(12),
                                       `quantite` INT(11),
                                       `idCategorie` INT(11),
                                       PRIMARY KEY (`idProduit`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

    ALTER TABLE `rGztzErq-Produits`
        ADD FOREIGN KEY (`idCategorie`)
        REFERENCES `rGztzErq-Categories`(`idCategorie`)
        ON DELETE CASCADE ON UPDATE CASCADE;

    CREATE TABLE `rGztzErq-Utilisateurs` (
                                           `login` VARCHAR(25) NOT NULL ,
                                           `nom` VARCHAR(20) NOT NULL ,
                                           `prenom` VARCHAR(20) NOT NULL ,
                                           `mail` VARCHAR(256) NOT NULL,
                                           `nonce` VARCHAR (32) NOT NULL,
                                           `mdp` VARCHAR(64) NOT NULL ,
                                           PRIMARY KEY (`login`)) ENGINE = InnoDB DEFAULT CHARSET=utf8;

    CREATE TABLE `rGztzErq-Commandes`(
                                       `idCommande` INT(11) NOT NULL AUTO_INCREMENT,
                                       `dateCommande` DATE NOT NULL,
                                       `login` VARCHAR(25) NOT NULL,
                                       `montantCommande` INT(12) NOT NULL,
                                       `etatCommande` VARCHAR(15) NOT NULL,
                                       PRIMARY KEY (`idCommande`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

    ALTER TABLE `rGztzErq-Commandes`
      ADD FOREIGN KEY (`login`)
        REFERENCES `rGztzErq-Utilisateurs`(`login`)
        ON DELETE CASCADE ON UPDATE CASCADE;

    CREATE TABLE `rGztzErq-LignesCommande`(
                                            `idCommande` INT(11) NOT NULL ,
                                            `idProduit` INT(11) NOT NULL ,
                                            `quantite` INT(11),
                                            PRIMARY KEY (`idCommande`, `idProduit`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;
    ALTER TABLE `rGztzErq-LignesCommande`
      ADD FOREIGN KEY (`idCommande`)
        REFERENCES `rGztzErq-Commandes`(`idCommande`)
        ON DELETE CASCADE ON UPDATE CASCADE,
      ADD FOREIGN KEY (`idProduit`)
        REFERENCES `rGztzErq-Produits`(`idProduit`)
        ON DELETE CASCADE ON UPDATE CASCADE;

    INSERT INTO `rGztzErq-Categories` (`idCategorie`, `nomCategorie`)
    VALUES ('1', 'Enceinte'), ('2', 'Pied'), ('3', 'Accessoire');

    INSERT INTO `rGztzErq-Produits` (`idProduit`, `nomProduit`, `description`, `couleur`, `prix`, `quantite`, `idCategorie`)
    VALUES ('1', 'Classic Phantom', 'La classique !', 'Blanc', '1790', '15', '1'),
           ('2', 'Silver Phantom', 'L\'argent c\'est bien.', 'Argent', '1990', '10', '1'),
           ('3', 'Gold Phantom', 'L\'or c\'est mieux.', 'Or', '2590', '8', '1'),
           ('4', 'Gold Phantom Opéra de Paris', 'L\'or de l\'opéra de Paris n\'a pas de valeur.', 'Or', '2890', '3', '1'),
           ('5', 'Phantom Reactor 600', 'La moins chère de toutes, l\'enceinte pour les faux pauvres.', 'Blanc', '990', '50', '1'),
           ('6', 'Phantom Reactor 600', 'La moins chère de toutes, l\'enceinte pour les faux pauvres.', 'Noir', '990', '40', '1'),
           ('7', 'Phantom Reactor 900', 'Un peu plus chère que la Phantom Reactor 600, pour les un peu moins pauvres.', 'Blanc', '1290', '40', '1'),
           ('8', 'Phantom Reactor 900', 'Un peu plus chère que la Phantom Reactor 600, pour les un peu moins pauvres.', 'Noir', '1290', '30', '1'),
           ('9', 'Phantom Reactor 1200', 'Un peu plus chère que la Phantom Reactor 900, pour les un peu moins pauvres.', 'Blanc', '1590', '30', '1'),
           ('10', 'Phantom Reactor 1200', 'Un peu plus chère que la Phantom Reactor 900, pour les un peu moins pauvres.', 'Noir', '1590', '20', '1'),
           ('11', 'Phantom Royality', 'L\'enceinte des rois.', 'Rose', '4200', '0', '1'),
           ('12', 'Pieds', 'Des petits pieds pour votre petite enceinte.', 'Blanc', '149', '100', '2'),
           ('13', 'Pieds', 'Des petits pieds pour votre petite enceinte.', 'Noir', '149', '90', '2'),
           ('14', 'Cocoon', 'Un petit sac pour transporter votre mignonne enceinte.', 'Noir', '249', '150', '2'),
           ('15', 'Cocoon', 'Un petit sac pour transporter votre mignonne enceinte.', 'Blanc', '249', '140', '2'),
           ('16', 'Cocoon', 'Un petit sac pour transporter votre mignonne enceinte.', 'Orange', '249', '45', '2'),
           ('17', 'Gecko', 'Collez, décollez et recollez votre enceinte partout !', 'Blanc', '199', '60', '2'),
           ('18', 'Gecko', 'Collez, décollez et recollez votre enceinte partout !', 'Noir', '199', '60', '2'),
           ('19', 'Dialog', 'Faites en sorte que vos enceintes parlent en même temps. Evitons un brouhaha inutile avec Dialog.', 'Gris', '299', '35', '2'),
           ('20', 'Remote', 'Contrôlez vos enceintes même depuis votre canapé, flemmard !', 'Gris', '149', '25', '2'),
           ('21', 'Expert 140 pro', 'Si vous avez toujours de l\'argent, dépensez le pour améliorer la qualité du son de vos enceintes.', 'Gris', '4990', '50', '3'),
           ('22', 'Expert 220 pro', 'Même principe que le Expert 140 pro, en plus cher et plus performant.', 'Gris', '7990', '45', '3'),
           ('23', 'Expert 250 pro', 'Même principe que le Expert 220 pro, en plus cher et plus performant.', 'Gris', '14990', '40', '3'),
           ('24', 'Expert 210 pro dual', 'Si vous avez toujours de l\'argent, dépensez le pour améliorer la qualité du son de vos enceintes.', 'Gris', '9900', '20', '3'),
           ('25', 'Expert 440 pro dual', 'Même principe que le Expert 210 pro dual, en plus cher et plus performant.', 'Gris', '14900', '15', '3'),
           ('26', 'Expert 1000 pro dual', 'Même principe que le Expert 440 pro dual, en plus cher et plus performant.', 'Gris', '27900', '10', '3');

    INSERT INTO `rGztzErq-Utilisateurs` (`login`, `nom`, `prenom`,`mail`,`nonce`, `mdp`)
    VALUES
        ('admin', 'admin', 'admin','', '','05bd6bbcad24f3d626dab924845c1fee9669fb9393eaa403e63012b65a8f33e5'),
        ('DLH', 'DLH', 'Dayyaan','', '', 'bbcf10f4616dc523ac9e26a3ac0601a6972d9588d876d19825eb001361cf42ce'),
        ('gazaixp', 'Gazaix', 'Pierre','', '', '65e9e50a4755d54c47a2ef5c1bc6322c8b1fbdfff98f5e38ff8f11b6b2ea992f'),
        ('invité', '', '','', '', '');