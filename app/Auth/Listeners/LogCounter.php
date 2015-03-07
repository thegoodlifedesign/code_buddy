<?php namespace TGL\Auth\Listeners;

use TGL\Auth\Events\UserWasLoggedIn;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class LogCounter {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  UserWasLoggedIn  $event
	 * @return void
	 */
	public function handle(UserWasLoggedIn $event)
	{
		//
	}

}
