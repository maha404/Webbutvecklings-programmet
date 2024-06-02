const {src, dest, parallel, series, watch} = require('gulp');
const browserSync = require('browser-sync').create();
const concat = require('gulp-concat');
const cssnano = require('gulp-cssnano');
const jsterser = require('gulp-terser');
const sass = require('gulp-sass')(require('sass'));
const imagemin = require('gulp-imagemin');
const gulpBabel = require('gulp-babel');

// Objekt för att lagra sökvägar. 
const files = {
    htmlPath: "src/**/*.html", //Hämtar alla filer som har .html som filändelse i mappen src
    cssPath: "src/**/*.css", // Hämtar alla filer som har .css som filändelse i mappen src
    scssPath: "src/**/*.scss", // Hämtar alla filer som har .scss som filändelse i mappen src
    jsPath: "src/**/*.js", // Hämtar alla filer som har .js som filändelse i mappen src
    photoPath: "src/photos/*" // Hämtar alla filer från mappen photos i mappen src
}

// Task för att kopiera över HTML filer till pub mappen. 
function copyHTML () {
    return src(files.htmlPath) // vart finns html filen?
    .pipe(dest('pub')); // Kopieras till mappen pub
}

// Task för att konventera scss/sass till css för pub mappen. 
function convertScss () {
    return src(files.scssPath, { sourcemaps: true })
    .pipe(concat('styles.css'))
    .pipe(sass())
    .pipe(cssnano())
    .pipe(dest('pub/css'))
}

function copyJs () {
    return src(files.jsPath)
    .pipe(concat('main.js')) // Slår ihop alla JS filerna och skapar en enda JS fil med namn 'main.js'
    .pipe (gulpBabel({ // Transpilerinig till tidigare versioner av EcmaScript
        presets: ['@babel/env']
    }))
    .pipe(jsterser()) // JS koden minifieras
    .pipe(dest('pub/js')) // Skickar till pub mappen i en mapp som heter js
}

// Task för att kopiera över bilder till pub mappen
function copyPhotos () {
    return src(files.photoPath)
    .pipe(imagemin()) // Minifierar bilderna
    .pipe(dest('pub/photos')) // lägger alla bilder i pub mappen i en mapp som heter photos
}

// Task för att skapa en server (ungefär som liveserver som finns i VS)
function browserSyncServer (cb) {
    browserSync.init ({
        server: {
            baseDir: './pub' // Visar pub mappen som "liveserver". 
        }
    });
    cb();
}

// Task som laddar om servern så det behövs inte göras manuellt. 
function browserSyncReload (cb) {
    browserSync.reload();
    cb();
}


// Watch task för att kolla vilka filer som uppdateras
function watchTask () {
    watch([files.htmlPath, files.cssPath, files.jsPath, files.photoPath, files.scssPath], series(copyHTML, copyPhotos, browserSyncReload, convertScss, copyJs));
}

exports.default = series(
    series(copyHTML, copyPhotos, convertScss, copyJs), 
    browserSyncServer, 
    watchTask
    );