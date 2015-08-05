<?php

use Phalcon\Http\Response;

class ViewController extends ControllerBase 
{

    public function indexAction()
    {
        $this->view->disable();
        return $this->response->redirect('/');
    }

    public function showAction($slug)
    {
        $paste = Paste::findFirstBySlug($slug, 
           array('cache' => array('lifetime' => 3600, 'key' => 'paste-'.$slug)
        ));

        if (!$paste)
        {
            return $this->dispatcher->forward(array(
                'controller' => 'view', 'action' => 'notFound')
            ); 
        }

        if ($this->dispatcher->getParam("raw"))
        {
            $plain_response = new Response();
            $plain_response->setHeader("Content-Type", "text/plain");
            $plain_response->setContent($paste->content);
            return $plain_response;
        }

        $this->view->paste = $paste;
        $this->tag->appendTitle($paste->slug);
    }

    public function notFoundAction()
    { 
        $this->response->setStatusCode(404, 'Not Found');
        $this->tag->appendTitle('Not found');
    }
}

