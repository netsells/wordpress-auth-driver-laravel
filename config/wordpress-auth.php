<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Separate Database Connection
    |--------------------------------------------------------------------------
    |
    | You can define your own connection other than the default one in
    | database.php to use multiple connections/database in one.
    |
    */
    'connection' => 'mysql',

    /*
    |--------------------------------------------------------------------------
    | Password hashing configuration for Wordpress authentication
    |--------------------------------------------------------------------------
    */
    'hash' => [

        /*
        |--------------------------------------------------------------------------
        | Iteration Count
        |--------------------------------------------------------------------------
        |
        | The number of iterations used to hash the password.
        | Minimum: 4, Maximum: 31
        |
        */
        'iteration_count' => 8,


        /*
        |--------------------------------------------------------------------------
        | Portable Hashes
        |--------------------------------------------------------------------------
        |
        | Should we generate portable hashes? true or false
        |
        */
        'portable_hashes' => true,

    ],

    /*
    |--------------------------------------------------------------------------
    | Login credentials for the user provider
    |--------------------------------------------------------------------------
    */
    'credentials' => [

        /*
        |--------------------------------------------------------------------------
        | Email
        |--------------------------------------------------------------------------
        |
        | Configures whether we should only use the email to make the query
        | regardless of the credentials provided.
        |
        */
        'email_only' => false,

        /*
        |--------------------------------------------------------------------------
        | Email
        |--------------------------------------------------------------------------
        |
        | The email field to query.
        |
        */
        'email' => 'user_email',

        /*
        |--------------------------------------------------------------------------
        | Email Column
        |--------------------------------------------------------------------------
        |
        | The email column to query.
        |
        */
        'email_column' => 'user_email',

        /*
        |--------------------------------------------------------------------------
        | Password field
        |--------------------------------------------------------------------------
        |
        | The password field used in the database.
        |
        */
        'password' => 'user_pass',
    ]

];
