/*  used to extend laravel-mix 

doc : https://laravel-mix.com/docs/6.0/extending-mix */

let mix = require('laravel-mix');

class babelExtend {
    babelConfig() {
        return {
            presets: [
                [
                    "@babel/preset-env",
                    {
                        "targets": {
                            "edge": "17",
                            "firefox": "60",
                            "chrome": "67",
                            "safari": "11.1"
                        },
                        "useBuiltIns": "usage",
                        "corejs": "3.6.5"
                    }
                ]
            ]
        };
    }
}

mix.extend('babelExtend', new babelExtend());