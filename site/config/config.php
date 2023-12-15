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
                    'title'       => 'Baty.net',
                    'description' => 'Jack Baty\'s blog',
                    'link'        => 'posts',
                    'snippet' => 'feed/rss', // 'feed/json'
                ];
                $feed = collection('posts-and-notes')
						->index()
						->listed()
						->sortBy('date', 'desc')->limit(10)->feed($options);
                return $feed;
            }
        ],
        [
            'pattern' => '(:num)/(:num)/(:any)',
            'action'  => function($year, $month, $slug) {
                $uid = $year . '/' . $month . '/' . $slug;
                $page = page($uid);
                if(!$page) $page = page('posts/'. $uid);
                if(!$page) $page = site()->errorPage();
                return site()->visit($page);
            }
        ],
        [
            'pattern' => 'posts/(:num)/(:num)/(:any)',
            'action'  => function($year, $month, $slug) {
            	$uid = $year . '/' . $month . '/' . $slug;
                go($uid);
            }
        ]
    ],
];

