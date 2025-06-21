# Techno auf den Augen Admin

Dieses Projekt bietet ein einfaches Dashboard, um die Facebook-Seite **"Techno auf den Augen"** zu verwalten. Die Anwendung nutzt die Facebook Graph API, um Posts, Kommentare und Statistiken abzurufen.

## Struktur
- **backend/** – PHP‑Skripte zur Kommunikation mit der Graph API
- **frontend/** – HTML, CSS und JavaScript für das Dashboard
- **assets/** – Statische Dateien wie Bilder oder Icons
- **.env** – Enthält Zugangsdaten wie API‑Key und Token (nicht ins Repository einchecken)

## Einrichtung
1. `composer install` ausführen, um Abhängigkeiten zu laden.
2. In der Datei `.env` die Facebook‑App‑ID und den Zugriffstoken hinterlegen.
3. Den Webserver so konfigurieren, dass die Dateien aus `frontend/` erreichbar sind.
   Das Verzeichnis `backend/` sollte PHP ausführen können.

## Nutzung
Nach der Einrichtung kann das Dashboard direkt im Browser aufgerufen werden.
Wichtige Aktionen:
- Beiträge erstellen oder zeitgesteuert planen
- Letzte Posts abrufen und anzeigen
- Kommentare lesen und beantworten
- Reaktionen und Insights einsehen

Alle Funktionen greifen über `backend/api.php` auf die Facebook Graph API zu.

## Hinweis
Dieses Projekt stellt ein minimal lauffähiges Admin-Panel dar und kann beliebig erweitert werden.
