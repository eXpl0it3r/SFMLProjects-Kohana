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
	 * Entries for the navigation.
	 *
	 * @var Database_Result Navigation entries
	 */
	public $navigation;

	/**
	 * Currently logged in user
	 *
	 * @var string User name
	 */
	public $username;

	/**
	 * Alerts for current page
	 *
	 * @var array Alerts
	 */
	public $alerts = array();

	/**
	 * Is the login page active for now
	 *
	 * @var bool
	 */
	public $active_login = NULL;

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
	 * Return 'Legal Notice' or the translation of it.
	 *
	 * @return string
	 */
	public function legal()
	{
		return __('Legal Notice');
	}

	/**
	 * Add alert to page.
	 *
	 * @param   string   $class    alert class (success, info, warning, danger)
	 * @param   string   $caption  alert caption will be 'strong'
	 * @param   string   $text     alert text
	 * @return nothing
	 */
	public function add_alert($class, $caption, $text)
	{
		array_push($this->alerts, array(
			"class" => $class,
			"caption" => $caption,
			"text" => $text
		));
	}
}
