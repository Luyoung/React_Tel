var webpack = require('webpack')

module.exports = {
  entry: './js/entry.js',
  output: {
    path: __dirname,
    filename: 'js/bundle.js'
  },
  devServer: {
    inline: true,
    port: 7777
  },
  module: {
    loaders: [{
      test: /\.jsx?$/,
      exclude: /node_modules/,
      loader: 'babel',
      query: {
        presets: ['es2015', 'react']
      }
    }, {
      test: /\.css$/,
      loader: 'style!css' //添加对样式表的处理
    }]
  }
}