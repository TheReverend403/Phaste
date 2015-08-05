<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    protected function initialize()
    {
        $this->tag->prependTitle('FoxPaste - ');
        $this->view->setTemplateAfter('main');
    }
}
