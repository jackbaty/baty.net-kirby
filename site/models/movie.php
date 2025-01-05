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
class MoviePage extends Page
{

	public function poster()
    {
        return $this->content()->poster()->toFile() ?? $this->image();
    }
    public function published($format = null)
    {
        return parent::date()->toDate($format ?? 'd M, Y');
    }
    public function postContent()
    {
    	$content = $this->content()->poster()->tofile() ?? $this-image();
    	
    	$content .= '<p>Rating: ' . $this->content()->rating() . '</p>';
    	return $content . $this->content()->text()->kt();
    }
    public function postTitle()
    {
    	return $this->content()->title() . " (" . $this->content()->year() . ")";
    }


}
