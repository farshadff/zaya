# Zaya link shortener sdk for laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/farshadff/zaya.svg?style=flat-square)](https://packagist.org/packages/farshadff/zaya)
[![Total Downloads](https://img.shields.io/packagist/dt/farshadff/zaya.svg?style=flat-square)](https://packagist.org/packages/farshadff/zaya)
![GitHub Actions](https://github.com/farshadff/zaya/actions/workflows/main.yml/badge.svg)

using this package you can easily implement the zaya.io link shortener in your laravel application
## Installation

You can install the package via composer:

```bash
composer require farshadff/zaya
```
then add the development api key to your env :
```angular2html
ZAYA_API_KEY=W******************************7
```
## Usage
now you can easily call `ZayaFacade` to get the api methods :

```php
$shortLink = ZayaFacade::makeLink($yourlink);
```
the list of available methods for v.1.0.0 :
```php
ZayaFacade::listLink(); //this will give you all links you have
ZayaFacade::detailLink($id); //this will give you detail of a given link
ZayaFacade::updateLink($id,$link); //this will update a link for a given id
ZayaFacade::deleteLink($id); //this will remove a link by a given id

 
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email farshad.badiee@gmail.com instead of using the issue tracker.

## Credits

-   [farshad](https://github.com/farshadff)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
