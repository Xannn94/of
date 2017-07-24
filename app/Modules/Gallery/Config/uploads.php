<?php
return [

    //file field
    'image' => [
        'path'      => '/uploads/gallery/',
        'validator' => 'mimes:jpeg,jpg,png|max:10000',

        //Model field
        'field' => 'image',

        'thumbs' => [
            [
                'path'      => 'full/',
                'width'     => 800,
                'height'    => false,
                'watermark' => [
                    'path'      => '/img/watermark.png',
                    'position'  => 'bottom'
                ]
            ],
            [
                'path'      => 'thumb/',
                'width'     => 350,
                'height'    => false,
            ],
            [
                'path'      => 'mini/',
                'width'     => 150,
                'height'    => false
            ]
        ]
    ]
];