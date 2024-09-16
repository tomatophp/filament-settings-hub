<?php

return [
    'title' => 'الإعدادات',
    'group' => 'الإعدادات',
    'back' => 'رجوع',
    'settings' => [
        'site' => [
            'title' => 'إعدادات الموقع',
            'description' => 'قم بادارة اعدادت موقعك',
            'form' => [
                'site_name' => 'اسم الموقع',
                'site_description' => 'وصف الموقع',
                'site_logo' => 'شعار الموقع',
                'site_profile' => 'صورة الموقع',
                'site_keywords' => 'الكلمات الدلالية',
                'site_email' => 'البريد الالكتروني',
                'site_phone' => 'الهاتف',
                'site_author' => 'مالك الموقع',
            ],
            'site-map' => 'إنشاء خريطة للموقع',
            'site-map-notification' => 'تم إنشاء خريطة الموقع بنجاح',
        ],
        'social' => [
            'title' => 'روابط التواصل الاجتماعي',
            'description' => 'قم باضافة وادارة روابط مواقع التواصل الاجتماعي',
            'form' => [
                'site_social' => 'الروابط',
                'vendor' => 'اسم الشبكة',
                'link' => 'الرابط',
            ],
        ],
        'location' => [
            'title' => 'إعدادات الموقع الجغرافي',
            'description' => 'قم بإدارة موقعك الجعرافي واللغة والعملة',
            'form' => [
                'site_address' => 'العنوان',
                'site_phone_code' => 'كود هاتف الدولة',
                'site_location' => 'الدولة',
                'site_currency' => 'العملة',
                'site_language' => 'اللغة',
            ],
        ],
    ],
];
