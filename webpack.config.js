const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const adminStyles = './src/Assets/scss/admin.ui.scss';

const entries = {
  bootstrap: [
    './src/Assets/js/bootstrap.js',
    './src/Assets/scss/bootstrap.scss',
  ],
  'bootstrap-select': [
    './src/Assets/js/bootstrap-select.js',
    './src/Assets/scss/bootstrap-select.scss',
  ],
  'wpoverride': './src/Assets/scss/wpoverride.scss',
  'admin.ui': [ './src/Assets/js/admin.ui.js', adminStyles ],
  'admin.dashboard': [ './src/Assets/js/admin.dashboard.js', adminStyles ],
  'admin.settings': [ './src/Assets/js/admin.settings.js', adminStyles ],
  'admin.plugins': [ './src/Assets/js/admin.settings.js', adminStyles ],
  'admin.debug': [ './src/Assets/js/admin.page.js', adminStyles ],
};

const extensionEntries = (name) => ({
  demo: [
    `./src/Includes/Plugins/${name}/Assets/js/demo.js`,
    `./src/Includes/Plugins/${name}/Assets/scss/demo.scss`,
  ],
});

const extensionBuilds = [
  [ 'entra', 'Entra' ],
  [ 'exchange', 'Exchange' ],
  [ 'onedrive', 'Onedrive' ],
  [ 'sharepoint', 'Sharepoint' ],
];

const shared = {
  mode: process.env.NODE_ENV === 'development' ? 'development' : 'production',
  devtool: process.env.NODE_ENV === 'development' ? 'source-map' : false,
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          {
            loader: 'sass-loader',
            options: {
              api: 'modern',
              sassOptions: {
                quietDeps: true,
                includePaths: [path.resolve(__dirname, 'src/Assets/scss')],
              },
            },
          },
        ],
      },
      {
        test: /\.css$/,
        use: [MiniCssExtractPlugin.loader, 'css-loader'],
      },
      {
        test: /\.js$/,
        exclude: /node_modules/,
        type: 'javascript/auto',
      },
    ],
  },
  optimization: { splitChunks: false },
};

module.exports = [
  {
    ...shared,
    entry: entries,
    output: {
      path: path.resolve(__dirname, 'src/Assets/dist'),
      filename: 'js/[name].js',
      clean: true,
    },
    plugins: [
      new MiniCssExtractPlugin({ filename: 'css/[name].css' }),
    ],
  },
  ...extensionBuilds.map(([, directoryName ]) => ({
    ...shared,
    entry: extensionEntries(directoryName),
    output: {
      path: path.resolve(__dirname, `src/Includes/Plugins/${directoryName}/Assets/dist`),
      filename: 'js/[name].js',
      clean: true,
    },
    plugins: [
      new MiniCssExtractPlugin({ filename: 'css/[name].css' }),
    ],
  })),
];
