
# Excel Read Write (PhpSpreadSheets)

PhpSpreadsheet is a library written in pure PHP and offers a set of classes that
allow you to read and write various spreadsheet file formats such as Excel and LibreOffice Calc.

## PHP version support

Currently the required PHP minimum version is PHP __7.3__ or higher.

See the `composer.json` for other requirements.

## Installation

Use [composer](https://getcomposer.org) to install PhpSpreadsheet into your project: `<br/>`
or by cmd:

`php -r "readfile('https://getcomposer.org/installer');" | php`
`<br/>`

`composer require yidas/phpspreadsheet-helper`

```sh
composer require phpoffice/phpspreadsheet
```

If you are building your installation on a development machine that is on a different PHP version to the server where it will be deployed, or if your PHP CLI version is not the same as your run-time such as `php-fpm` or Apache's `mod_php`, then you might want to add the following to your `composer.json` before installing:

```json
{
    "require": {
        "phpoffice/phpspreadsheet": "^1.23"
    },
    "config": {
        "platform": {
            "php": "7.3"
        }
    }
}
```

and then run

```sh
composer install
```

to ensure that the correct dependencies are retrieved to match your deployment environment.

See [CLI vs Application run-time](https://php.watch/articles/composer-platform-check) for more details.

## Runnig on localhost

`php -S localhost:8000`

### Additional Installation Options

If you want to write to PDF, or to include Charts when you write to HTML or PDF, then you will need to install additional libraries:

## Export Data

Export data from **MySQL DB** into **Excel Files**.

## Import Data

import data from **Excel Files** into **MySQL DB**.


## Documentation

Read more about it, including install instructions, in the [official documentation](https://phpspreadsheet.readthedocs.io). Or check out the [API documentation](https://phpoffice.github.io/PhpSpreadsheet).

Please ask your support questions on [StackOverflow](https://stackoverflow.com/questions/tagged/phpspreadsheet), or have a quick chat on [Gitter](https://gitter.im/PHPOffice/PhpSpreadsheet).

## PHPExcel vs PhpSpreadsheet ?

PhpSpreadsheet is the next version of PHPExcel. It breaks compatibility to dramatically improve the code base quality (namespaces, PSR compliance, use of latest PHP language features, etc.).

# Excel Read Write - Php Spread Sheets 

Excel Read Write PHP Spread Sheets Full
