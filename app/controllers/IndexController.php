<?php

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $this->tag->appendTitle('Index');
    }

    public function notFoundAction()
    {
        $this->response->setStatusCode(404, 'Not Found');
        $this->tag->appendTitle('Page not found');
    }
}
