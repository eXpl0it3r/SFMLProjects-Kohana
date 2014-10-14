<?php defined('SYSPATH') OR die('No direct script access.');

/**
 * Shows basic/static pages of the website.
 */
class Controller_Auth extends Controller_Page {

	/**
	 * Action login (logs in or output login form)
	 *
	 * @return void
	 */
	public function action_login()
	{
		$this->view = new View_Page_View;
		$post = $this->request->post();

		if ($post) {
			$success = Auth_Database::instance()->login($post['login'], $post['pass']);
			if ($success)
				$this->redirect("/");
			else
				$this->view->add_alert("danger", "Error!", "Incorrect login/password");
		}

		$this->view->title      = 'Login';
		$this->active           = $this->view->title;
		$this->view->page_title = $this->view->title.' - '.$this->view->page_title;
		$this->template         = 'page/login';
	}


	/**
	 * Action logout (logs out)
	 *
	 * @return void
	 */
	public function action_logout()
	{
		Auth_Database::instance()->logout();
		$this->redirect("/");
	}

}
