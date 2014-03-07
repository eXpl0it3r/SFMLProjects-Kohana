<?php defined('SYSPATH') OR die('No direct script access.');

/**
 * Shows basic/static pages of the website.
 */
class Controller_Page extends Controller_Layout {

	/**
	 * View static page from the database or template.
	 *
	 * @return void
	 */
	public function action_view()
	{
		$model = Model::factory('Page');

		$page = $model->get($this->request->param('route'));

		if ( ! $page)
			throw new HTTP_Exception_404('Page not found');

		if ($page->template)
		{
			$this->template = 'page/'.$page->template;
		}

		$this->view->page_title = $page->title.' - '.$this->view->page_title;
		$this->view->title      = $page->title;
		$this->view->content    = $page->content;
	}

}
