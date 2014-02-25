<?php defined('SYSPATH') OR die('No direct script access.');

/**
 * Shows basic pages of the website.
 */
class Controller_Page extends Controller_Layout
{
	/**
	 * Loads and displays the Home template
	 *
	 * @return void
	 */
	public function action_home()
	{
		
	}

	/**
	 * Autoloads view templates which don't have a specific route setup
	 *
	 * @return void
	 */
	public function action_loader()
	{
		$template_path = $this->request->param('template_path');
		if(Kohana::find_file('templates', $template_path, 'mustache'))
		{
			$this->view = new View_Layout;
			$this->template = $template_path;
		}
	}
}
