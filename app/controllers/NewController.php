<?php

use Phalcon\Text;

class NewController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {
        // No view needed since this is all backend stuff.
        $this->view->disable();

        // Generate random ids until we find one not in use.
        // This will cause one additional SQL query at minimum when creating a paste.
        $id;
        do
        {
            $id = Text::random(Text::RANDOM_ALNUM, rand(5,13));   
        }
        while (Paste::findFirstByid($id));

        $paste = new Paste();
        $paste->id = $id;
        $paste->content = $this->request->getPost("content");
        $paste->lang = $this->request->getPost("lang");
        // No sanitisation needed if we accept anything at all to mean true and nothing to mean false.
        // Also addresses http://stackoverflow.com/a/14067312
        $paste->private = $this->request->getPost("private") == null ? 0 : 1;
        $paste->owner_addr = $this->request->getClientAddress();
        $paste->size_bytes = strlen($paste->content);

        if (!$paste->save())
        {
            foreach ($paste->getMessages() as $message)
            {
                $this->flash->error($message->getMessage());
            }
            return $this->response->redirect();
        }
        return $this->response->redirect($this->url->get("v/$id"));
    }
}
