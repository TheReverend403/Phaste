<?php

class ErrorController extends ControllerBase
{
    public function e404Action()
    {
        $this->response->setStatusCode(404, 'Not Found');
        $this->tag->appendTitle('Page Not Found');
    }
}
