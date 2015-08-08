<?php

use Phalcon\Text;

class NewController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {
        // No view needed since this is all backend stuff.
        $this->view->disable();

        // Generate random slugs until we find one not in use.
        // This will cause one additional SQL query at minimum when creating a paste.
        $slug;
        do
        {
            $slug = Text::random(Text::RANDOM_ALNUM, 13);   
        }
        while (Paste::findFirstBySlug($slug));

        $paste = new Paste();
        $paste->slug = $slug;
        // No sanitisation needed if we accept anything at all to mean true and nothing to mean false.
        // Also addresses http://stackoverflow.com/a/14067312
        $paste->private = $this->request->getPost("private") == null ? 0 : 1;
        $paste->creator_ipv4 = $this->request->getClientAddress();

        if (!$paste->save($this->request->getPost(), array('content'))) 
        {
            foreach ($paste->getMessages() as $message)
            {
                $this->flash->error($message->getMessage());
            }
            return $this->response->redirect();
        }
        return $this->response->redirect($this->url->get("v/$slug"));
    }
}
