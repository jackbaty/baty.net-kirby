<?php

/**
 * Page models extend Kirby's default page object.
 *
 * In page models you can define methods that are then available
 * everywhere in Kirby where you call a page of the extended type.
 *
 * In this example, we define the cover method that either returns
 * an image selected in the cover field or the first image in the folder.
 *
 * You can see the method in use in the `post.php` snippet.
 * and in the `site/blueprints/sections/posts.yml` image query
 *
 * We also define a custom date handler here, which keeps date formatting
 * for the published date consistent in templates, snippets and blueprints.
 *
 * More about models: https://getkirby.com/docs/guide/templates/page-models
 */
class NotePage extends Page
{
    public function cover()
    {
        return $this->content()->cover()->toFile() ?? $this->image();
    }
    public function published($format = null)
    {
        return parent::date()->toDate($format ?? 'd M, Y');
    }
    public function assignedCover()
    {
    	return $this->content()->cover()->toFile();
    }
    
    /* because I got fancy with real Posts */
    public function postContent()
    {
    	return $this->content()->text()->kt();
    }
    
}
