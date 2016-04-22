--
-- Table 'kunde'
--

CREATE TABLE `kunde` (
  `id` int(6) unsigned NOT NULL auto_increment,
  `name` varchar(64) collate utf8_unicode_ci NOT NULL,
  `address` text(1000) collate utf8_unicode_ci,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4;

INSERT INTO `kunde` VALUES(1, 'Kunde 1', 'Musterstrasse 20, 8008 Zürich');
INSERT INTO `kunde` VALUES(2, 'Kunde 2', 'Musterman Str. 39, 09311 Chemnitz');
INSERT INTO `kunde` VALUES(3, 'Kunde 3', 'Muster Weg 72, 36039 Fulda');

--
-- Table 'status'
--

CREATE TABLE `status` (
  `id` int(6) unsigned NOT NULL auto_increment,
  `name` varchar(32) collate utf8_unicode_ci NOT NULL,
  `cssclass` varchar(32) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4;

INSERT INTO `status` VALUES(1, 'neu', 'new');
INSERT INTO `status` VALUES(2, 'in Bearbeitung', 'working');
INSERT INTO `status` VALUES(3, 'abgeschlossen', 'done');

--
-- Table 'calculation'
--

CREATE TABLE `calculation` (
  `id` int(6) unsigned NOT NULL auto_increment,
  `name` varchar(128) collate utf8_unicode_ci NOT NULL,
  `kunde` int(6) unsigned NOT NULL,
  `status` int(6) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_kunde` FOREIGN KEY (`kunde`) REFERENCES kunde(`id`),
  CONSTRAINT `fk_status` FOREIGN KEY (`status`) REFERENCES status(`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4;

INSERT INTO `calculation` VALUES(1, 'TYPO3 Projekt', 1, 1);
INSERT INTO `calculation` VALUES(2, 'Magento Projekt', 2, 3);
INSERT INTO `calculation` VALUES(3, 'Humhub Projekt', 3, 2);