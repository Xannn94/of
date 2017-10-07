<?php
return [
    'title'         => trans('tree::admin.title'),
    'localization'  => true,
    'in_roles'      => 1,

    "modules"       =>[
        ""          => "",
        "news"      => trans('news::admin.title'),
        "feedback"  => trans('feedback::admin.title'),
        "collections"  => trans('collections::admin.title'),],

    "templates" => [
        "inner" => trans('tree::admin.templates.inner'),
        "index" => trans('tree::admin.templates.index')
    ]
];