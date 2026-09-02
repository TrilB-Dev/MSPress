const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const adminStyles = './src/Assets/scss/ui.admin.scss';
const frontendStyles = './src/Assets/scss/ui.frontend.scss';

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
  'ui.admin': [ './src/Assets/js/ui.admin.js', adminStyles ],
  'dashboard.admin': [ './src/Assets/js/dashboard.admin.js', adminStyles ],
  'admin.settings': [ './src/Assets/js/admin.settings.js', adminStyles ],
  'plugins.admin': [ './src/Assets/js/settings.admin.js', adminStyles ],
  'ui.frontend': [ './src/Assets/js/ui.frontend.js', frontendStyles ],
  'debug.admin': [ './src/Assets/js/page.admin.js', adminStyles ],
};

const extensionEntries = (pluginName, directoryName) => {
  const name = pluginName.toLowerCase();

  if ( 'exchange' === name ) {
    const exchangeAdminStyles = `./src/Includes/Plugins/${directoryName}/Assets/scss/ui.admin.scss`;
    const exchangeFrontendStyles = `./src/Includes/Plugins/${directoryName}/Assets/scss/ui.frontend.scss`;
    return {
      'exchange.admin': [ `./src/Includes/Plugins/${directoryName}/Assets/js/exchange.settings.admin.js`, exchangeAdminStyles ],
      'exchange.logs.admin': [ `./src/Includes/Plugins/${directoryName}/Assets/js/exchange.logs.admin.js`, exchangeAdminStyles ],
      'exchange.trace.admin': [ `./src/Includes/Plugins/${directoryName}/Assets/js/exchange.trace.admin.js`, exchangeAdminStyles ],
      'exchange.templates.admin': [ `./src/Includes/Plugins/${directoryName}/Assets/js/exchange.templates.admin.js`, exchangeAdminStyles ],
      'exchange.settings.admin': [ `./src/Includes/Plugins/${directoryName}/Assets/js/exchange.settings.admin.js`, exchangeAdminStyles ],
      'exchange.frontend': [ `./src/Includes/Plugins/${directoryName}/Assets/js/exchange.settings.frontend.js`, exchangeFrontendStyles ],
    };
  }
  if ( 'entra' === name ) {
    const entraAdminStyles = `./src/Includes/Plugins/${directoryName}/Assets/scss/ui.admin.scss`;
    const entraFrontendStyles = `./src/Includes/Plugins/${directoryName}/Assets/scss/ui.frontend.scss`;
    return {
      'entra.admin': [ `./src/Includes/Plugins/${directoryName}/Assets/js/entra.settings.admin.js`, entraAdminStyles ],
      'entra.frontend': [ `./src/Includes/Plugins/${directoryName}/Assets/js/entra.settings.frontend.js`, entraFrontendStyles ],
    };
  }
  if ( 'onedrive' === name ) {
    const onedriveAdminStyles = `./src/Includes/Plugins/${directoryName}/Assets/scss/ui.admin.scss`;
    const onedriveFrontendStyles = `./src/Includes/Plugins/${directoryName}/Assets/scss/ui.frontend.scss`;
    return {
      'onedrive.admin': [ `./src/Includes/Plugins/${directoryName}/Assets/js/onedrive.settings.admin.js`, onedriveAdminStyles ],
      'onedrive.frontend': [ `./src/Includes/Plugins/${directoryName}/Assets/js/onedrive.settings.frontend.js`, onedriveFrontendStyles ],
    };
  }
  if ( 'sharepoint' === name ) {
    const sharepointAdminStyles = `./src/Includes/Plugins/${directoryName}/Assets/scss/ui.admin.scss`;
    const sharepointFrontendStyles = `./src/Includes/Plugins/${directoryName}/Assets/scss/ui.frontend.scss`;
    return {
      'sharepoint.admin': [ `./src/Includes/Plugins/${directoryName}/Assets/js/sharepoint.settings.admin.js`, sharepointAdminStyles ],
      'sharepoint.frontend': [ `./src/Includes/Plugins/${directoryName}/Assets/js/sharepoint.settings.frontend.js`, sharepointFrontendStyles ],
    };
  }
  if ( 'fontawesome' === name ) {
    const fontawesomeIconPickerStyles = `./src/Includes/Plugins/${directoryName}/Assets/scss/fontawesome.icons-picker.scss`;
    return {
      'fontawesome.icon-picker': [ `./src/Includes/Plugins/${directoryName}/Assets/js/fontawesome.icon-picker.js`, fontawesomeIconPickerStyles ],
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
