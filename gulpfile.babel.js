import gulp from 'gulp';
import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCSS from 'gulp-clean-css';
import gulpif from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';
import imagemin from 'gulp-imagemin';
import del from 'del';
import webpack from 'webpack-stream';
import uglify from 'gulp-uglify';
import browserSync from 'browser-sync';
import zip from 'gulp-zip';
import replace from 'gulp-replace';
import info from './package.json';

const server = browserSync.create();

const PRODUCTION = yargs.argv.prod;

const paths = {
  styles: {
    src: 'src/assets/scss/style.scss',
    dest: 'dist/assets/css'
  },
  images: {
    src: 'src/assets/images/**/*.{jpg,jpeg,png,svg,gif}',
    dest: 'dist/assets/images'
  },
  scripts: {
    src: 'src/assets/js/bundle.js',
    dest: 'dist/assets/js'
  },
  fonts: {
    src: 'src/assets/fonts/**/*.{ttf,woff,svg}',
    dest: 'dist/assets/fonts'
  },
  other: {
    src: ['src/assets/**/*', '!src/assets/{images,js,scss}', '!src/assets/{images,js,scss}/**/*'],
    dest: 'dist/assets'
  },
  package: {
    src: ['**/*', '!.vscode', '!node_modules{,/**}', '!packaged{,/**}', '!vendor{,/**}', '!src{,/**}', '!.babelrc', '!.gitignore', '!gulpfile.babel.js', '!composer.json', '!composer.lock', '!LICENSE', '!manifest.json', '!package-lock.json', '!package.json', '!phpcs.xml.dist', '!rtl.css', '!woocommerce-release-3.4{,/**}', '!dist{,/**}'],
    dest: 'packaged'
  }
};

export const serve = (done) => {
  server.init({
    proxy: "http://localhost:8888/"
  });
  done();
};

export const reload = (done) => {
  server.reload();
  done();
};

export const clean = () => del(['dist']);

export const styles = () => {
  return gulp.src(paths.styles.src)
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on('error', sass.logError))
    .pipe(gulpif(PRODUCTION, cleanCSS({compatibility: 'ie8'})))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(gulp.dest(paths.styles.dest));
};

export const scripts = () => {
  return gulp.src(paths.scripts.src)
    .pipe(webpack({
      module: {
        rules: [
          {
            test: /\.js$/,
            use: {
              loader: 'babel-loader',
              options: {
                presets: ['@babel/preset-env']
              }
            }
          }
        ]
      },
      output: {
        filename: 'bundle.js'
      },
      externals: {
        jquery: 'jQuery'
      },
      devtool: !PRODUCTION ? 'inline-source-map' : false
    }))
    .pipe(gulpif(PRODUCTION, uglify()))
    .pipe(gulp.dest(paths.scripts.dest));
};

export const images = () => {
  return gulp.src(paths.images.src)
    .pipe(gulpif(PRODUCTION, imagemin()))
    .pipe(gulp.dest(paths.images.dest));
};

export const fonts = () => {
  return gulp.src(paths.fonts.src)
    .pipe(gulp.dest(paths.fonts.dest));
};

export const copy = () => {
  return gulp.src(paths.other.src)
    .pipe(gulp.dest(paths.other.dest));
};

export const watch = () => {
  gulp.watch('src/assets/scss/**/*.scss', gulp.series(styles, reload));
  gulp.watch('src/assets/js/**/*.js', gulp.series(scripts, reload));
  gulp.watch('**/*.php', reload);
  gulp.watch(paths.images.src, gulp.series(images, reload));
  gulp.watch(paths.fonts.src, gulp.series(fonts, reload));
  gulp.watch(paths.other.src, gulp.series(copy, reload));
};

export const compress = () => {
  return gulp.src(paths.package.src)
    .pipe(replace('taxispirit', info.name))
    .pipe(zip(`${info.name}.zip`))
    .pipe(gulp.dest(paths.package.dest));
};

export const dev = gulp.series(clean, gulp.parallel(styles, scripts, images, fonts, copy ), serve, watch);
export const build = gulp.series(clean, gulp.parallel(styles, scripts, images, fonts, fonts ));
export const bundle = gulp.series(build, compress);

export default dev;
