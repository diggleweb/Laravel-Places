Laravel Places
==============

A Laravel 4 package to add place listings to a site, e.g. bars, restaurants or hotels

## Places have
* title, summary and content fields
* main image or YouTube Video
* map showing location (control the marker centre, map centre, map zoom and marker title)
* link to more info about the place (control the URL and the link text)
* separate page title, meta description and keywords fields, also a slug field which is automatically generated from the title
* Draft/Approved status
* published date for future publishing
* Is Sticky? field

## The package comes with
* Optional routes file with configurable URL prefix, or you can choose to use your own routes
* PlacesController with actions for listing places and viewing individual places.
* A migration for the places table, and a faker seed to populate it.
* The Place model for interacting with Place data
* Views and partials for showing the place listings and place details.

## Installation

Add the following to you composer.json file (Recommend swapping "dev-master" for the latest release)

    "fbf/laravel-places": "dev-master"

Run

    composer update

Add the following to app/config/app.php

    'Fbf\LaravelPlaces\LaravelPlacesServiceProvider'

Run the package migration

    php artisan migrate --package=fbf/laravel-places

Publish the config

    php artisan config:publish fbf/laravel-places

Optionally tweak the settings in the many config files for your app

Optionally copy the administrator config file (`src/config/administrator/places.php`) to your administrator model config directory.

Create the relevant image upload directories that you specify in your config, e.g.

    public/uploads/packages/fbf/laravel-places/main_image/original
    public/uploads/packages/fbf/laravel-places/main_image/thumbnail
    public/uploads/packages/fbf/laravel-places/main_image/resized

## Faker seed

The package comes with a seed that can populate the table with a whole bunch of sample places. There are some configuration options for the seeder in the seed config file. To run it:

    php artisan db:seed --class="Fbf\LaravelPlaces\FakePlacesSeeder"

## Configuration

See the many configuration options in the files in the config directory

## Administrator

You can use the excellent Laravel Administrator package by frozennode to administer your data.

http://administrator.frozennode.com/docs/installation

A ready-to-use model config file for the `Place` model (`places.php`) is provided in the `src/config/administrator` directory of the package, which you can copy into the `app/config/administrator` directory (or whatever you set as the `model_config_path` in the administrator config file).

## Usage

The package should work out the box (provided you have a master blade layout file, since the out-of-the-box views extend this)
 but if you want to add other content to the pages, such as your own header, logo, navigation, sidebar etc, you'll want to
 override the views provided.

The package views declare several sections that you may want to `yield` in your `app/views/layouts/master.blade.php` file, e.g.:

```html
<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta name="description" content="@yield('meta_description')">
	<meta name="keywords" content="@yield('meta_keywords')">
</head>
<body>
<div class="content">
	@yield('content')
</div>
</body>
</html>
```

The package's views are actually really simple, and most of the presentation is done in partials. This is deliberate so you
 can override the package's views in your own app, so you can include your own chrome, navigation and sidebars etc, yet
 you can also still make use of the partials provided, if you want to.

To override any view in your own app, just create the following directories and copy the file from the package into it, then hack away
* `app/views/packages/fbf/laravel-places/places`
* `app/views/packages/fbf/laravel-places/partials`

## Extending

You can extend the model to add more fields, relations and even filter event listings by a relationship.

See the extending section in the readme on http://github.com/FbF/Laravel-Blog as it works the same way.