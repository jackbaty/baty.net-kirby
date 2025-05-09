<?php

/**
 * The config file is optional. It accepts a return array with config options
 * Note: Never include more than one return statement, all options go within this single return array
 * In this example, we set debugging to true, so that errors are displayed onscreen. 
 * This setting must be set to false in production.
 * All config options: https://getkirby.com/docs/reference/system/options
 */
return [
    'debug' => false,
    'home' => 'home',
    'markdown' => [
    	'extra' => true
    ],
    'routes' => [
        
				 // Setup the rss feed
		 [
		 'pattern' => ['index.xml', 'feed'],
		 'action' => function () {
		 $title = "Jack Baty Daily";
		 $description = "Latest journals from Jack Baty";
		 $posts = kirby()->collection('posts-and-notes')->limit(10);
		 return new Response(snippet('rss', compact('title', 'description', 'posts') , true),
		 'application/rss+xml');
		 }
		 ],
		 // for year/month/slug redirect
        [
            'pattern' => '(:num)/(:num)/(:any)',
            'action'  => function($year, $month, $slug) {
                $uid = $year . '/' . $month . '/' . $slug;
                $page = page($uid);
                if(!$page) $page = page('posts/'. $uid);
                if(!$page) $page = site()->errorPage();
                //return site()->visit($page);
                go($page);
            }
        ],
        
        
    ],
];

