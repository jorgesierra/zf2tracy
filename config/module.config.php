<?php
return array(
    'tracy_debug' => array(
        'enabled' => TRUE,
        'mode' => FALSE,  // true = production|false = development|null = autodetect|IP address(es) csv/array
        'log' => "",      // bool = enabled|Path to directory eg. data/logs
        'email' => "",    // in production mode notifies the recipient
        'strict' => TRUE, // bool = cause immediate death|int = matched against error severity
        'max_depth' => 3, // nested levels of array/object
        'max_len' => 150, // max string display length
    ),
);