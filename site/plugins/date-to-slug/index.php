<?php

Kirby::plugin('getkirby/date-to-slug', [
	'siteMethods' => [
	'daynum' => function() {
		return date('d');
	},
	'dayslug' => function() {
		return date('dMy');
	},
	'pretty-date' => function() {
		return date('j F Y \(l\)');
	}
	]
]);
