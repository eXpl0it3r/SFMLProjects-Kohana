<?php defined('SYSPATH') OR die('No direct script access.');

/**
 * Database Model for the navigation.
 */
class Model_Navigation extends Model {

	/**
	 * Get all the navigation entries.
	 *
	 * @return mixed If navigation entreis exist Database_Result, false otherwise
	 */
	public function get_all()
	{
		$result = DB::select()->from('navigations')
			->where('visible', '=', true)
			->as_object()->execute();

		return $result->count() > 0 ? $result : false;
	}

}
