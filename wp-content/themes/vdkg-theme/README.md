VDKG Starter Theme
===================

Ein schlankes Starter-Theme basierend auf Hello Elementor. Fokus auf klare Struktur, SCSS und Gulp-Build.

Ordnerstruktur
- assets/scss: SCSS-Quellen (abstracts, base, layout, components, themes)
- assets/js: Vanilla-JS (wird nach dist kopiert)
- dist: Kompilierte Assets (style.css, sourcemaps, JS)
- widgets: Platzhalter für zukünftige Elementor-Widgets

Build
- Voraussetzungen: Node.js installiert, im Projektordner `HTML` bereits `npm install` ausgeführt
- Entwickeln: `npm run watch` (SCSS + JS beobachten, BrowserSync auf http://localhost:8080)
- Build einmalig: `npm run build`
- Produktion (minifiziert): `npm run build:prod`

Hinweise
- Normalize wird direkt aus `normalize.css` aus `node_modules` eingebunden.
- `WidgetManager` registriert standardmäßig keine Widgets. Für Projekte gewünschte Widgets einfach hinzufügen.
