<?php

use Phalcon\Http\Response;

class ViewController extends ControllerBase 
{
    public $paste;
    function initialize()
    {
        parent::initialize();
        $slug = $this->dispatcher->getParam("slug");
        $this->paste = Paste::findFirstBySlug($slug, array(
            'cache' => array('lifetime' => 3600, 'key' => $slug)
        ));

        if (!$this->paste)
        {
            return $this->dispatcher->forward(array(
                'controller' => 'view', 'action' => 'notFound')
            ); 
        }
    }

    public function indexAction()
    {
        $this->view->paste = $this->paste;
        $this->tag->appendTitle($this->paste->slug);
    }

    public function rawAction()
    {
        $plain_response = new Response();
        $plain_response->setHeader("Content-Type", "text/plain");
        $plain_response->setContent($this->paste->content);
        return $plain_response;
    }

    public function notFoundAction()
    { 
        $this->response->setStatusCode(404, 'Not Found');
        $this->tag->appendTitle('Paste not found');
    }
}
