<?php

use Phalcon\Http\Response;

class ViewController extends ControllerBase 
{
    public $paste;
    // Set up data here since both actions use the same data.
    function initialize()
    {
        parent::initialize();

        $id = $this->dispatcher->getParam("id");
        $this->paste = Paste::findFirstByid($id, array(
            'cache' => array(
                'lifetime' => 3600, 
                'key' => $id
            )
        ));

        if (!$this->paste)
        {
            return $this->dispatcher->forward(array(
                'controller' => 'error', 
                'action' => 'e404'
            )); 
        }
    }

    public function indexAction()
    {
        $this->view->paste = $this->paste;
        $this->tag->appendTitle($this->paste->id);
    }

    public function rawAction()
    {
        $plain_response = new Response();
        $plain_response->setHeader("Content-Type", "text/plain");
        $plain_response->setContent($this->paste->content);
        return $plain_response;
    }
}
