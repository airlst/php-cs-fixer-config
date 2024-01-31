# PHP CS Fixer config for AirLST projects

[![Latest Version on Packagist](https://img.shields.io/packagist/v/airlst/php-cs-fixer-config.svg?style=flat-square)](https://packagist.org/packages/airlst/php-cs-fixer-config)
[![Total Downloads](https://img.shields.io/packagist/dt/airlst/php-cs-fixer-config.svg?style=flat-square)](https://packagist.org/packages/airlst/php-cs-fixer-config)

PHP CS Fixer config for AirLST projects.

## Installation

You can install the package via Composer:

```bash
composer require --dev airlst/php-cs-fixer-config
```

## Usage

Create a `.php-cs-fixer.php` in the root of your project with the following contents:

```php
<?php

declare(strict_types=1);

return Airlst\PhpCsFixerConfig\Factory::create(['src', 'tests']);
```

The first argument of the `create()` method is an array of paths to be scanned for PHP files and fixed. You can pass any number of paths to it.

By default, it uses PHP 8.3 as the target version. You can override this by passing the target version as the second argument to the `create()` method:

```php
<?php

declare(strict_types=1);

return Airlst\PhpCsFixerConfig\Factory::create(['src', 'tests'], '8.2');
```

Only PHP 8.2 and 8.3 are supported.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
