<?php namespace ThreeAccents\Core\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use ThreeAccents\Packages\CommandBus\CommandTrait;

abstract class Controller extends BaseController {
	use CommandTrait;
}
