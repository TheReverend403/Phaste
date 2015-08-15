<?php

class ErrorController extends ControllerBase
{
    public function e404Action()
    {
        $this->response->setStatusCode(404, 'Not Found');
        $this->tag->appendTitle('Page Not Found');
    }

    public function e500Action()
    {
        $this->response->setStatusCode(500, 'Internal Server Error');
        $this->tag->appendTitle('Internal Server Error');
    }
}
