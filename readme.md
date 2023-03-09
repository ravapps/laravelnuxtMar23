<p align="center">
  <img src="laranuxt.png" width="92" height="92" />
</p>

<p align="center">
  <a href="https://laravel.com"><img src="Laravel.png" width="92" height="92" /></a>
  <a href="https://vuejs.org"><img src="Vue.png" width="92" height="92" /></a>
  <a href="https://www.typescriptlang.org/"><img src="Typescript.png" width="92" height="92" /></a>
  <a href="https://tailwindcss.com"><img src="tailwind.jpg" width="184" height="92" /></a>
  <a href="https://github.com/acidjazz/metapi"><img src="api.png" width="92" height="92" /></a>
</p>



## Laravel + Nuxt.js 

[![](https://img.shields.io/badge/nuxt.js-v2.15.8-04C690.svg)](https://nuxtjs.org)
[![](https://img.shields.io/badge/Laravel-v8.60.0-ff2e21.svg)](https://laravel.com)
![Test PHP](https://github.com/acidjazz/laranuxt/workflows/Test%20PHP/badge.svg)
![Test Javascript](https://github.com/acidjazz/laranuxt/workflows/Test%20Javascript/badge.svg)
[![Lint Javascript](https://github.com/acidjazz/laranuxt/actions/workflows/lint-js.yml/badge.svg)](https://github.com/acidjazz/laranuxt/actions/workflows/lint-js.yml)
[![Lint PHP](https://github.com/acidjazz/laranuxt/actions/workflows/lint-php.yml/badge.svg)](https://github.com/acidjazz/laranuxt/actions/workflows/lint-php.yml)



### What is included

* [NUXT](https://nuxtjs.org) front end, a progressive Vue.js framework - `v2.15.8`
  * [@nuxtjs/typescript-build](https://typescript.nuxtjs.org/) TypeScript Support for Nuxt.js
  * [@nuxtjs/composition-api](https://composition-api.nuxtjs.org/) Composition API Support for Nuxt.js
  * [@nuxtjs/tailwindcss](https://tailwindcss.nuxtjs.org/) a [utility-first](https://tailwindcss.com) framework - now with PurgeCSS built in
  * [@nuxtjs/axios](https://github.com/nuxt-community/axios-module) to communicate with our API 
  * [nuxt-tailvue](https://github.com/acidjazz/nuxt-tailvue) a collection of components built for Nuxt.js, powered by TailwindCSS

* [Laravel](https://laravel.com) - for our API - `v8.60.0`
  * [MetAPI](https://github.com/acidjazz/metapi) - API helpers and utilities
  * [debugbar](https://github.com/barryvdh/laravel-debugbar) - awesome debugbar for our API
  * [ide-helper](https://github.com/barryvdh/laravel-ide-helper) - Helper files to enable help with IDE autocompletion

### Installation

* clone from GitHub
* run `npm install` / `yarn` and `composer install` to install all of your deps
* copy `.env.example` to `.env` and configure it mainly for database settings / app key
* create db tables with php artisan migrate
* create 
* TL;DR
 ```bash
git clone <gitrepourl>; cd <projectfolder>; npm install / yarn; composer install; cp .env.example .env; php artisan migrate
 ```
* Feel free to delete excess media in  `/client/static/`, just images for the readme


### Before running 
* edit nuxt.config.js for the api url changes on axios
* edit tsconfig.json jsconfig.json for tailwind and typescript configuration

### Local Environment (yarn way)
* run `yarn dev` in one terminal for our nuxt dev setup
* run `yarn api` (alias for `./artisan serve`) in another terminal for our laravel API

### Local Environment (npm way)
* run `npm run dev` in one terminal for our nuxt dev setup
* run `php artisan serve` (alias for `./artisan serve`) in another terminal for our laravel API  OR you can run under a webserver but supports PHP version after 8. 


### Video to include
### Project description to include



### Enjoy !