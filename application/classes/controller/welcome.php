<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {

	public function action_index()
	{
		$this->response->body('hello, world from  /var/www/kohana/application/welcome.php!');
	}

} // End Welcome
