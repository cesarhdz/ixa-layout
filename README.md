# Ixa Layout

[![Build Status](https://travis-ci.org/cesarhdz/ixa-layout.png?branch=master)](https://travis-ci.org/cesarhdz/ixa-layout)

<dfn>Ixa Layout</dfn> is a WordPress library that provides basic support to use layouts in themes.

## Requirements

Besides PHP 5.3 you need a WordPress installation with [Composer], for example, [Ixa Wordpress Starter].

[composer]: http://getcomposer.org 
[Ixa Wordpress Starter]: http://github.com/cesarhdz/ixa-wordpress-starter

## Installation 
 
Require as dependency in `composer.json`

    "require": {
        ...
        "ixa/layout" : "0.3"
    } 

And register the filter in `<your-theme>/functions.php` file:

    Ixa\Layout\LayoutFilter::register();

After registering the filter you can decorate your [views](#views) with [layouts](#layouts). By default layout folder is `<your-theme>/layouts`, it can be changed using the first parameter: `LayoutFilter::register($customDir)`.

## Views 

In the layout pattern, a <dfn>view</dfn> is the template that holds the main content. In WordPress terms are the files loaded following template hierarchy.

Regular views have a structure similar to

````
<?php  get_header() ?>

<main>
    <?php the_post() ?>
    <?php the_title() ?>
    <?php the_content() ?>
</main>

<?php  get_sidebar() ?>
<?php  get_footer() ?>
````

Using IxaLayout we can get rid of all unrelated templates tag, writing only the main content:

````
<?php the_post() ?>
<?php the_title() ?>
<?php the_content() ?>
````

IxaLayout will parse the content and display when the layout call `yield_content()` function.
 

### Layouts

<dfn>Layouts</dfn> are wrappers for views, they use the same syntax and functions that regular WordPress templates. They also have the covenient function  `yield_content()` which loads the parsed content of the view. 

A tipical layout would be:

````
<?php  get_header() ?>

<main>
    <?php yield_content() ?>
</main>

<?php  get_sidebar() ?>
<?php  get_footer() ?>
````

### Layout Selection

All layouts must be placed under <your-theme>/layouts folder. default.php layout is requiered since is the fallback in case selected layout is not found.

Within a view we can set the layout we want to apply using `layout()` function. The first parameter is the relative path, without extension of the layout:

    layout('services')

Ixa Layout Will try to load `<your-theme>/layouts/services.php` file, if it doesn't exists will fallback to  `<your-theme>/layouts/default.php`. In case no layout is found an `Ixa/Layout/LayoutNotFoundException` wil be thrown.


## How _Ixa Layout_ works

Ixa Layout is a filter attached to `template_include` with a priority of `10000` in order to be run after all filters, then loads and saves the view selected by WordPress following template hierarchy and returns the path to the layout that WordPress loads.

Ixa Layout isn't a plugin that's why it requires to be autoloaded by Composer and registered in your `functions.php` file. This way we can have consistent code across environments because we don't have to wait the user to activate the plugin.
 

## Development status

It's not fully tested and may collapse with plugins or themes that use `template_include` filter or `ob_get_contents()` function.
