var webpack = require('webpack');
var BowerWebpackPlugin = require('bower-webpack-plugin');
var BrowserSyncPlugin = require('browser-sync-webpack-plugin');
var ExtractTextPlugin = require('extract-text-webpack-plugin');
var path = require('path');

var extractCSS = new ExtractTextPlugin('css/style.css');

module.exports = {
    options: {
        progress: true
    },
    entry: {
        app: './app/Views/_assets/entry.js'
    },
    output: {
        path: './public/assets/',
        filename: 'js/[name].js',
        publicPath: '/assets/'
    },
    resolve: {
        root: [path.join(__dirname, 'bower_components')],
        moduleDirectories: ['bower_components'],
        extensions: ['', '.js', '.css', 'scss']
    },
    module: {
        loaders: [
            { test: /\.css$/, loader: extractCSS.extract('style-loader', 'css-loader?includePaths[]=' + path.resolve(__dirname, './node_modules/compass-mixins/lib')) },
            { test: /\.scss$/, loader: extractCSS.extract(['css-loader?includePaths[]=' + path.resolve(__dirname, './node_modules/compass-mixins/lib'), 'sass-loader?includePaths[]=' + path.resolve(__dirname, './node_modules/compass-mixins/lib')]) },
            { test: /\.svg$/, loader: 'file?name=fonts/[name].[ext]' },
            { test: /\.woff$/, loader: 'file?name=fonts/[name].[ext]' },
            { test: /\.woff2$/, loader: 'file?name=fonts/[name].[ext]' },
            { test: /\.eot$/, loader: 'file?name=fonts/[name].[ext]' },
            { test: /\.ttf$/, loader: 'file?name=fonts/[name].[ext]' },
            { test: /\.jpg$/, loader: 'file?name=img/parts/[name].[ext]' },
            { test: /\.jpeg$/, loader: 'file?name=img/parts/[name].[ext]' },
            { test: /\.gif$/, loader: 'file?name=img/parts/[name].[ext]' },
            { test: /\.bmp$/, loader: 'file?name=img/parts/[name].[ext]' },
        ]
    },
    plugins: [
        new BowerWebpackPlugin(),
        new webpack.optimize.UglifyJsPlugin(),
        extractCSS,
        new BrowserSyncPlugin(
            {
                host: 'localhost',
                port: 2001,
                proxy: 'http://localhost:2000/',
                watchTask: true,
                ghostMode: {
                    scroll: true,
                    links: true,
                    forms: true
                },
                files: "./app/Views/**"
            },
            {
                reload: true
            }
        )
    ]
}
