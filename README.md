ZF2Tracy
========

# Tracy PHP debugger module for ZF2

http://nette.github.io/tracy/

## Installation

1. Add to your composer.json and run 'php composer.phar install/update'
```json
{
    "require": {
        "jorgesierra/zf2tracy": "dev-master"
    }
}
```

2. Add 'ZF2Tracy' to the enabled modules list

## Usage

\Tracy\Debugger::dump($var);

## Configuration

```array
return array(
    'tracy_debug' => array(
        'enabled' => TRUE,
        'mode' => FALSE,    // true = production|false = development|null = autodetect|IP address(es) csv/array
        'log' => "",        // bool = enabled|Path to directory eg. data/logs
        'email' => "",      // in production mode notifies the recipient
        'strict' => TRUE,   // bool = cause immediate death|int = matched against error severity
        'max_depth' => 3,   // nested levels of array/object
        'max_len' => 150,   // max string display length
    ),
);
```

Inspired by https://github.com/webino/ZF2NetteDebug