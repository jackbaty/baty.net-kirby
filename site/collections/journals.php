<?php 
	return function () {
    return page('posts')
        ->index()
        ->template('journal')
        ->listed()
        ->sortBy('date', 'desc');
};
