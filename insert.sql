CREATE TABLE `rGztzErq-Categories` (
  `idCategorie` int(11) NOT NULL,
  `nomCategorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `rGztzErq-Categories`
  ADD PRIMARY KEY (`idCategorie`);
  ALTER TABLE `rGztzErq-Categories`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT;

  CREATE TABLE `rGztzErq-Produits` (
  `idProduit` int(11) NOT NULL,
  `nomProduit` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `couleur` varchar(24) NOT NULL,
  `prix` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
 `idCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `rGztzErq-Produits`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `fk_idCat` (`idCategorie`);
  ALTER TABLE `rGztzErq-Produits`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT;
  ALTER TABLE `rGztzErq-Produits`
  ADD CONSTRAINT `fk_idCat` FOREIGN KEY (`idCategorie`) REFERENCES `rGztzErq-Categories` (`idCategorie`) ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO `rGztzErq-Categories` (`idCategorie`, `nomCategorie`) VALUES ('1', 'Enceinte'), ('2', 'Accessoire'), ('3', 'Amplificateur');

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
       ('11', 'Phantom Royality', 'L\'enceinte des rois.', 'Rose', '4200', '0', '1');

INSERT INTO `rGztzErq-Produits` (`idProduit`, `nomProduit`, `description`, `couleur`, `prix`, `quantite`, `idCategorie`)
VALUES ('12', 'Pieds', 'Des petits pieds pour votre petite enceinte.', 'Blanc', '149', '100', '2'),
       ('13', 'Pieds', 'Des petits pieds pour votre petite enceinte.', 'Noir', '149', '90', '2'),
       ('14', 'Cocoon', 'Un petit sac pour transporter votre mignonne enceinte.', 'Noir', '249', '150', '2'),
       ('15', 'Cocoon', 'Un petit sac pour transporter votre mignonne enceinte.', 'Blanc', '249', '140', '2'),
       ('16', 'Cocoon', 'Un petit sac pour transporter votre mignonne enceinte.', 'Orange', '249', '45', '2'),
       ('17', 'Gecko', 'Collez, décollez et recollez votre enceinte partout !', 'Blanc', '199', '60', '2'),
       ('18', 'Gecko', 'Collez, décollez et recollez votre enceinte partout !', 'Noir', '199', '60', '2'),
       ('19', 'Dialog', 'Faites en sorte que vos enceintes parlent en même temps. Evitons un brouhaha inutile avec Dialog.', 'Gris', '299', '35', '2'),
       ('20', 'Remote', 'Contrôlez vos enceintes même depuis votre canapé, flemmard !', 'Gris', '149', '25', '2');

INSERT INTO `rGztzErq-Produits` (`idProduit`, `nomProduit`, `description`, `couleur`, `prix`, `quantite`, `idCategorie`)
VALUES ('21', 'Expert 140 pro', 'Si vous avez toujours de l\'argent, dépensez le pour améliorer la qualité du son de vos enceintes.', 'Gris', '4990', '50', '3'),
       ('22', 'Expert 220 pro', 'Même principe que le Expert 140 pro, en plus cher et plus performant.', 'Gris', '7990', '45', '3'),
       ('23', 'Expert 250 pro', 'Même principe que le Expert 220 pro, en plus cher et plus performant.', 'Gris', '14990', '40', '3'),
       ('24', 'Expert 210 pro dual', 'Si vous avez toujours de l\'argent, dépensez le pour améliorer la qualité du son de vos enceintes.', 'Gris', '9900', '20', '3'),
       ('25', 'Expert 440 pro dual', 'Même principe que le Expert 210 pro dual, en plus cher et plus performant.', 'Gris', '14900', '15', '3'),
       ('26', 'Expert 1000 pro dual', 'Même principe que le Expert 440 pro dual, en plus cher et plus performant.', 'Gris', '27900', '10', '3');

