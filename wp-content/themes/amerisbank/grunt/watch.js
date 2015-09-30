module.exports = {
  js: {
    files: ['js/libraries/*.js','js/src/*.js'],
    tasks: ['uglify:build'],
    options: {
      livereload: true
    }
  },
  css: {
    files: ['sass/**/*.scss'],
    tasks: ['compass:build', 'autoprefixer:build'],
    options: {
      livereload: true
    }
  },
  images: {
    files: ['images/src/**/*.jpg', 'images/src/**/*.png'],
    tasks: 'imagemin:build'
  }
}