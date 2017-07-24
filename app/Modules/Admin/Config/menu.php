<?php


return [
    'groups'=>[
        [
            'title'     => trans('admin::admin.users'),
            'slug'      => 'users',
            'icon'      => 'fa-users',
            'priority'  => 100
        ],
        [
            'title'     => trans('admin::admin.content'),
            'slug'      => 'content',
            'icon'      => 'fa-file',
            'priority'  => 99
        ],
        [
            'title'     => trans('admin::admin.modules'),
            'slug'      => 'modules',
            'icon'      => 'fa-file',
            'priority'  => 98
        ]
    ],

    'items' => [
        [
            'icon'      => 'fa-photo',
            'group'     => 'content',
            'route'     => 'admin.files.images',
            'priority'  => -100,
            'title'     => trans('admin::admin.images'),
            'slug'      => 'images'
        ],
        [
            'icon'      => 'fa-files-o',
            'group'     => 'content',
            'route'     => 'admin.files.files',
            'priority'  => -100,
            'title'     => trans('admin::admin.files'),
            'slug'      => 'files'
        ]
    ]
];
