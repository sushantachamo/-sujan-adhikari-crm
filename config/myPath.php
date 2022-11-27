<?php
return [
    'assets' => [
        'theme' => [
            'panel' => [
                'css' => 'admin/assets/css/',
                'js' => 'admin/assets/js/',
                'fonts' => 'admin/assets/fonts/',
                'plugins' => 'admin/assets/plugins/'
            ],
            'frontEnd' => [
                'css' => 'frontend/assets/css/',
                'js' => 'frontend/assets/js/',
                'lib' => 'frontend/assets/lib/',
            ],
        ],
        'panel_image_folders' => [
            'users' => 'users',
            'sliders' => 'sliders',
            'office' => 'office',
            'site-config' => 'site-config',
        ],
    ],
    'image-dimensions' => [
        'users' => [
            ['width' => 50, 'height' => 50],
            ['width' => 300, 'height' => 200],
        ],
        'page_content' => [
            ['width' => 300, 'height' => 250],
        ],
    ],
    'default_languages' => [
        'en',
        'np'
    ],

    'show_recaptcha' => env('RECAPTCHA_ENABLE', true),

    'mail_to'      => env('MAIL_TO', 'info@vtechnepal.com'),
    'mail_to_name' => env('MAIL_TO_NAME', 'Sahakari Docs'),

    'fiscal_year' =>
    [
        '076-77' => "076-77",
        '077-78' => "077-78",
        '078-79' => "078-79",
    ]
];