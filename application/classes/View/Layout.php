<?php defined('SYSPATH') OR die('No direct script access.');

/**
 * Sets up partials for KOstache.
 */
class View_Layout {

	/**
	 * Website head title.
	 *
	 * @var string Website title
	 */
	public $page_title = 'SFML Projects';

	/**
	 * Website description for the meta tag.
	 *
	 * @var string Website description
	 */
	public $meta_description = 'Website dedicated to host, share and archive projects made with SFML.';

	/**
	 * Website author for the meta tag.
	 *
	 * @var string Website author
	 */
	public $meta_author = 'eXpl0it3r';

	/**
	 * The base URL of the website.
	 *
	 * @return string
	 */
	public function baseurl()
	{
		return URL::base();
	}

	/**
	 * The URL where the assets are located.
	 * 
	 * @return string
	 */
	public function assets()
	{
		return URL::base().'assets/';
	}

	/**
	 * The current page that we are on
	 *
	 * @return string
	 */
	public function currenturl()
	{
		return $this->request->uri();
	}

	/**
	 * Returns 'Terms of Use' or the translation of it.
	 *
	 * @return string
	 */
	public function terms()
	{
		return __('Terms of Use');
	}

	/**
	 * Return 'Imprint' or the translation of it.
	 *
	 * @return string
	 */
	public function imprint()
	{
		return __('Imprint');
	}

}
