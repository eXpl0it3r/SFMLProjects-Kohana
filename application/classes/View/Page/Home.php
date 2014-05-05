<?php defined('SYSPATH') OR die('No direct script access.');

/**
 * Shows the Home website.
 */
class View_Page_Home extends View_Page_View {

	/**
	 * Returns the welcome message.
	 *
	 * @return string
	 */
	public function welcome()
	{
		return  __('Welcome Home');
	}

}

