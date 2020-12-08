---
title: Changelog
---

## 4.1.0.1 - 2020-12-08

### Added
- installierbar in OXID 6.2.3

### Changed
- Setup verarbeitet auch unvollständig abgeschlossene Zwischenschritte des Updates auf 4.1

### Fixed
- fehlerhafte Kodierung der Setup-Datei korrigiert

---

## 4.1.0.0 - 2020-11-20

### Added
- verwendbar in OXID 6.2

### Changed
- Front- und Backend können Einträge mit identischer ID haben
- OXID-Exporte enthalten kein "charset", um ungewünschte Importe zu verhindern
- Datenbank-Index ist zufällige ID anstatt Ident
- Maskierung von Sonderzeichen optimiert

### Fixed
- Übersetzungscache wird aus richtigem Bereich (Front-/Backend) generiert, wenn Einträge in beiden Bereichen existieren

## 4.0.0.2 - 2020-01-09

### Fixed
- Composerbefehl angepasst
- Dateiregister ergänzt

---

## 4.0.0.1 - 2019-05-17

### Changed
- Dokumentation angepasst

### Fixed
- Prepared Statement Parameter von Mixed auf Named angeglichen, um unerwartetes Verhalten des Doctrine DBAL zu umgehen

---

## 4.0.0.0 - 2018-09-20
- installierbar in OXID Compilation 6.0.2 bis 6.1
- "TMP komplett leeren" startet Import installierter Textbausteine
- verwendet prepared statements in Datenbankabfragen
- Datenbankabfragen werden mit Doctrine Query Builder erzeugt

---

## 3.2.0.0
- UTF-Einträge werden in Nicht-UTF-Shops nach ISO-8859-15 zurückkonvertiert
- unvollständige UTF-8-Konvertierung angepasst

---

## 3.1.1.0
- Leereinträge werden nicht gespeichert
- Excel-importfunktion wurde entfernt
- Log-Meldungen eingefügt
- Charset-Konvertierung korrigiert
- Existenzprüfung korrigiert
- Mime-Type-Ignorieroption eingefügt
- Hinweis auf nicht registrierten Mime-Type beim Import eingefügt
- Fehlerhinweisvermeidung auf Grund ungewöhnlicher Kollation ergänzt

---

## 3.1.0.0
- Handling für Mapping-Einträge eingefügt
- GUI-Handling optimiert
- Fehlerhinweise auf Grund ungewöhnlicher Kollation vermieden
- Sonderzeichenbehandlung optimiert
- vermeide Import leerer Einträge
- Prüfung auf nicht moduleigene Dateien

---

## 3.0.2.1
- Unterscheidung case-sensitiver Einträge optimiert (#4145)

---

## 3.0.2.0
- SEO-Ersetzungszeichen werden in Multilang mit übernommen (#4103)
- Import von einzelnen OXID-Sprachdateien verwendet die eingestellte Importsprache nicht
- Option eingefügt, ob zusätzliche Leerzeichen abgeschnitten werden sollen

---

## 3.0.1.0
- Modul nach "Übersetzungsassistent" umbenannt
- Installation importiert alle vorhandenen Einträge automatisch
- Suche nach originalen Einträgen eingefügt
- Suche nach Frontend-/Backend-Einträgen eingefügt
- dynamisch eingefügte Einträge werden als "Original" markiert, um diese überschreibbar zu halten
- Moduldateien in fremden Verzeichnissen wurden in eigenen Ordner verschoben
- Fehler in Datenbankabfragegenerierung beim Speichern vorhandener Einträge korrigiert
- Installation verwendet für OXID die Shop-Standard-Kollation
- Prüfung auf existierende Modulkonfiguration eingefügt

---

## 3.0.0.0
- Überarbeitung für OXID 4.7 / 5.0
- eSales-Sprachformat entfernt
- automatischen Import aus installierten Sprachdateien eingefügt
- automatische Übernahme fehlender Texte in die Datenbank
- Anlage des Sprachcaches nun direkt über die Datenbankeinträge anstelle über temporäre Sprachdateien
