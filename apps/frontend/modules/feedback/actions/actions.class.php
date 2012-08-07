<?php

/**
 * feedback actions.
 *
 * @package    1CRegion.ru
 * @subpackage feedback
 * @author     Alex Kozlov <alexssource@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class feedbackActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $user = $this->getRoute()->getObject();
    $feedback = new Feedback();
    
    $this->feedbacks = $feedback->getFeedbacks($user);
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->feedback = Doctrine_Core::getTable('Feedback')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->feedback);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new FeedbackForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new FeedbackForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  /**
  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($feedback = Doctrine_Core::getTable('Feedback')->find(array($request->getParameter('id'))), sprintf('Object feedback does not exist (%s).', $request->getParameter('id')));
    $this->form = new FeedbackForm($feedback);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($feedback = Doctrine_Core::getTable('Feedback')->find(array($request->getParameter('id'))), sprintf('Object feedback does not exist (%s).', $request->getParameter('id')));
    $this->form = new FeedbackForm($feedback);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }
  **/

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($feedback = Doctrine_Core::getTable('Feedback')->find(array($request->getParameter('id'))), sprintf('Object feedback does not exist (%s).', $request->getParameter('id')));
    $feedback->delete();

    $this->redirect('feedback', $feedback->User);
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $feedback = $form->save();

      $this->redirect('feedback', $feedback->User);
    }
  }
}
