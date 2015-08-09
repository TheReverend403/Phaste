<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
	protected function initialize()
	{
		if ($this->config->app->timezone != 'system')
		{
			date_default_timezone_set($this->config->app->timezone);
		}
		$this->tag->setTitle($this->config->app->name . ' | ');
	}
}
