<?php
return [
    //file field
    'image' => [
        'path' => '/uploads/sliders/',
        'validator' => 'mimes:jpeg,jpg,png|max:10000',
        //Model field
        'field' => 'image',
        'thumbs' => [
            [
                'path' => 'full/',
                'width' => 900,
                'height' => false,
                'full' => true
            ],
            [
                'path' => 'thumb/',
                'width' => 370,
                'height' => false,
            ],
            [
                'path' => 'mini/',
                'width' => 150,
                'height' => false,
            ],
        ]
    ],
];