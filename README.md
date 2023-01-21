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
you can use 4 facades in this  package for different functionalities in this package
```php
ZayaLinkFacade::
ZayaSpaceFacade::
ZayaDomainFacade::
ZayaAccountFacade::
```
the list of available methods for v.1.0.0 :
## Available Methods For Link
```php
ZayaLinkFacade::create($yourlink,$params); 
ZayaLinkFacade::list(); //this will give you all links you have
ZayaLinkFacade::get($id); //this will give you detail of a given link
ZayaLinkFacade::update($id,$link); //this will update a link for a given id
ZayaLinkFacade::delete($id); //this will remove a link by a given id
```
## Available Methods For Space :
```php
ZayaSpaceFacade::create($name,$color); //this will create an space for you :https://zaya.io/developers/spaces?section=create#create
ZayaSpaceFacade::list(); //this will give you all spaces you have
ZayaSpaceFacade::get($id); //this will give detail of a given space
ZayaSpaceFacade::update($id,$name,$color); //this will update an space for a given id
ZayaSpaceFacade::delete($id); //this will remove an space by a given id
```
## Available Methods for Domain :
```php
ZayaDomainFacade::list(); //this will give you all domains you have
ZayaDomainFacade::create($name,$index,$notFound); //this will create a domain for you :https://zaya.io/developers/domains?section=create#create
ZayaDomainFacade::get($id); //this will give detail of a given domain
ZayaDomainFacade::update($id,$name,$index_page = null,$not_found_page = null); //this will update a domain for a given id note that 2 params at last are optional
ZayaDomainFacade::delete($id); //this will remove a domain by a given id
```
## Available Methods for Account :
```php
ZayaAccountFacade::detail(); //this will give you account information
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
