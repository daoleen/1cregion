<?php
class MessagesComponents extends sfComponents
{
    public function executeSendmessage(sfWebRequest $request)
    {
        $this->form = new MessagesForm();
        $this->form->setDefault('to_id', $this->listener->getId());
    }
}
?>