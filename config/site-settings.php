<?php

return [

    /*
    |--------------------------------------------------------------------------
    | For Cache Enable or Disable
    |--------------------------------------------------------------------------
    | Supported: "true", "false"
    |
    */

    'cache'       => false,

    /*
    |--------------------------------------------------------------------------
    | For Migration table name
    |--------------------------------------------------------------------------
    */
    'table' => 'settings',

    /*
    |--------------------------------------------------------------------------
    | Settings Key Column and Value Column
    |--------------------------------------------------------------------------
    | If you want to use custom column names in database store you could set
    | them in this configuration
    |
    */
    'keyColumn'   => 'key',
    'valueColumn' => 'value'
];
