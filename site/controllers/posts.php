<?php
/**
 * Controllers allow you to separate the logic of your templates from your markup.
 * This is especially useful for complex logic, but also in general to keep your templates clean.
 *
 * In this example, we handle tag filtering and paginating posts in the controller,
 * before we pass the currently active tag and the posts to the template.
 *
 * More about controllers:
 * https://getkirby.com/docs/guide/templates/controllers
 */
return function ($page) {

    /**
     * We use the collection helper to fetch the posts collection defined in `/site/collections/posts.php`
     * 
     * More about collections:
     * https://getkirby.com/docs/guide/templates/collections
     */
    $posts = collection('posts');

    $tag = param('tag');
    if (empty($tag) === false) {
        $posts = $posts->filterBy('tags', $tag, ',');
    }

    return [
        'tag'   => $tag,
        'posts' => $posts->paginate(2000)
    ];

};
