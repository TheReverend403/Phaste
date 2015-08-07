<?php

use Phalcon\Http\Response;

class ViewController extends ControllerBase 
{
    public $paste;
    // Set up data here since both actions use the same data.
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
                'controller' => 'index', 'action' => 'notFound')
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
}
