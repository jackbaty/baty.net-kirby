<?php
/**
 * Collections help with keeping your code DRY 
 * if you need to reuse the same set up pages, files or users in multiple places across your site.
 * 
 * More about collections:
 * https://getkirby.com/docs/guide/templates/collections
 */
return function () {
    return page('posts')
        ->index()
        ->listed()
        ->filterBy('template', 'in', ['post', 'journal'])
        ->sortBy('date', 'desc');
};
