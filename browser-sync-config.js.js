const browserSync = require('browser-sync').create();

browserSync.init({
    proxy: "http://localhost:8000", // Proxy vers le serveur PHP
    files: ["**/*.php", "**/*.css", "**/*.js"], // Surveillez les fichiers PHP, CSS, et JS
    open: true, // Ouvrir automatiquement le navigateur
    notify: false // Désactiver les notifications de BrowserSync
});
