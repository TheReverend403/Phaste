<?php

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $this->tag->appendTitle('Index');
    }
}
