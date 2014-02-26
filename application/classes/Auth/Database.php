<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * Database Auth driver.
 *
 * @TODO Support roles
 */
class Auth_Database extends Auth
{

	/**
	 * Checks if a session is active.
	 *
	 * @param   mixed    $role Role name string, role Model object, or array with role names
	 * @return  boolean
	 */
	public function logged_in($role = NULL)
	{
		// Get the user from the session
		$user = $this->get_user();

		if(!$user)
			return false;

		// TODO: Role checking

		return true;
	}

	/**
	 * Logs a user in.
	 *
	 * @param   string   $username  Username
	 * @param   string   $password  Password
	 * @param   boolean  $remember  Enable autologin
	 * @return  boolean
	 */
	protected function _login($username, $password, $remember)
	{
		if(is_string($password))
		{
			// Create a hashed password
			$password = $this->hash($password);
		}

		$mod_user = new Model_User;

		$user = $mod_user->get_by_username($username);

		// If the passwords match, perform a login
		if($user && $user->password === $password)
		{
			if($remember === true)
			{
				// Token data
				$data = array(
					'user_id'    => $user->id,
					'expires'    => time() + $this->_config['lifetime'],
					'user_agent' => sha1(Request::$user_agent),
				);

				// Create a new autologin token
				$mod_token = new Model_User_Token;

				$token = $mod_token->create($data);

				// Set the autologin cookie
				Cookie::set('authautologin', $token->token, $this->_config['lifetime']);
			}

			// Finish the login
			$this->complete_login($user->username);

			return true;
		}

		// Login failed
		return false;
	}

	/**
	 * Forces a user to be logged in, without specifying a password.
	 *
	 * @param   mixed    $user                    username string
	 * @param   boolean  $mark_session_as_forced  mark the session as forced
	 * @return  boolean
	 */
	public function force_login($username, $mark_session_as_forced = false)
	{
		$mod_user = new Model_User;

		if($mark_session_as_forced === true)
		{
			// Mark the session as forced, to prevent users from changing account information
			$this->_session->set('auth_forced', true);
		}

		// Run the standard completion
		$this->complete_login($username);
	}

	/**
	 * Logs a user in, based on the authautologin cookie.
	 *
	 * @return  mixed
	 */
	public function auto_login()
	{
		if($token = Cookie::get('authautologin'))
		{
			$mod_token = new Model_User_Token;
			$mod_token = new Model_User;

			// Load the token and user
			$token = $mod_token->get_by_token($token);

			if($token)
			{
				$user = $mod_user->get($token->user_id);

				if($user && $token->user_agent === sha1(Request::$user_agent))
				{
					// Save the token to create a new unique token
					$token = $mod_token->update_token($token);

					// Set the new token
					Cookie::set('authautologin', $token->token, $token->expires - time());

					// Complete the login with the found data
					$this->complete_login($user->username);

					// Automatic login was successful
					return $user->username;
				}
			}
		}

		return false;
	}

	/**
	 * Gets the currently logged in user from the session (with auto_login check).
	 * Returns $default if no user is currently logged in.
	 *
	 * @param   mixed    $default to return in case user isn't logged in
	 * @return  mixed
	 */
	public function get_user($default = NULL)
	{
		$user = parent::get_user($default);

		if($user === $default)
		{
			// check for "remembered" login
			if(($user = $this->auto_login()) === false)
				return $default;
		}

		return $user;
	}

	/**
	 * Log a user out and remove any autologin cookies.
	 *
	 * @param   boolean  $destroy     completely destroy the session
	 * @param	  boolean  $logout_all  remove all tokens for user
	 * @return  boolean
	 */
	public function logout($destroy = false, $logout_all = false)
	{
		// Set by force_login()
		$this->_session->delete('auth_forced');

		if($token = Cookie::get('authautologin'))
		{
			// Delete the autologin cookie to prevent re-login
			Cookie::delete('authautologin');

			// Clear the autologin token from the database
			$mod_token = new Model_User_Token;

			$token = $mod_token->get_by_token($token);

			if($token)
			{
				if($logout_all)
				{
					// Delete all user tokens. This isn't the most elegant solution but does the job
					$tokens = $mod_token->delete_user($token->user_id);
				}
				else
				{
					$mod_token->delete_token($token->token);
				}
			}
		}

		return parent::logout($destroy);
	}

	/**
	 * Get the stored password for a username.
	 *
	 * @param   string  $username  Username
	 * @return  string             Password
	 */
	public function password($username)
	{
		$mod_user = new Model_User;

		$user = $mod_user->get_by_username($username);

		if(!$user)
			return '';

		return $user->password;
	}

	/**
	 * Complete the login for a user by incrementing the logins and setting
	 * session data: user_id, username, roles.
	 *
	 * @param   object  $user  user ORM object
	 * @return  void
	 */
	protected function complete_login($username)
	{
		$mod_user = new Model_User;

		$mod_user->complete_login($username);

		return parent::complete_login($username);
	}

	/**
	 * Compare password with original (hashed). Works for current (logged in) user
	 *
	 * @param   string  $password
	 * @return  boolean
	 */
	public function check_password($password)
	{
		$username = $this->get_user();

		if(!$username)
			return false;

		return ($this->hash($password) === $this->password($username));
	}

} // End Auth ORM
