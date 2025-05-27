#!/bin/bash

# Interaktive Eingabe
read -p "Titel deiner WordPress-Seite: " SITE_TITLE

# Fixe Werte – diese kannst du gern anpassen
SITE_URL="http://localhost:8000"
ADMIN_USER="Matthias"
ADMIN_PASS="Sunday123"
ADMIN_EMAIL="matthias.seidel@doryo.de"
THEME_SLUG="hello-child-theme"


# HTML-Ordner prüfen/anlegen
if [ ! -d "html" ]; then
  mkdir html
  echo "📁 Ordner 'html/' wurde erstellt."
fi

# Stelle sicher, dass wir im html-Verzeichnis arbeiten
cd "$(dirname "$0")/../html"

# WordPress herunterladen (nur wenn nicht vorhanden)
if [ ! -f "wp-load.php" ]; then
  echo "⬇️ Lade WordPress herunter..."
  wp core download
else
  echo "✅ WordPress ist bereits vorhanden."
fi

# Warte, bis DB erreichbar ist
echo "⏳ Warte auf Datenbankverbindung..."
until docker-compose run --rm wpcli db query "SHOW TABLES;" > /dev/null 2>&1; do
  echo "🕒 Warte auf DB..."; sleep 2;
done
echo "✅ Datenbankverbindung steht."

# Installation prüfen
IS_INSTALLED=$(wp core is-installed && echo "yes" || echo "no")

if [ "$IS_INSTALLED" == "no" ]; then
  # wp-config.php erzwingen: automatisch erzeugte Datei löschen
  if [ -f "wp-config.php" ]; then
    echo "🧹 Entferne automatisch erzeugte wp-config.php..."
    rm wp-config.php
  fi

  # wp-config.php sauber neu erstellen
  echo "⚙️ Erzeuge wp-config.php..."
  wp config create \
    --dbname=wordpress \
    --dbuser=wordpress \
    --dbpass=wordpress \
    --dbhost=db \
    --skip-check
  
  echo "⚙️ Installiere WordPress..."
  # WordPress installieren
  wp core install \
    --url="$SITE_URL" \
    --title="$SITE_TITLE" \
    --admin_user="$ADMIN_USER" \
    --admin_password="$ADMIN_PASS" \
    --admin_email="$ADMIN_EMAIL"

  echo "🎨 Aktiviere Theme $THEME_SLUG..."
  wp theme activate "$THEME_SLUG"

  echo "✅ Fertig! Du kannst deine Seite jetzt unter $SITE_URL aufrufen."
  echo "🎨 Aktuelles Theme:"
  wp theme list --status=active
else
  echo "ℹ️ WordPress ist bereits installiert. Kein Setup nötig."
fi