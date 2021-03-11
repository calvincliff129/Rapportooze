const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

 mix.js('resources/js/app.js', 'public/js')
 .sass('resources/sass/app.scss', 'public/css')
 .options({
   processCssUrls: false,
 });

//  module.exports = {
//     module: {
//       rules: [
//         {
//           test: /\.s[ac]ss$/i,
//           use: [
//             // Creates `style` nodes from JS strings
//             "style-loader",
//             // Translates CSS into CommonJS
//             "css-loader",
//             // Compiles Sass to CSS
//             "sass-loader",
//           ],
//         },
//       ],
//     },
//   };

//   module.exports = {
//     module: {
//       rules: [
//         {
//           test: /\.css$/i,
//           use: [
//             "style-loader",
//             "css-loader",
//             {
//               loader: "postcss-loader",
//               options: {
//                 postcssOptions: {
//                   plugins: [
//                     [
//                       "postcss-preset-env",
//                       {
//                         // Options
//                       },
//                     ],
//                   ],
//                 },
//               },
//             },
//           ],
//         },
//       ],
//     },
//   };

//   module.exports = {
//     module: {
//       rules: [
//         {
//           test: /\.css$/i,
//           use: ["style-loader", "css-loader", "postcss-loader"],
//         },
//       ],
//     },
//   };

//   module.exports = {
//     plugins: [
//       require('autoprefixer')
//     ]
//   }