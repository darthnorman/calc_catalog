# calc_catalog
Projektarbeit Sommer 2016

## Beschreibung

Die Anwendung soll den Prozess der Kalkulation vereinfachen und verkürzen, 
so dass der Zeitverlust minimiert wird und Ressourcen für andere Projekte 
frei werden. Umgesetzt wird die Anwendung in PHP mit einer MySQL-Datenbank 
für die Datenhaltung. Sie wird von der Firma intern gehostet und ist nur für 
Mitarbeiter erreichbar. Der Katalog stellt bereits geschätzte Aufgaben zur 
Verfügung, die der Mitarbeiter schnell und einfach zu einer Kalkulation 
hinzufügen kann, ohne dabei permanent andere Mitarbeiter einbeziehen zu müssen. 

## Systemanforderungen

- Webserver
- PHP 5.5+
- MySQL 5.0+

## Installation

- Dateien auf den Webserver kopieren
- neue Datenbank erstellen
- /Classes/config_sample.php in config.php umbenennen und die Datenbankverbindung eintragen
- data.sql importieren (optional)
