<?php

/**
 * The config file is optional. It accepts a return array with config options
 * Note: Never include more than one return statement, all options go within this single return array
 * In this example, we set debugging to true, so that errors are displayed onscreen. 
 * This setting must be set to false in production.
 * All config options: https://getkirby.com/docs/reference/system/options
 */
return [
    'debug' => true,
    'home' => 'home',
    'markdown' => [
    	'extra' => true
    ],
    'routes' => [
        [
            'pattern' => 'feed',
            'method' => 'GET',
            'action'  => function () {
                $options = [
                    'title'       => 'Baty.net posts',
                    'description' => 'From Jack Baty\'s blog',
                    'link'        => 'posts',
                    'snippet' => 'feed/rss', // 'feed/json'
                ];
                $feed = collection('posts')
						->index()
						->listed()
						->sortBy('date', 'desc')->limit(10)->feed($options);
                return $feed;
            }
        ],
        [
            'pattern' => '(:any)',
            'action'  => function($uid) {
                $page = page($uid);
                if(!$page) $page = page('posts/' . $uid);
                if(!$page) $page = site()->errorPage();
                return site()->visit($page);
            }
        ],
        [
            'pattern' => 'posts/(:any)',
            'action'  => function($uid) {
                go($uid);
            }
        ]
    ],
];

