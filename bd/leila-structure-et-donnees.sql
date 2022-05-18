SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE IF NOT EXISTS leila DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE leila;

DROP TABLE IF EXISTS categorie;
CREATE TABLE IF NOT EXISTS categorie (
  cat_id tinyint(4) NOT NULL AUTO_INCREMENT,
  cat_nom varchar(50) CHARACTER SET latin1 NOT NULL,
  cat_type enum('plat','vin') CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (cat_id),
  UNIQUE KEY cat_nom (cat_nom,cat_type)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

INSERT INTO categorie (cat_id, cat_nom, cat_type) VALUES
(5, 'Desserts', 'plat'),
(1, 'Entrées', 'plat'),
(4, 'Fromages', 'plat'),
(2, 'Poissons', 'plat'),
(3, 'Viandes', 'plat'),
(7, 'Vins blancs', 'vin'),
(6, 'Vins mousseux', 'vin'),
(8, 'Vins rouges', 'vin');

DROP TABLE IF EXISTS plat;
CREATE TABLE IF NOT EXISTS plat (
  pla_id smallint(6) NOT NULL AUTO_INCREMENT,
  pla_nom varchar(255) CHARACTER SET latin1 NOT NULL,
  pla_detail varchar(500) CHARACTER SET latin1 NOT NULL COMMENT 'Description du plat ou mention des ingrédients ou accompgements.',
  pla_portion tinyint(4) NOT NULL DEFAULT '1' COMMENT 'Indication du nombre minimal de convives qui partagent ce plat.',
  pla_prix decimal(5,2) NOT NULL,
  pla_cat_id_ce tinyint(4) NOT NULL,
  PRIMARY KEY (pla_id),
  KEY pla_cat_id_ce (pla_cat_id_ce)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=14 ;

INSERT INTO plat (pla_id, pla_nom, pla_detail, pla_portion, pla_prix, pla_cat_id_ce) VALUES
(1, 'Escargots à la crème d’ail', '', 1, '31.00', 1),
(2, 'Foie gras de canard poêlé aux coings', 'gâteau et infusion de coing à la verveine', 2, '34.00', 1),
(3, 'Jardin de champignons d’automne', 'crème de cèpes, émulsion au thé noir', 1, '33.00', 1),
(4, 'Sandre à la peau croustillante', 'fondue d’échalotes, sauce au vin rouge', 1, '42.00', 2),
(5, 'Saint-pierre rôti aux olives taggiasche', 'mousseline d’artichaut, fumet de poisson au citron kalamansi', 1, '49.00', 2),
(6, 'Bar cuit à la vapeur et criste marine', 'déclinaison de riz et coquillages, jus au curcuma', 2, '58.00', 2),
(7, 'Côte de porcelet et poitrine de cochon du Cantal croustillant', 'légumes de saison et crémeux de céleri-rave', 1, '42.00', 3),
(8, 'Filet de canette rôti sur la peau, jus au porto infusé à l’hibiscus', 'tartelette de figues et cuisse confite, petite chartreuse de figues', 1, '44.00', 3),
(9, 'Ris de veau doré au sautoir et cèpes', 'mousseline de cèpes, jus de veau à la cazette du Morvan', 1, '63.00', 3),
(10, 'Chariot de fromages affinés de nos régions', '', 1, '12.00', 4),
(11, 'Poire Louise Bonne pochée au citron doux', 'parfait glacé à la Nepeta, crumble de petit épeautre', 1, '13.00', 5),
(12, 'Fleur de cassis de Bourgogne', 'chiboust à la vanille et chocolat grand cru de Madagascar', 1, '13.00', 5),
(13, 'Tarte fine aux pommes de Bernard Loiseau', 'sorbet pomme verte', 1, '12.00', 5);

DROP TABLE IF EXISTS vin;
CREATE TABLE IF NOT EXISTS vin (
  vin_id smallint(6) NOT NULL AUTO_INCREMENT,
  vin_nom varchar(255) CHARACTER SET latin1 NOT NULL,
  vin_detail varchar(500) CHARACTER SET latin1 NOT NULL,
  vin_provenance varchar(100) CHARACTER SET latin1 NOT NULL,
  vin_annee year(4) NOT NULL,
  vin_prix decimal(5,2) NOT NULL,
  vin_cat_id_ce tinyint(4) NOT NULL,
  PRIMARY KEY (vin_id),
  KEY vin_cat_id_ce (vin_cat_id_ce)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=66 ;

INSERT INTO vin (vin_id, vin_nom, vin_detail, vin_provenance, vin_annee, vin_prix, vin_cat_id_ce) VALUES
(1, 'Cidre Fermier Biologique', 'Des Bulles, Genre, Clos Saragnat', 'Québec', 2012, '38.00', 6),
(2, 'Cidre Mousseux', 'Récolte 2012, Michel Jodoin', 'Québec', 2012, '45.00', 6),
(3, 'Cava Brut', '1312, Mestres', 'Espagne', 2012, '50.00', 6),
(4, 'Savoie', 'Ayse Brut, Dominique Belluard', 'France', 2012, '72.00', 6),
(5, 'Champagne Brut Nature', '1er Cru Vertus, Blanc de Blancs, Pascal Doquet', 'France', 2012, '115.00', 6),
(6, 'Champagne Extra Brut', 'Fleury 2000', 'France', 2012, '150.00', 6),
(7, 'Champagne Extra Brut', 'Saignée de Sorbée, Vouette & Sorbée', 'France', 2012, '160.00', 6),
(8, 'Champagne Extra Brut, Les Béguines, La Closerie', '', 'France', 2012, '180.00', 6),
(9, 'Cavalier du Versant', 'Domaine Gélinas 2011', 'Québec', 2012, '42.00', 7),
(10, 'Mantinia, Moschofilero', 'Tselepos Classique 2013', 'Grèce', 2012, '46.00', 7),
(11, 'Côtes de Duras, Nadia', 'Nadia Lusseau 2013', 'France', 2012, '48.00', 7),
(12, 'Muscadet Sèvre et Maine', 'Vincent Caillé 2013', 'France', 2012, '50.00', 7),
(13, 'Saint-Foy Bordeaux Blanc', 'Château les Mangons 2012', 'France', 2012, '54.00', 7),
(14, 'Burgenland, Grüner Veltliner', 'Meinklang 2013', 'Autriche', 2012, '55.00', 7),
(15, 'Vin de France ( Bergerac, Sud-Ouest)', 'Les Abeilles de Collinettes, Lestignac 2012', 'France', 2012, '57.00', 7),
(16, 'Les Rosiers', 'Les Pervenches 2013', 'Québec', 2012, '62.00', 7),
(17, 'Vin de Table (Roussillon), Juste Ciel !', 'La Petite Baigneuse 2012', 'France', 2012, '62.00', 7),
(18, 'Vin de France (Beaujolais), Escapade', 'France Gonzalvez 2012', 'France', 2012, '63.00', 7),
(19, 'Badisher Landwein, Viviser', ' Ziereisen 2011', 'Allemagne', 2012, '65.00', 7),
(20, 'Südtirol-Alto Aldige', 'Chardonnay, Hartman Donà 2012', 'Italie', 2012, '67.00', 7),
(21, 'Nahe, WeisserBurgunder Troken Gäseritsch', 'Weingut Hahnmühle 2012', 'Allemagne', 2012, '70.00', 7),
(22, 'Priorat, Clos Martina 2011', 'Mas den Blei 2011', 'Espagne', 2012, '72.00', 7),
(23, 'Vino Bianco (Piémont)', 'Ezio Trinchero', 'Italie', 2012, '75.00', 7),
(24, 'Côtes du Jura, Naturé', 'Domaine Berthet Bondet 2012', 'France', 2012, '78.00', 7),
(25, 'Venezia Giulia, Ribolla Gialla', 'Paraschos 2009', 'Italie', 2012, '82.00', 7),
(26, 'Vin de Savoie, Le Feu', 'Dominique Belluard 2011', 'France', 2012, '86.00', 7),
(27, 'Somlo, Juhfark', 'Meinklang 2010', 'Hongrie', 2012, '87.00', 7),
(28, 'Anjou, Victoire', 'Nicolas Reau 2012', 'France', 2012, '89.00', 7),
(29, 'Vacqueyras, Minéral', 'Montirius 2011', 'France', 2012, '89.00', 7),
(30, 'Vin de France (Loire), Vino Bianco', 'Marie Thibault 2011', 'France', 2012, '92.00', 7),
(31, 'Saint-Véran, La Goutte du Charme', 'Domaine Combier 2011', 'France', 2012, '96.00', 7),
(32, 'Bourgogne, Le Petit Têtu', 'Jean-Marie Berrux 2012', 'France', 2012, '99.00', 7),
(33, 'Beaune 1er Cru Les Coucherias', 'J.Claude Rateau 2002', 'France', 2012, '102.00', 7),
(34, 'Sancerre, Monts Damnés', 'Gérard Boulay 2011', 'France', 2012, '110.00', 7),
(35, 'Côtes du Jura', 'Savagnin Les Chalasses Marnes Bleues 2011', 'France', 2012, '130.00', 7),
(36, 'Meursault', 'Jean Philippe Fichet 2011', 'France', 2012, '155.00', 7),
(37, 'Hermitage, Prisme', 'Julien Pilon 2012', 'France', 2012, '175.00', 7),
(38, 'Chablis 1er Cru Forêt', 'Domaine François Raveneau 2011', 'France', 2012, '180.00', 7),
(39, 'Côtes du Rhône Signargues', 'Domain de la Coudette 2012', 'France', 2012, '43.00', 8),
(40, 'Marcillac, Cuvée Laïris', 'Jean-Luc Matha 2010', 'France', 2012, '44.00', 8),
(41, 'Rioja', 'Vina Ilusion 2013', 'Espagne', 2012, '48.00', 8),
(42, 'Côtes du Rhône, Cuvée Tradition', 'Domaine les Hautes Cances 2011', 'France', 2012, '50.00', 8),
(43, 'Vin de France (Ardèche), Vin Nu', 'Les Deux Terres 2013', 'France', 2012, '50.00', 8),
(44, 'BO2 (Andalousie)', 'Barranco Oscuro', 'Espagne', 2012, '52.00', 8),
(45, 'Vin de France (Beaujolais), Raisins Gaulois', 'M. Lapierre 2013', 'France', 2012, '53.00', 8),
(46, 'Bourgueil, Avis de Vin Fort', 'Domaine Breton 2013', 'France', 2012, '57.00', 8),
(47, 'Saumur Champigny, Ruben', 'Domaine Bobinet 2013', 'France', 2012, '61.00', 8),
(48, 'Burgenland, Blaufränkish', 'Moric 2012', 'Autriche', 2012, '66.00', 8),
(49, 'Vino Rosso (Sicile), Palmento', 'Vino di Anna 2012', 'Italie', 2012, '68.00', 8),
(50, 'Sainte-Foy Bordeaux', 'Château les Mangons 2003', 'France', 2012, '70.00', 8),
(51, 'Régnié', 'G. Descombes 2011', 'France', 2012, '75.00', 8),
(52, 'Arbois Pupillin, La Chamade', 'Philippe Bornard 2010', 'France', 2012, '78.00', 8),
(53, 'Rheingau, Spätburguner Rotwein Trocken', 'Peter Jakob Kühn 2012', 'Allemagne', 2012, '80.00', 8),
(54, 'Monferrato Dolcetto, Le Taragne', 'Ezio Trinchero 2006', 'Italie', 2012, '82.00', 8),
(55, 'Campania Aglianico, Drogone', 'Cantina Giardino 2008', 'Italie', 2012, '85.00', 8),
(56, 'Rosso Veneto, Verdugo', 'Masiero Gianfranco 2010', 'Italie', 2012, '96.00', 8),
(57, 'Rioja, Vina Tondonia', 'R. Lopez de Heredia 2002', 'Espagne', 2012, '99.00', 8),
(58, 'Pic Saint-Loup (Languedoc), Fleuve Amour', 'Zélige-Caravent 2010', 'France', 2012, '105.00', 8),
(59, 'Auxey-Duresses', 'Alain Gras 2012', 'France', 2012, '108.00', 8),
(60, 'Macon, La Maison Romane', 'Château de Berzé 2011', 'France', 2012, '112.00', 8),
(61, 'Barolo', 'Josetta Saffirio 2009', 'Italie', 2012, '125.00', 8),
(62, 'Marsannay, Trois Terres', 'Domaine Jean Fournier 2011', 'France', 2012, '130.00', 8),
(63, 'Barbaresco (Piémont), Montestefano', 'Rivella Serafino 2009', 'Italie', 2012, '131.00', 8),
(64, 'Cornas, Chaillot', 'Thierry Allemand 2009', 'France', 2012, '175.00', 8),
(65, 'Nuits Saint Georges, Les Damodes', 'Domaine Ballorin 2010', 'France', 2012, '190.00', 8);


ALTER TABLE plat
  ADD CONSTRAINT plat_ibfk_1 FOREIGN KEY (pla_cat_id_ce) REFERENCES categorie (cat_id);

ALTER TABLE vin
  ADD CONSTRAINT vin_ibfk_1 FOREIGN KEY (vin_cat_id_ce) REFERENCES categorie (cat_id);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
