<?php defined('SYSPATH') OR die('No direct script access.');

/**
 * Shows projects list page of the website.
 */
class Controller_Projects extends Controller_Layout {

	/**
	 * View projects list.
	 *
	 * @return void
	 */
	public function action_list()
	{
		$model = Model::factory('Projects');
		$this->view             = new View_Projects_View;
		$this->view->page_title = $this->view->title.' - '.$this->view->page_title;
		$this->view->projects   = $model->get();

		$this->active = 'Projects';

		$listmode = $this->request->param('listmode');

		$active_item       = 'class="active"';
		$active_list       = '';
		$active_thumbnails = '';
		$active_compact    = '';

		if ($listmode == 'thumbnails') {
			$this->template    = 'projects/thumbnails';
			$active_thumbnails = $active_item;
		} elseif ($listmode == 'compact') {
			$this->template = 'projects/compact';
			$active_compact = $active_item;
		} else {
			$this->template = 'projects/list';
			$active_list    = $active_item;
		}

		$this->view->content = '<ul class="pagination pagination-sm">'.
		                       '	<li '.$active_list.'><a href="/projects/">List</a></li>'.
		                       '	<li '.$active_thumbnails.'><a href="/projects/thumbnails">Thumbnails</a></li>'.
		                       '	<li '.$active_compact.'><a href="/projects/compact">Compact</a></li>'.
		                       '</ul>';
	}
}
