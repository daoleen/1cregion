<?php

/**
 * messages actions.
 *
 * @package    1CRegion.ru
 * @subpackage messages
 * @author     Alex Kozlov <alexssource@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class messagesActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $userTo = $this->getRoute()->getObject();
      $this->form = new MessagesForm();
      $this->form->setDefault('to_id', $userTo->getId());
  }
  
  
  public function executeSend(sfWebRequest $request)
  {
      $this->form = new MessagesForm();
      $this->processForm($request, $this->form);
      $this->setTemplate('index');
  }
  
  
  public function executeContactlist(sfWebRequest $request)
  {
      $user_id = $this->getUser()->getGuardUser()->getId();
      $this->contacts = Messages::getUserContacts($user_id);
      //$unread_senders = Messages::getUserUnreadMessages($user_id);
  }
  
  
  public function executeShow(sfWebRequest $request) {
      $this->sender = $this->getRoute()->getObject();
      $listener = $this->getUser()->getGuardUser();
      
      $this->messages = Messages::getUserMessages($listener->getId(), $this->sender->getId());
      Messages::setUserMessagesToRead($listener->getId(), $this->sender->getId());
  }
  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      
      if ($form->isValid())
      {
        $message = $form->save();
        $this->redirect('messages_show', $message->To);
      }
  }
}
