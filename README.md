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

$factory = new Airlst\PhpCsFixerConfig\Factory(['src', 'tests']);

return $factory->create();
```

The constructor of the `Factory` class takes an array of paths to be scanned for PHP files and fixed. You can pass any number of paths to it.

### Running CS Fixer

Run CS Fixer with the following command:

```shell
./vendor/bin/php-cs-fixer fix
```

### PHP 8.2 support

By default, it uses PHP 8.3 as the target version. You can switch to PHP 8.2 by calling the `php82()` method on the factory object:

```php
<?php

declare(strict_types=1);

$factory = new Airlst\PhpCsFixerConfig\Factory(['src', 'tests']);

return $factory->php82()->create();
```

Only PHP 8.2 and 8.3 are supported.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
