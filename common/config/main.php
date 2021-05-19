<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'extensions' => require(__DIR__.'/../../vendor/yiisoft/extensions.php'),
    'modules' => [
	'gridview' => [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to  
            // use your own export download action or custom translation 
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
	],
        'social' => [
            'class' => 'kartik\social\Module',
            // the global settings for the disqus widget
            'disqus' => [
                'settings' => ['shortname' => 'DISQUS_SHORTNAME'] // default settings
            ],
            // the global settings for the facebook plugins widget
            'facebook' => [
                'appId' => '490013521161865',
                'secret' => 'c959777d18581d08a81ec570a95c6fed',
            ],
            // the global settings for the google plugins widget
            'google' => [
                'clientId' => 'GOOGLE_API_CLIENT_ID',
                'pageId' => 'GOOGLE_PLUS_PAGE_ID',
                'profileId' => 'GOOGLE_PLUS_PROFILE_ID',
            ],
            // the global settings for the google analytic plugin widget
            'googleAnalytics' => [
                'id' => 'TRACKING_ID',
                'domain' => 'TRACKING_DOMAIN',
            ],
            // the global settings for the twitter plugin widget
            'twitter' => [
                'screenName' => 'TWITTER_SCREEN_NAME',
            ]
        ]
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
