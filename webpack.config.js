const path = require('path');
const UglifyJsPlugin = require("uglifyjs-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const CopyWebpackPlugin = require('copy-webpack-plugin');
const ImageminPlugin = require('imagemin-webpack-plugin').default;

module.exports  = {
    entry: {
        main_styles: [

            path.resolve(__dirname, './frontend/web/bootstrap4/bootstrap.min.css'),
            path.resolve(__dirname, './vendor/npm-asset/font-awesome/css/font-awesome.min.css'),
            path.resolve(__dirname, './frontend/web/css/main_styles.css'),
            path.resolve(__dirname, './frontend/web/css/responsive.css'),
            path.resolve(__dirname, './frontend/web/plugins/OwlCarousel2-2.2.1/owl.carousel.css'),
            path.resolve(__dirname, './frontend/web/plugins/OwlCarousel2-2.2.1/owl.theme.default.css'),
            path.resolve(__dirname, './frontend/web/plugins/OwlCarousel2-2.2.1/animate.css'),
            path.resolve(__dirname, './frontend/web/plugins/slick-1.8.0/slick.css'),
        ]
    },
    output: {
        filename: '[name].js',
        path: path.resolve(__dirname, './frontend/web/bundle'),
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: [/node_modules/],
                use: [
                    {
                        loader: 'babel-loader',
                        options: { presets: ['latest'] }
                    }
                ]
            },
            {
                test: /glyphicons-halflings-regular\.(woff2|woff|svg|ttf|eot)$/,
                loader:require.resolve("url-loader") + "?name=../[path][name].[ext]"
            },
            {
                test: /\.woff(2)?(\?v=[0-9]\.[0-9]\.[0-9])?$/,
                loader: "url-loader?limit=10000&mimetype=application/font-woff"
            },
            {
                test: /\.(ttf|eot|svg)(\?v=[0-9]\.[0-9]\.[0-9])?$/,
                loader: "file-loader"
            },
            {
                test: /\.(css)$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                ]
            },
            {
                test: /\.(less)$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    'css-loader',
                    'less-loader'
                ]
            },
        ]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: "[name].css",
            allChunks: true
        }),
        new CopyWebpackPlugin([
            {
                from: path.resolve(__dirname, './frontend/web/images/'),
                to: path.resolve(__dirname, './frontend/web/images/')
            }
        ]),
        new ImageminPlugin({ test: /\.(jpe?g|png|gif|svg)$/i })
    ],
    optimization: {
        minimizer: [
            new UglifyJsPlugin({
                cache: true,
                parallel: true,
                sourceMap: true
            }),
            new OptimizeCSSAssetsPlugin({})
        ]
    },
    devtool: 'source-map'
};
