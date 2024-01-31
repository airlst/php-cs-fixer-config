# PHP CS Fixer config for AirLST projects

[![Latest Version on Packagist](https://img.shields.io/packagist/v/airlst/php-cs-fixer-config.svg?style=flat-square)](https://packagist.org/packages/airlst/php-cs-fixer-config)
[![Total Downloads](https://img.shields.io/packagist/dt/airlst/php-cs-fixer-config.svg?style=flat-square)](https://packagist.org/packages/airlst/php-cs-fixer-config)
![GitHub Actions](https://github.com/airlst/php-cs-fixer-config/actions/workflows/main.yml/badge.svg)

PHP CS Fixer config for AirLST projects.

## Installation

You can install the package via composer:

```bash
composer require --dev airlst/php-cs-fixer-config
```

## Usage

Create a `.php-cs-fixer.php` in the root of your project with the following contents:

```php
<?php

declare(strict_types=1);

return Airlst\PhpCsFixerConfig\Factory::create();
```

By default, it uses the following folders to scan and fix PHP files:

- `app`
- `config`
- `database`
- `routes`
- `tests`

If can override these folders by passing an array of folders to the `create()` method:

```php
<?php

declare(strict_types=1);

return Airlst\PhpCsFixerConfig\Factory::create(['app', 'tests']);
```

By default, it uses PHP 8.3 as the target version. You can override this by passing the target version as the second argument to the `create()` method:

```php
<?php

declare(strict_types=1);

return Airlst\PhpCsFixerConfig\Factory::create(['app', 'tests'], '8.2');
```

Only PHP 8.2 and 8.3 are supported.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
