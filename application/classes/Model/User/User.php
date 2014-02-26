<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * User Model
 */
class Model_User_User extends Model
{

	/**
	 * Get the user by the username.
	 *
	 * @param  string  $username  Username
	 * @return mixed              User Database_Result object, false otherwise
	 */
	public function get_by_username($username)
	{
		$result = DB::select()->from('users')
			->where('username', '=', $username)
			->as_object()->execute();

		if(!$result)
			return false;

		return $result->current();
	}

	/**
	 * Complete the login for a user by incrementing the logins
	 * and saving login timestamp
	 *
	 * @param  string  $username  Username
	 * @return void
	 */
	public function complete_login($username)
	{
		$result = DB::update('users')
			->set(array(
				'logins' => DB::expr('logins + 1'),
				'last_login' => DB::expr('NOW()')
			))
			->where('username', '=', $username)
			->execute();
	}
}
