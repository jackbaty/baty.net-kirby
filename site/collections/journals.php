<?php 
	return function () {
    return page('posts')
        ->index()
        ->template('post')
        ->listed()
        ->filterBy('tags', 'Journal', ',')
        ->sortBy('date', 'desc');
};
