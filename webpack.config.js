const CopyPlugin = require('copy-webpack-plugin');
const path = require('path');

module.exports = {
  mode: 'development',
  entry: './src/ts/setup.ts',
  watchOptions: {
    poll: true
  },
  experiments: {
    outputModule: true
  },
  devtool: 'inline-source-map',
  resolve: {
    extensions: ['.tsx', '.ts', '.js'],
  },
  output: {
    filename: 'setup.mjs',
    path: path.resolve(__dirname, 'dist'),
    library: {
      type: 'module',
    },
    clean: true,
  },
  plugins: [
    new CopyPlugin({
      patterns: [
        { from: 'manifest.json', to: 'manifest.json' },
      ]
    })
  ],
  module: {
    generator: {
      'asset/resource': {
        publicPath: 'img/',
        outputPath: 'img/',
        filename: '[name][ext]',
      },
    },
    rules: [
      {
        test: /\.tsx?$/,
        use: [
          'ts-loader',
          {
            loader: 'webpack-remove-code-blocks',
          }
        ],
        exclude: /node_modules/,
      },
      {
        test: /\.css$/i,
        use: ['style-loader', 'css-loader'],
      },
      {
        test: /\.(png|svg|jpg|jpeg|gif)$/i,
        type: 'asset/resource',
      },
    ]
  },
};
