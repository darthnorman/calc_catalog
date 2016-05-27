--
-- Table 'company'
--

CREATE TABLE `company` (
  `id` int(6) unsigned NOT NULL auto_increment,
  `name` varchar(128) collate utf8_unicode_ci NOT NULL,
  `taxrate` int(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2;

INSERT INTO `company` VALUES(1, 'DMK E-BUSINESS GmbH', 19);

--
-- Table 'customer'
--

CREATE TABLE `customer` (
  `id` int(6) unsigned NOT NULL auto_increment,
  `name` varchar(64) collate utf8_unicode_ci NOT NULL,
  `address` text(1000) collate utf8_unicode_ci,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4;

INSERT INTO `customer` VALUES(1, 'Mustermann AG', 'Musterstraße 12, 8008 Zürich');
INSERT INTO `customer` VALUES(2, 'Gaswerke Musterstadt GmbH', 'Straße am Muster 8, 42281 Wuppertal');
INSERT INTO `customer` VALUES(3, 'Neue Musterfirma GmbH & Co. KG', 'Wegemuster 48, 36039 Fulda');

--
-- Table 'status'
--

CREATE TABLE `status` (
  `id` int(6) unsigned NOT NULL auto_increment,
  `name` varchar(32) collate utf8_unicode_ci NOT NULL,
  `cssclass` varchar(32) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4;

INSERT INTO `status` VALUES(1, 'neu', 'warning');
INSERT INTO `status` VALUES(2, 'laufend', 'success');
INSERT INTO `status` VALUES(3, 'abgeschlossen', 'primary');

--
-- Table 'calculation'
--

CREATE TABLE `calculation` (
  `id` int(6) unsigned NOT NULL auto_increment,
  `tstamp` int(11) NOT NULL DEFAULT '0',
  `name` varchar(128) collate utf8_unicode_ci NOT NULL,
  `customer` int(6) unsigned NOT NULL,
  `status` int(6) unsigned NOT NULL,
  `price_team` float(6,2) unsigned NOT NULL DEFAULT '0',
  `price_pm` float(6,2) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_customer` FOREIGN KEY (`customer`) REFERENCES customer(`id`),
  CONSTRAINT `fk_status` FOREIGN KEY (`status`) REFERENCES status(`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4;

INSERT INTO `calculation` VALUES(1, 1463756058, 'TYPO3-Landingpage und Online-Payment', 1, 1, 500, 700);
INSERT INTO `calculation` VALUES(2, 1462719258, 'Grillgewinnspiel 2016', 2, 3, 380, 450);
INSERT INTO `calculation` VALUES(3, 1462200858, 'Vertrieb Landingpage', 3, 2, 600, 800);

--
-- Table 'category'
--

CREATE TABLE `category` (
  `id` int(6) unsigned NOT NULL auto_increment,
  `name` varchar(128) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4;

INSERT INTO `category` VALUES(1, 'TYPO3-Einrichtung');
INSERT INTO `category` VALUES(2, 'Prototyping');
INSERT INTO `category` VALUES(3, 'Suche');

--
-- Table 'item'
--

CREATE TABLE `item` (
  `id` int(6) unsigned NOT NULL auto_increment,
  `name` varchar(128) collate utf8_unicode_ci NOT NULL,
  `description` text(1000),
  `tmin` float(6,3) unsigned NOT NULL DEFAULT '0',
  `tmax` float(6,3) unsigned NOT NULL DEFAULT '0',
  `category` int(6) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_category` FOREIGN KEY (`category`) REFERENCES category(`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8;

INSERT INTO `item` VALUES(1, 'Berechtigungen vergeben', 'Den Nutzern werden Rechte vergeben, damit sie ihre Aufgaben erledigen können.', 1.25, 2, 1);
INSERT INTO `item` VALUES(2, 'Seitenbaum anlegen', '', 0.25, 1, 1);
INSERT INTO `item` VALUES(3, 'Prototypen erstellen', 'Prototypen für spätere Dynamisierung erstellen, HAML und SASS verwenden.', 3, 4, 2);
INSERT INTO `item` VALUES(4, 'Responsive Design', 'Prototypen müssen geräteunabhängig darstellbar sein', 2, 4, 2);
INSERT INTO `item` VALUES(5, 'Barrierefreiheit', 'Prototypen sollen sich an BITV-Vorgaben halten und möglichst barrierearm sein.', 2, 4, 2);
INSERT INTO `item` VALUES(6, 'Solr einrichten', 'Solr auf Server installieren und grundlegend einrichten.', 3.5, 5, 3);
INSERT INTO `item` VALUES(7, 'Indexed Search einrichten', 'Die Extension Indexed Search installieren und grundlegend einrichten.', 1, 1.5, 3);

--
-- Table 'calculation_item_mm'
--

CREATE TABLE `calculation_item_mm` (
  `uid_calculation` int(11) unsigned NOT NULL DEFAULT '0',
  `uid_item` int(11) unsigned NOT NULL DEFAULT '0',
  CONSTRAINT `fk_calculation` FOREIGN KEY (`uid_calculation`) REFERENCES calculation(`id`),
  CONSTRAINT `fk_item` FOREIGN KEY (`uid_item`) REFERENCES item(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `calculation_item_mm` (`uid_calculation`, `uid_item`) VALUES(1, 1);
INSERT INTO `calculation_item_mm` (`uid_calculation`, `uid_item`) VALUES(1, 2);
INSERT INTO `calculation_item_mm` (`uid_calculation`, `uid_item`) VALUES(1, 4);
INSERT INTO `calculation_item_mm` (`uid_calculation`, `uid_item`) VALUES(1, 5);
INSERT INTO `calculation_item_mm` (`uid_calculation`, `uid_item`) VALUES(2, 3);
INSERT INTO `calculation_item_mm` (`uid_calculation`, `uid_item`) VALUES(2, 6);
INSERT INTO `calculation_item_mm` (`uid_calculation`, `uid_item`) VALUES(3, 1);
INSERT INTO `calculation_item_mm` (`uid_calculation`, `uid_item`) VALUES(3, 3);
INSERT INTO `calculation_item_mm` (`uid_calculation`, `uid_item`) VALUES(3, 7);
