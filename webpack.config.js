const path = require('path');
const fs = require('fs');
const { copyFileSync, mkdirSync, readFileSync, writeFileSync } = require('fs');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

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
  'bootstrap-select-control': './src/Assets/js/msp-bootstrap-select.js',
  'admin.ui': [
    './src/Assets/js/ui.admin.js',
    './src/Assets/js/dashboard.admin.js',
    './src/Assets/js/settings.admin.js',
    './src/Assets/js/page.admin.js',
    './src/Assets/js/ui.frontend.js',
  ],
  'wpoverride': './src/Assets/scss/wpoverride.scss',
};
const fontAwesomeEntries = {
  'icon-picker': [
    './src/Includes/Plugins/FontAwesome/Assets/js/fontawesome.icon-picker.js',
    './src/Includes/Plugins/FontAwesome/Assets/scss/fontawesome.icon-picker.scss',
  ],
};
const tinyMCEEntries = {
  'tinyMCE': [
    './src/Includes/Plugins/TinyMCE/Assets/js/tinymce.js',
    './src/Includes/Plugins/TinyMCE/Assets/scss/tinymce.scss',
  ],
};
const exchangeEntries = {
  'exchange.admin': [
    './src/Includes/Plugins/Exchange/Assets/js/exchange.settings.admin.js',
    './src/Includes/Plugins/Exchange/Assets/scss/exchange.admin.scss',
  ],
  'exchange.logs.admin': [
    './src/Includes/Plugins/Exchange/Assets/js/exchange.logs.admin.js',
  ],
  'exchange.trace.admin': [
    './src/Includes/Plugins/Exchange/Assets/js/exchange.trace.admin.js',
  ],
  'exchange.templates.admin': [
    './src/Includes/Plugins/Exchange/Assets/js/exchange.templates.admin.js',
  ],
  'exchange.frontend': [
    './src/Includes/Plugins/Exchange/Assets/js/exchange.frontend.js',
    './src/Includes/Plugins/Exchange/Assets/scss/exchange.frontend.scss',
  ],
};
const entraEntries = {
  'entra.admin': [
    './src/Includes/Plugins/Entra/Assets/js/entra.admin.js',
    './src/Includes/Plugins/Entra/Assets/scss/entra.admin.scss',
  ],
  'entra.frontend': [
    './src/Includes/Plugins/Entra/Assets/js/entra.frontend.js',
    './src/Includes/Plugins/Entra/Assets/scss/entra.frontend.scss',
  ],
};
const onedriveEntries = {
  'onedrive.admin': [
    './src/Includes/Plugins/Onedrive/Assets/js/onedrive.admin.js',
    './src/Includes/Plugins/Onedrive/Assets/scss/onedrive.admin.scss',
  ],
  'onedrive.frontend': [
    './src/Includes/Plugins/Onedrive/Assets/js/onedrive.frontend.js',
    './src/Includes/Plugins/Onedrive/Assets/scss/onedrive.frontend.scss',
  ],
};
const sharepointEntries = {
  'sharepoint.admin': [
    './src/Includes/Plugins/Sharepoint/Assets/js/sharepoint.admin.js',
    './src/Includes/Plugins/Sharepoint/Assets/scss/sharepoint.admin.scss',
  ],
  'sharepoint.frontend': [
    './src/Includes/Plugins/Sharepoint/Assets/js/sharepoint.frontend.js',
    './src/Includes/Plugins/Sharepoint/Assets/scss/sharepoint.frontend.scss',
  ],
};


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
    entry: fontAwesomeEntries,
    output: {
      path: path.resolve(__dirname, 'src/Includes/Plugins/FontAwesome/Assets/dist'),
      filename: 'js/[name].js',
      clean: true,
    },
    plugins: [
      new MiniCssExtractPlugin({ filename: 'css/[name].css' }),
    ],
  },
  {
    ...shared,
    entry: tinyMCEEntries,
    output: {
      path: path.resolve(__dirname, 'src/Includes/Plugins/TinyMCE/Assets/dist'),
      filename: 'js/[name].js',
      clean: true,
    },
    plugins: [
      new MiniCssExtractPlugin({ filename: 'css/[name].css' }),
    ],
  },
  {
    ...shared,
    entry: exchangeEntries,
    output: {
      path: path.resolve(__dirname, 'src/Includes/Plugins/Exchange/Assets/dist'),
      filename: 'js/[name].js',
      clean: true,
    },
    plugins: [
      new MiniCssExtractPlugin({ filename: 'css/[name].css' }),
    ],
  },
  {
    ...shared,
    entry: entraEntries,
    output: {
      path: path.resolve(__dirname, 'src/Includes/Plugins/Entra/Assets/dist'),
      filename: 'js/[name].js',
      clean: true,
    },
    plugins: [
      new MiniCssExtractPlugin({ filename: 'css/[name].css' }),
    ],
  },
  {
    ...shared,
    entry: onedriveEntries,
    output: {
      path: path.resolve(__dirname, 'src/Includes/Plugins/Onedrive/Assets/dist'),
      filename: 'js/[name].js',
      clean: true,
    },
    plugins: [
      new MiniCssExtractPlugin({ filename: 'css/[name].css' }),
    ],
  },
  {
    ...shared,
    entry: sharepointEntries,
    output: {
      path: path.resolve(__dirname, 'src/Includes/Plugins/Sharepoint/Assets/dist'),
      filename: 'js/[name].js',
      clean: true,
    },
    plugins: [
      new MiniCssExtractPlugin({ filename: 'css/[name].css' }),
    ],
  }
];
