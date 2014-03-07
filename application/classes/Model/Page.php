<?php defined('SYSPATH') OR die('No direct script access.');

/**
 * Database Model for static pages.
 */
class Model_Page extends Model {

	/**
	 * Get static page info by it's route.
	 *
	 * @param string $route Page route
	 * @return mixed If route exists Database_Result, false otherwise
	 */
	public function get($route)
	{
		$result = DB::select()->from('pages')
			->where('route', '=', $route)
			->as_object()->execute();

		return $result ? $result->current() : false;
	}

}
