<?php

class ViewController extends ControllerBase 
{

    public function indexAction()
    {

    }

    public function showAction($slug)
    {
        $paste = Pastes::findFirstBySlug($slug, 
           array('cache' => array('lifetime' => 3600, 'key' => 'paste-'.$slug)
        ));
        $this->view->paste = $paste;
        $this->tag->appendTitle($paste->slug);
    }
}

