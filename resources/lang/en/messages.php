<?php

return [
    'title' => 'Settings',
    'group' => 'Settings',
    'back' => 'Back',
    'settings' => [
        'group' => 'General',
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
            'site_seo' => 'Site SEO',
            'site-map' => 'Generate Site Map',
            'site-map-notification' => 'Site Map Generated Successfully',
            'site_name_description' => 'The name of your site that will be used in the title of your site',
            'site_description_description' => 'The description of your site that will be used in the meta description of your site',
            'site_logo_description' => 'The logo of your site that will be used in the header of your site',
            'site_images' => 'Site Images',
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
    ],
];
