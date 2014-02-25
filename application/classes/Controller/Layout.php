<?php defined('SYSPATH') OR die('No direct script access.');

/**
 * Layout controller. All controllers should extend this one.
 */
abstract class Controller_Layout extends Controller
{
	/**
	 * Stores the view class object to render
	 * @var View
	 */
	protected $view;

	/**
	 * Stores the template to render
	 * @var string
	 */
	protected $template = NULL;

	/**
	 * Stores the name of the layout to use to render the view
	 * @var string
	 */
	protected $layout = 'layout';

	/**
	 * Automatically loads a view class into $this->view
	 *
	 * @return void
	 */
	public function before()
	{
		$this->view = new stdClass;
		$view_class_name = 'View_'.ucfirst($this->request->controller()).'_'.ucfirst($this->request->action());

		if(Kohana::find_file('classes', str_replace('_', '/', $view_class_name)))
		{
			$this->view = new $view_class_name;
		}
	}

	/**
	 * Automatically renders the current view in $this->view
	 *
	 * @return void
	 */
	public function after()
	{
		$this->view->request = $this->request;

		if(get_class($this->view) !== 'stdClass')
			return $this->response->body(Kostache_Layout::factory($this->layout)->render($this->view, $this->template));
		else
			throw New HTTP_Exception_404('View not found.');
	}
}
