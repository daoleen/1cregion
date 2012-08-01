<?php

/**
 * account actions.
 *
 * @package    1CRegion.ru
 * @subpackage account
 * @author     Alex Kozlov <alexssource@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class accountActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->user = $this->getRoute()->getObject();
  }
  
  
  /**
   * Editing a user account
   * Displaying a form 
   */
  public function executeEdit(sfWebRequest $request) {
      $this->user = $this->getRoute()->getObject();
      
      if($this->user != $this->getUser()->getGuardUser()) {
          $this->getUser()->setFlash('notice', 'Вы не можете редактировать чужие аккаунты');
          $this->redirect('@homepage');
      }
      
      $this->form = new AccountForm($this->user->Account);
  }
  
  
  public function executeUpdate(sfWebRequest $request) {
      $this->form = new AccountForm($this->getUser()->getGuardUser()->Account);
      $this->form->bind($request->getParameter($this->form->getName()));
      
      if($this->form->isValid()) {
          $account = $this->form->save();
          $this->redirect('account', $account->User);
      }
      
      $this->setTemplate('edit');
  }
  
  
  public function executeAvatar(sfWebRequest $request) {
      $this->form = new AccountAvatarForm();
  }
  
  public function executeUpdateAvatar(sfWebRequest $request) {
      $this->form = new AccountAvatarForm();
      $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
      
      if($this->form->isValid()) {
          die('success');
      }
      
      $this->setTemplate('avatar');
  }
}