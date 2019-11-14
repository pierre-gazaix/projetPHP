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
  `idCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `rGztzErq-Produits`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `fk_idCat` (`idCategorie`);
  ALTER TABLE `rGztzErq-Produits`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT;
  ALTER TABLE `rGztzErq-Produits`
  ADD CONSTRAINT `fk_idCat` FOREIGN KEY (`idCategorie`) REFERENCES `rGztzErq-Categories` (`idCategorie`) ON DELETE CASCADE ON UPDATE CASCADE;
INSERT INTO `rgztzerq-categories` (`idCategorie`, `nomCategorie`) VALUES (NULL, 'Enceinte'), (NULL, 'Accessoire'), (NULL, 'Pied'), (NULL, 'Support');
INSERT INTO `rgztzerq-produits` (`idProduit`, `nomProduit`, `description`, `couleur`, `prix`, `idCategorie`) VALUES (NULL, 'Devialet 500', 'Une enceinte révolutionnaire', 'Noir', '2500', '1'), (NULL, 'Housse de protection', 'Une magnifique housse', 'Noir', '250', '2');