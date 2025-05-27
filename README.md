# Ravensbrueck Theme

Ein individuelles WordPress Child Theme basierend auf [Hello Elementor](https://elementor.com/hello-theme), optimiert für moderne Entwicklung mit [Vite](https://vitejs.dev/), SCSS und modularer Struktur.

## 🚀 Features

- ⚡️ Vite-Setup für schnelle Entwicklung und Builds
- 🎨 SCSS-Struktur mit Autoprefixing und PostCSS
- 📦 JavaScript mit ES6-Modulunterstützung
- 🔧 Optimiertes Deployment via `npm run build`
- 🧱 Sauber getrennte Codebasis (`src/`, `dist/`)
- 🔄 Einfache Einbindung in WordPress über `functions.php`

---

## 📁 Projektstruktur

```
hello-child-theme/
├── dist/             # Generierte CSS/JS-Dateien (nicht manuell bearbeiten)
├── functions.php     # Enqueue der Vite-Bundles
├── style.css         # Theme-Metadaten (leer, Pflicht für WordPress)
├── src/
│   ├── js/
│   │   └── main.js   # Haupt-JavaScript-Datei
│   └── scss/
│       └── style.scss # Haupt-SCSS-Datei
├── vite.config.js    # Vite-Konfiguration
└── package.json      # Abhängigkeiten & Build-Skripte
```

---

## ⚙️ Installation

### 1. 🔁 Repository klonen

```bash
git clone https://github.com/dein-benutzername/ravensbrueck-theme.git
cd ravensbrueck-theme
```

### 2. 📦 Abhängigkeiten installieren

```bash
npm install
```

### 3. 💻 Entwicklung starten

```bash
npm run dev
```

→ Vite startet den Entwicklungsserver, kompiliert SCSS & JS live und schreibt nach `dist/`.

### 4. 📦 Für den Live-Betrieb builden

```bash
npm run build
```

→ Minifizierte Produktionsergebnisse liegen dann in `dist/`.

---

## 🧩 Theme aktivieren

1. Stelle sicher, dass das Parent-Theme **Hello Elementor** installiert ist.
2. Kopiere dieses Theme in `wp-content/themes/hello-child-theme`
3. Aktiviere es im WordPress-Backend unter _Design > Themes_.

---

## 🧠 Hinweise

- Die Datei `style.css` enthält nur die Theme-Metadaten und wird **nicht für Styling verwendet**
- SCSS & JS werden über `vite.config.js` verarbeitet – passe dort bei Bedarf Ein- & Ausgabe an
- Das Theme funktioniert auch ohne Elementor, nutzt aber dessen Struktur und Kompatibilität

---

## 👨‍💻 Autor

**Matthias Seidel**  
🔗 [doryo.de](https://www.doryo.de)

---

## 📜 Lizenz

GNU General Public License v3.0 – siehe [LICENSE](https://www.gnu.org/licenses/gpl-3.0.html)