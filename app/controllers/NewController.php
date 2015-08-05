<?php
use Phalcon\Text;


class NewController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        if ($this->request->isPost()) 
        {
            $content = $this->request->getPost('content');
            if (strlen($content) == 0)
            {
                $this->response->setStatusCode(400, "Paste content cannot be empty.");
                return $this->response->redirect('/');
            }
            $slug = Text::random(Text::RANDOM_ALNUM, 12);

            $paste = new Pastes();
            $paste->slug = $slug;
            $success = $paste->save($this->request->getPost(), array('content'));
            if (!$success) 
            {
                echo "Sorry, the following problems were generated: ";
                foreach ($paste->getMessages() as $message) 
                {
                    echo $message->getMessage(), "<br/>";
                }
                return;
            }
            return $this->response->redirect('v/'.$slug);
        }
    }

}

