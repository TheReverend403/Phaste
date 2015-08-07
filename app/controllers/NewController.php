<?php

use Phalcon\Text;

class NewController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {
        // No view needed since this is all backend stuff.
        $this->view->disable();

        $slug = Text::random(Text::RANDOM_ALNUM, 13);

        $paste = new Paste();
        $paste->slug = $slug;
        $paste->creator_ipv4 = $this->request->getClientAddress();

        if (!$paste->save($this->request->getPost(), array('content'))) 
        {
            foreach ($paste->getMessages() as $message) 
            {
                $this->flash->error($message->getMessage());
            }
            return $this->response->redirect();
        }
        return $this->response->redirect('/v/'.$slug);
    }
}
