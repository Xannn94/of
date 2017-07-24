<?php
return [

    //file field
    'image' => [
        'path'      => '/uploads/news/',
        'validator' => 'mimes:jpeg,jpg,png|max:10000',

        //Model field
        'field' => 'image',

        'thumbs' => [
            [
                'path'      => 'full/',
                'width'     => 800,
                'height'    => false,
                'watermark' =>[
                    'path'      => '/img/watermark.png',
                    'position'  => 'bottom'
                ]
            ],
            [
                'path'      => 'thumb/',
                'width'     => 450,
                'height'    => false,
            ],
            [
                'path'      => 'mini/',
                'width'     => 250,
                'height'    => false
            ]
        ]
    ]
];