const mix = require("laravel-mix");
mix.js("resources/js/cp.js", "public/vendor/app/js").vue(({ version: 2 }));
mix.js("resources/js/app.js", "public/js")
    .postCss("resources/css/app.css", "public/css", [
        require("tailwindcss"),
        // other PostCSS plugins if any
    ])
    .webpackConfig({
        module: {
            rules: [
                {
                    test: /\.(woff2?|ttf|otf|eot|svg|png|jpg|gif)$/i,
                    use: [
                        {
                            loader: "file-loader",
                            options: {
                                outputPath: "fonts",
                            },
                        },
                    ],
                },
            ],
        },
    });
