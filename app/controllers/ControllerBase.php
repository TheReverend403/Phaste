<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    protected function initialize()
    {
        $this->tag->setTitle($this->conf->app->name . ' | ');
    }
}
