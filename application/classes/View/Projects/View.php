<?php defined('SYSPATH') OR die('No direct script access.');

/**
 * The default projects list page view.
 */
class View_Projects_View extends View_Layout {

	/**
	 * Title on the page itself.
	 *
	 * @var string Title
	 */
	public $title = 'Projects';

	/**
	 * Content for the default view.
	 *
	 * @var string Content
	 */
	public $content = '';

	/**
	 * Array of projects from DB
	 *
	 * @var string Projects
	 */
	public $projects = '';

}
