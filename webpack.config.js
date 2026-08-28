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

const extensionEntries = (pluginName, directoryName) => {
  const name = pluginName.toLowerCase();

  if ( 'exchange' === name ) {
    return {
      'exchange.settings': `./src/Includes/Plugins/${directoryName}/Assets/js/exchange.settings.js`,
      'exchange.templates': `./src/Includes/Plugins/${directoryName}/Assets/js/exchange.templates.js`,
      'exchange.logs': `./src/Includes/Plugins/${directoryName}/Assets/js/exchange.logs.js`,
      'exchange.trace': `./src/Includes/Plugins/${directoryName}/Assets/js/exchange.trace.js`,
      'exchange.styles': `./src/Includes/Plugins/${directoryName}/Assets/scss/${name}.scss`,
    };
  }
  if ( 'fontawesome' === name ) {
    return {
      'fontawesome.icon-picker-script': `./src/Includes/Plugins/${directoryName}/Assets/js/fontawesome.icon-picker.js`,
      'fontawesome.icon-picker-style': `./src/Includes/Plugins/${directoryName}/Assets/scss/fontawesome.icon-picker.scss`,
    };
  }

  return {
    [name]: [
      `./src/Includes/Plugins/${directoryName}/Assets/js/${name}.js`,
      `./src/Includes/Plugins/${directoryName}/Assets/scss/${name}.scss`,
    ],
  };
};

const extensionBuilds = [
  [ 'entra', 'Entra' ],
  [ 'exchange', 'Exchange' ],
  [ 'onedrive', 'Onedrive' ],
  [ 'sharepoint', 'Sharepoint' ],
  [ 'tinymce', 'TinyMCE' ],
  [ 'fontawesome', 'FontAwesome' ],
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
  ...extensionBuilds.map(([pluginName, directoryName ]) => ({
    ...shared,
    entry: extensionEntries(pluginName, directoryName),
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
