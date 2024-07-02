<?php

Kirby::plugin('getkirby/date-to-slug', [
	'siteMethods' => [
	'daynum' => function() {
		return date('d');
	},
	'pretty-date' => function() {
		return date('j F Y \(l\)');
	}
	]
]);
