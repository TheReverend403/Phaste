<?php

class ViewController extends ControllerBase 
{

    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {

    }

    public function showAction($slug)
    {
        $paste = Pastes::findFirstBySlug($slug);
        $this->view->paste = $paste;
        $this->tag->appendTitle($paste->slug);
    }
}

