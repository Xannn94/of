<?php

return [
    /* ------------------------------------------------------------------------------------------------
     |  Settings
     | ------------------------------------------------------------------------------------------------
     */
    'supported-locales'      => ['en', 'ru'],

    'accept-language-header' => true,

    'hide-default-in-url'    => true,

    'facade'                 => 'Localization',

    /* ------------------------------------------------------------------------------------------------
     |  Route
     | ------------------------------------------------------------------------------------------------
     */
    'route'                  => [
        'middleware' => [
            'localization-session-redirect' => true,
            'localization-cookie-redirect'  => false,
            'localization-redirect'         => true,
            'localized-routes'              => false,
            'translation-redirect'          => true,
        ],
    ],

    /* ------------------------------------------------------------------------------------------------
     |  Locales
     | ------------------------------------------------------------------------------------------------
     */
    'locales'   => [

        'en'          => [
            'name'     => 'English',
            'script'   => 'Latn',
            'dir'      => 'ltr',
            'native'   => 'English',
            'regional' => 'en_GB',
        ],

        'ru'          => [
            'name'     => 'Russian',
            'script'   => 'Cyrl',
            'dir'      => 'ltr',
            'native'   => 'Русский',
            'regional' => 'ru_RU',
        ],

    ],
];
