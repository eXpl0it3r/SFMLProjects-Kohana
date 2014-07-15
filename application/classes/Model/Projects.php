<?php defined('SYSPATH') OR die('No direct script access.');

/**
 * Database Model for projects.
 */
class Model_Projects extends Model {

	/**
	 * Get projects list.
	 *
	 * @return array of database entries
	 */
	public function get()
	{
		$result = DB::select()->from('projects')->execute()->as_array();
		return $result ? $result : array();
	}
}
