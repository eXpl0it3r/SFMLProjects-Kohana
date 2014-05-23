<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * User Token Model
 */
class Model_User_Token extends Model {

	/**
	 * Construct model and garbage collect
	 */
	public function __construct()
	{
			if (mt_rand(1, 100) === 1)
			{
				// Do garbage collection
				$this->delete_expired();
			}
	}

	/**
	 * Deletes all expired tokens.
	 *
	 * @return void
	 */
	public function delete_expired()
	{
		// Delete all expired tokens
		$result = DB::delete('user_tokens')
			->where('expires', '<', time())
			->execute();
	}

	/**
	 * Get token by token.
	 *
	 * @param  string  $token  User token.
	 * @return mixed           Token as Database_Result object, otherwise false.
	 */
	public function get_by_token($token)
	{
		$result = DB::select()->from('user_tokens')
			->where('token', '=', $token)
			->as_object()->execute();

		return $result ? $result->current() : false;
	}

	/**
	 * Delete all tokens with the user ID.
	 *
	 * @param  int  $user_id  User ID
	 * @return void
	 */
	public function delete_user($user_id)
	{
		$result = DB::delete('user_token')
			->where('user_id', '=', $user_id)
			->execute();
	}

	/**
	 * Delete one token by token
	 *
	 * @param  string  $token  Token
	 * @return void
	 */
	public function delete_token($token)
	{
		$result = DB::delete('user_tokens')
			->where('token', '=', $token)
			->execute();
	}

	/**
	 * Create a new user token.
	 *
	 * @param  mixed  $data  User token data.
	 * @return mixed         Token as Database_Result object, otherwise false
	 */
	public function create($data)
	{
		// We want an object to work with
		if ( ! is_object($data))
			$data = (object) $data;

		$token = DB::insert('user_tokens')
			->columns(array(
				'user_id',
				'user_agent',
				'token',
				'created',
				'expires'
			))
			->values(array(
				$data->user_id,
				$data->user_agent,
				$this->create_token(),
				DB::expr('NOW()'),
				$data->expires
			))
			->execute();

		if ($token[1] == 0)
			return false;

		$result = DB::select()->from('user_tokens')
			->where('id', '=', $token[0])
			->as_object()->execute();
		
		return $result ? $result->current() : false;
	}

	/**
	 * Update token.
	 *
	 * @param  mixed  $data  New token data
	 * @return mixed         New token Database_Result object, otherwise false
	 */
	public function update($data)
	{
		$data->token = create_token();

		$result = DB::update('user_token')
			->set(array(
				'user_id'    => $data->user_id,
				'user_agent' => $data->user_agent,
				'token'      => $data->token,
				'created'    => $data->created,
				'expires'    => $data->expires
			))
			->where('id', '=', $data->id)
			->execute();

		return $result > 0 ? $data : false;
	}

	/**
	 * Create the token itself.
	 *
	 * @return string
	 */
	protected function create_token()
	{
		do
		{
			$token = sha1(uniqid(Text::random('alnum', 32), true));

			$db_token = DB::select('token')->from('user_tokens')
				->where('token', '=', $token)
				->execute()->get('id', 0);
		}
		while($db_token != 0);

		return $token;
	}

}
