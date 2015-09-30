module.exports = {

  build:{
    options: {
      map: true,
      browsers: ['last 3 versions', 'ie 8', 'ie 9']
      // documentation for browser configuration: https://github.com/ai/browserslist#browserslist-
    },

    dist:{
      files:{
        'css/styles.css':'css/styles.css'
      }
    }
  },
  prod:{
    options: {
      map: false,
      browsers: ['last 3 versions', 'ie 8', 'ie 9']
      // documentation for browser configuration: https://github.com/ai/browserslist#browserslist-
    },

    dist:{
      files:{
        'css/styles.css':'css/styles.css'
      }
    }
  }

};