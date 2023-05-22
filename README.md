# Simple Workflow with Laravel Mix.

## Install

- `npm i`

## Features

- Copy `src/*.twig` to `dist/*.html` folder.
- Doesn't copy `templates/*.twig` and `templates/**/*.twig`
- Copy `src/assets/*/` to `dist/assets/*/` folder.
- Compile SASS `src/styles/app.scss` to `dist/styles` folder.
- Bundle and transpile JS `src/scripts/app.js` to `dist/scripts` folder.
- Run a dev web server with browsersync.

## Commands

- `npm start` : build on files changes, launch a dev server with browsersync.
- `npm run clean` : clean the `dist` folder.
- `npm run build` : create `dist` folder with minification.
