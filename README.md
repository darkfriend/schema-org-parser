# Schema.org microdata parser

* * *

*It`s fork from [yusufkandemir/microdata-parser](https://github.com/yusufkandemir/microdata-parser) for support **php7**.*

* * *

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![PHP Version Support][ico-php-version]]([link-version])
[![Total Downloads][ico-downloads]][link-downloads]

This package aims to implement [W3C Microdata to JSON Specification](https://www.w3.org/TR/microdata/#json).

**microdata-parser** extracts microdata from documents.

## Installation

Via Composer

``` bash
$ composer require darkfriend/schema-org-parser
```

## Usage

##### PHP
```php
use Darkfriend\SchemaOrgParser\Microdata;

$microdata = Microdata::fromHTMLFile('source.html')->toJSON();
/* Other sources:
     fromHTML()        // from HTML string
     fromDOMDocument() // from DOMDocument object
   Other output methods:
     toArray()  // to Associtive PHP Array
     toObject() // to PHP Object (stdClass)
*/
```

##### Source as HTML
```html
<!-- source.html -->
<div itemscope itemtype="http://schema.org/Product">
  <img itemprop="image" src="http://shop.example.com/test_product.jpg" />
  <a itemprop="url" href="http://shop.example.com/test_product">
    <span itemprop="name">Test Product</span>
  </a>
</div>
```
##### Result as JSON
```json
{
  "items": [
    {
      "type": [ "http://schema.org/Product" ],
      "properties": {
        "image": [ "http://shop.example.com/test_product.jpg" ],
        "url": [ "http://shop.example.com/test_product" ],
        "name": [ "Test Product" ]
      }
    }
  ]
}
```

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Credits

- [Yusuf Kandemir](https://github.com/yusufkandemir)
- [Darkfriend][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/darkfriend/schema-org-parser.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-php-version]: https://img.shields.io/packagist/php-v/darkfriend/schema-org-parser?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/darkfriend/schema-org-parser.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/darkfriend/schema-org-parser
[link-version]: https://packagist.org/packages/darkfriend/schema-org-parser
[link-tests]: https://github.com/darkfriend/schema-org-parser/actions/workflows/run-tests.yml
[link-code-quality]: https://github.com/darkfriend/schema-org-parser/actions/workflows/analyze-quality.yml
[link-downloads]: https://packagist.org/packages/darkfriend/schema-org-parser
[link-author]: https://github.com/darkfriend
[link-contributors]: ../../contributors
