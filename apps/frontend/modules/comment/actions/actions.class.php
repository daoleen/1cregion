<?php

/**
 * comment actions.
 *
 * @package    1CRegion.ru
 * @subpackage comment
 * @author     Alex Kozlov <alexssource@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class commentActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward404();
  }
  
  
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CommentForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('form');
  }
  
  
  private function processForm(sfWebRequest $request, sfForm $form)
  {
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      
      if ($form->isValid())
      {
        $comment = $form->save();
        $project = Project::getById($form->getValue('project_id'));
        $this->redirect('project_show', $project);
      }
  }
}
