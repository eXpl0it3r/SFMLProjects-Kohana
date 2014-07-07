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
		$route = $this->request->param('route');

		$model = Model::factory('Page');

		$page = $model->get($route);

		$this->view = new View_Page_View;

		if ( ! $page)
			throw new HTTP_Exception_404('Page not found');

		$this->view->page_title = $page->title.' - '.$this->view->page_title;
		$this->view->title      = $page->title;
		$this->view->content    = $page->content;

		$this->active = 'Home';
	}

}
