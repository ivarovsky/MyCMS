# MyCMS 0.1

## Welcome

This project started as a simple, lightweight CMS built in PHP for my
own personal use.\
It was created out of a practical need --- to have a fast, minimal, and
fully controllable system without unnecessary complexity.

Over time, the project evolved. It became more stable, more structured,
and more flexible.\
And now, instead of keeping it private, I've decided to make it public.

I believe software should be open, transparent, and useful beyond its
original purpose.\
If this CMS can save someone time, help launch a project, or serve as a
learning reference --- then sharing it is worth it.

------------------------------------------------------------------------

# Project Directory Structure

This document explains the purpose of each main directory in the CMS.

## 📂 /views

The `views` directory stores the visual representation of your pages.

-   Contains `*.view.php` files\
-   Defines layout and page structure\
-   Handles UI output

------------------------------------------------------------------------

## 📂 /routes

The `routes` directory defines application paths and URL handling.

-   Stores routing definitions\
-   Maps URLs to system actions\
-   Acts as the navigation logic layer

------------------------------------------------------------------------

## 📂 /language

The `language` directory stores localization files for multilingual
support.

-   Contains language packages\
-   Supports multiple site localizations\
-   Allows easy translation management

------------------------------------------------------------------------

## 📂 /classes

The `classes` directory contains core system files required for the CMS
to function properly.

-   Stores system logic classes\
-   Handles internal functionality\
-   Contains configuration and bootstrap logic

### 📄 base.php

Located inside the `/classes` directory.

Contains essential configuration and initialization settings required to
launch and render system pages.

-   Core configuration\
-   System initialization logic\
-   Required startup settings

------------------------------------------------------------------------

## 📂 /tmp

The `tmp` directory stores temporary system files.

-   Used for temporary data storage\
-   May contain cache or runtime-generated files\
-   Can be safely cleared if required (unless in active use)

------------------------------------------------------------------------

## 📂 /tpl

The `tpl` directory stores page layout templates.

-   Contains reusable layout structures\
-   Defines the visual skeleton of pages\
-   Separates design structure from business logic

------------------------------------------------------------------------

# 1. Creating a View

To create a new View:

-   Create a file named `example.view.php`
-   Place it inside the `views` directory
-   Inside the file, create a class
-   The class name must contain the word **View**
-   Add a `main()` method inside the class

### Example

``` php
<?php

class exampleView
{
    public function main($data)
    {
        echo $data["example"];
    }
}
```

------------------------------------------------------------------------

## 1.2 Passing Data to the View

If you need to pass data into the View, add a parameter to the `main()`
method.

The data will be available as an array:

``` php
$data["example"];
```

------------------------------------------------------------------------

## 1.3 Calling a View

A View is called using the `obj` class.

-   The first argument is the name of the View
-   The second argument is optional and contains data

### Example

``` php
obj::View('example', ['example' => 'example']);
```

------------------------------------------------------------------------

### Summary

-   Create `example.view.php` inside the `views` folder
-   Define a class containing the word **View**
-   Add a `main()` method
-   Optionally accept data as a parameter
-   Call the View using `obj::View()`

------------------------------------------------------------------------

# 2. Create Route

To create a new Route, please read the detailed guide below:

https://github.com/nezamy/route

------------------------------------------------------------------------

## Basic Route Setup

To define a new route:

-   Create a file inside the `routes` directory
-   The filename must follow this pattern:

```{=html}
<!-- -->
```
    example.route.php

All route files are automatically loaded by the system.\
You **do not** need to manually include or require them anywhere.

> The CMS automatically scans and initializes every `*.route.php` file
> inside the `routes` directory during system startup.
