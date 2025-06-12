# ADMIN Anleitung

Dieses Dokument beschreibt die grundlegende Verwendung des Projekts **TadA**.

## Einrichtung
1. Wechsle in den Ordner `techno-auf-den-augen-admin/`.
2. Führe `composer install` aus, um PHP-Abhängigkeiten zu laden.
3. Lege eine Datei `.env` mit folgenden Variablen an:
   - `FB_APP_ID`
   - `FB_APP_SECRET`
   - `FB_ACCESS_TOKEN`
4. Stelle sicher, dass die Datei `.env` nicht ins Repository eingecheckt wird.

## Nutzung
- Die PHP-Skripte im Ordner `backend/` kapseln die Facebook Graph API.
- Über das Dashboard in `frontend/` können Beiträge verwaltet und Statistiken
eingesehen werden.

## Sicherheit
- Zugriffstoken sollten regelmäßig erneuert und sicher verwahrt werden.
- Vermeide es, sensible Daten im Quellcode abzulegen.
