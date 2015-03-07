<?php namespace ThreeAccents\Auth\Events;

use Illuminate\Queue\SerializesModels;

class UserWasRegistered{

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
