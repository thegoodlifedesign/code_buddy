<?php namespace ThreeAccents\Auth\Events;

use Illuminate\Queue\SerializesModels;

class UserWasLoggedIn{

	use SerializesModels;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

}
