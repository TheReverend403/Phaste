<?php

use Phalcon\Text;

class NewController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        // No view needed since this is all backend stuff.
        $this->view->disable();
        if ($this->request->isPost()) 
        {
            $content = $this->request->getPost('content');
            if (strlen($content) == 0)
            {
                $this->response->setStatusCode(400, "Paste content cannot be empty.");
                $this->flashSession->error("Paste content cannot be empty!");
                return $this->response->redirect();
            }
            $slug = Text::random(Text::RANDOM_ALNUM, 12);

            $paste = new Paste();

            $paste->slug = $slug;
            $paste->creator_ipv4 = $this->request->getClientAddress();
            $success = $paste->save($this->request->getPost(), array('content'));
            if (!$success) 
            {
                $this->flashSession->error("Paste could not be saved!");
                foreach ($paste->getMessages() as $message) 
                {
                    $this->flashSession->error($message);
                }
                return $this->response->redirect();
            }
            return $this->response->redirect('v/'.$slug);
        }
    }

}

