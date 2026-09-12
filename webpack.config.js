const path = require('path');
const fs = require('fs');
const { copyFileSync, mkdirSync, readFileSync, writeFileSync } = require('fs');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

const adminStyles = './src/Assets/scss/ui.admin.scss';
const frontendStyles = './src/Assets/scss/ui.frontend.scss';

class CopyUnprocessedAssetPlugin {
  constructor(patterns) {
    this.patterns = patterns;
  }

  apply(compiler) {
    compiler.hooks.afterEmit.tap('CopyUnprocessedAssetPlugin', () => {
      this.patterns.forEach(({ from, to }) => {
        const src = path.resolve(__dirname, from);
        const dest = path.resolve(__dirname, to);

        mkdirSync(path.dirname(dest), { recursive: true });

        if (path.basename(dest) === 'bs-country-data.min.css') {
          const css = readFileSync(src, 'utf8').replace(/url\(\s*['"]?\.\.\/images\//g, 'url(../../images/');
          writeFileSync(dest, css);
          return;
        }

        copyFileSync(src, dest);
      });
    });
  }
}

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
  'admin.settings': [ './src/Assets/js/settings.admin.js', adminStyles ],
  'plugins.admin': [ './src/Assets/js/settings.admin.js', adminStyles ],
  'ui.frontend': [ './src/Assets/js/ui.frontend.js', frontendStyles ],
  'debug.admin': [ './src/Assets/js/page.admin.js', adminStyles ],
};

const extensionEntries = (pluginName, directoryName) => {
  const name = pluginName.toLowerCase();

  if ( 'exchange' === name ) {
    const exchangeAdminStyles = `./src/Includes/Plugins/${directoryName}/Assets/scss/exchange.admin.scss`;
    const exchangeFrontendStyles = `./src/Includes/Plugins/${directoryName}/Assets/scss/exchange.frontend.scss`;
    return {
      'exchange.admin': [ `./src/Includes/Plugins/${directoryName}/Assets/js/exchange.settings.admin.js`, exchangeAdminStyles ],
      'exchange.logs.admin': [ `./src/Includes/Plugins/${directoryName}/Assets/js/exchange.logs.admin.js`, exchangeAdminStyles ],
      'exchange.trace.admin': [ `./src/Includes/Plugins/${directoryName}/Assets/js/exchange.trace.admin.js`, exchangeAdminStyles ],
      'exchange.templates.admin': [ `./src/Includes/Plugins/${directoryName}/Assets/js/exchange.templates.admin.js`, exchangeAdminStyles ],
      'exchange.settings.admin': [ `./src/Includes/Plugins/${directoryName}/Assets/js/exchange.settings.admin.js`, exchangeAdminStyles ],
      'exchange.frontend': [ `./src/Includes/Plugins/${directoryName}/Assets/js/exchange.frontend.js`, exchangeFrontendStyles ],
    };
  }
  if ( 'entra' === name ) {
    const entraAdminStyles = `./src/Includes/Plugins/${directoryName}/Assets/scss/entra.admin.scss`;
    const entraFrontendStyles = `./src/Includes/Plugins/${directoryName}/Assets/scss/entra.frontend.scss`;
    return {
      'entra.admin': [ `./src/Includes/Plugins/${directoryName}/Assets/js/entra.admin.js`, entraAdminStyles ],
      'entra.frontend': [ `./src/Includes/Plugins/${directoryName}/Assets/js/entra.frontend.js`, entraFrontendStyles ],
    };
  }
  if ( 'onedrive' === name ) {
    const onedriveAdminStyles = `./src/Includes/Plugins/${directoryName}/Assets/scss/onedrive.admin.scss`;
    const onedriveFrontendStyles = `./src/Includes/Plugins/${directoryName}/Assets/scss/onedrive.frontend.scss`;
    return {
      'onedrive.admin': [ `./src/Includes/Plugins/${directoryName}/Assets/js/onedrive.admin.js`, onedriveAdminStyles ],
      'onedrive.frontend': [ `./src/Includes/Plugins/${directoryName}/Assets/js/onedrive.frontend.js`, onedriveFrontendStyles ],
    };
  }
  if ( 'sharepoint' === name ) {
    const sharepointAdminStyles = `./src/Includes/Plugins/${directoryName}/Assets/scss/sharepoint.admin.scss`;
    const sharepointFrontendStyles = `./src/Includes/Plugins/${directoryName}/Assets/scss/sharepoint.frontend.scss`;
    return {
      'sharepoint.admin': [ `./src/Includes/Plugins/${directoryName}/Assets/js/sharepoint.admin.js`, sharepointAdminStyles ],
      'sharepoint.frontend': [ `./src/Includes/Plugins/${directoryName}/Assets/js/sharepoint.frontend.js`, sharepointFrontendStyles ],
    };
  }
  if ( 'fontawesome' === name ) {
    const fontawesomeIconPickerStyles = `./src/Includes/Plugins/${directoryName}/Assets/scss/fontawesome.icon-picker.scss`;
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

const jsDirectory = path.resolve(__dirname, 'src/Assets/js');
fs.readdirSync(jsDirectory)
  .filter((file) => /^admin\.[^.]+\.js$/.test(file) && file !== 'admin.ui.js')
  .forEach((file) => {
    const page = file.match(/^admin\.([^.]+)\.js$/)[1];
    const entry = [`./src/Assets/js/${file}`];
    entries[`admin.${page}`] = entry;
  });

const shared = {
  mode: process.env.NODE_ENV === 'development' ? 'development' : 'production',
  devtool: process.env.NODE_ENV === 'development' ? 'source-map' : false,
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {
              url: false,
              import: false,
            },
          },
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
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {
              url: false,
              import: false,
            },
          },
        ],
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
      new CopyUnprocessedAssetPlugin([
        {
          from: 'node_modules/@crestapps/bootstrap-select/dist/css/bootstrap-select.min.css',
          to: 'src/Assets/dist/css/bootstrap-select.min.css',
        },
        {
          from: 'node_modules/@crestapps/bootstrap-select/dist/js/bootstrap-select.min.js',
          to: 'src/Assets/dist/js/bootstrap-select.min.js',
        },
        {
          from: 'node_modules/@trilbdev/boostrap-select-country-data/dist/js/bs-country-data.min.js',
          to: 'src/Assets/dist/js/bs-country-data.min.js',
        },
        {
          from: 'node_modules/@trilbdev/boostrap-select-country-data/dist/css/bs-country-data.min.css',
          to: 'src/Assets/dist/css/bs-country-data.min.css',
        },
      ]),
    ],
  },
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
