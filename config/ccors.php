<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    // 'paths' => ['api/*', 'sanctum/csrf-cookie', 'getTickets', 'addTicket', 'updateTicket', 'getContacts', 'addcontact', 'importContacts', 'updateContact', 'ReminderMailFunc'],

    'paths' => ['*'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => ["*pivoapps.net*", "*mensahlive.pivoapps.net*"],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 20000,

    'supports_credentials' => true,

];
