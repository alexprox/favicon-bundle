Getting Started
==================================

## Installation

1. Download bundle using composer
2. Enable bundle
3. Import bundle routing file
4. Icon import
5. Use it!

### Step 1: Download bundle using composer

Add bundle in your composer.json:

```js
{
    "require": {
        "alexprox/favicon-bundle": "1.*"
    }
}
```

Now tell composer to download the bundle by running the command:

``` bash
$ php composer.phar update alexprox/favicon-bundle
```

Composer will install the bundle to your project's `vendor/alexprox` directory.

### Step 2: Enable bundle

Enable bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Alexprox\Bundle\FavIconBundle\AlexproxFavIconBundle(),
    );
}
```

### Step 3: Import bundle routing file

``` yaml
# app/config/routing.yml
alexprox_favicon:
    resource: "@AlexproxFavIconBundle/Resources/config/routing.yml"

```

### Step 4: Icon import

Place your icon to your project's `web` directory.

Icon must be:
* With name `icon.png`
* Square
* With size `260px` or more
* With `read` permissions for all

### Step 5: Use it!

At your layout template template:

``` twig
    <!DOCTYPE html>
    <html>
        <head>
            {{ icons() }}
            ...

```

## What is broken?

All Windows 8 (IE11) stuff
* Tiles
* browserconfig.xml
