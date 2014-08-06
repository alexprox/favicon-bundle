Getting Started
==================================

## Installation

1. Download bundle using composer
2. Enable the bundle
3. Import bundle routing files
4. Icon import

### Step 1: Download bundle using composer

Add bundle in your composer.json:

```js
{
    "require": {
        "alexprox/favicon-bundle": "@todo"
    }
}
```

Now tell composer to download the bundle by running the command:

``` bash
$ php composer.phar update alexprox/favicon-bundle
```

Composer will install the bundle to your project's `vendor/alexprox` directory.

### Step 2: Enable the bundle

Enable the bundle in the kernel:

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

### Step 3: Import bundle routing files

``` yaml
# app/config/routing.yml
alexprox_favicon:
    resource: "@AlexproxFavIconBundle/Resources/config/routing.yml"

```

### Step 4: Icon import

Place your icon.png into to your project's `web` directory
(icon MUST be square with >=260px size)