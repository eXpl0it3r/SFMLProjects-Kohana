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

		$view_class_name = 'View_Page_'.ucfirst($route);
		$this->view = new $view_class_name;

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
