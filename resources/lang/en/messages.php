<?php

return [
    'title' => 'Settings',
    'group' => 'Settings',
    'back' => 'Back',
    'settings' => [
        'site' => [
            'title' => 'Site Settings',
            'description' => 'Manage your site settings',
            'form' => [
                'site_name' => 'Site Name',
                'site_description' => 'Site Description',
                'site_logo' => 'Site Logo',
                'site_profile' => 'Site Profile Image',
                'site_keywords' => 'Site Keywords',
                'site_email' => 'Site Email',
                'site_phone' => 'Site Phone',
                'site_author' => 'Site Author',
            ],
            'site-map' => 'Generate Site Map',
            'site-map-notification' => 'Site Map Generated Successfully',
        ],
        'social' => [
            'title' => 'Social Menu',
            'description' => 'Manage your social menu',
            'form' => [
                'site_social' => 'Social Links',
                'vendor' => 'Vendor',
                'link' => 'Link',
            ],
        ],
        'location' => [
            'title' => 'Location Settings',
            'description' => 'Manage your location settings',
            'form' => [
                'site_address' => 'Site Address',
                'site_phone_code' => 'Site Phone Code',
                'site_location' => 'Site Location',
                'site_currency' => 'Site Currency',
                'site_language' => 'Site Language',
            ],
        ],
    ],
];
