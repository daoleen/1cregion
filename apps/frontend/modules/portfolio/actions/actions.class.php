<?php

/**
 * portfolio actions.
 *
 * @package    1CRegion.ru
 * @subpackage portfolio
 * @author     Alex Kozlov <alexssource@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class portfolioActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->user = $this->getRoute()->getObject();
    $this->portfolio_works = PortfolioWork::getUserWorks($this->user->getId());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->portfolio_work = Doctrine_Core::getTable('PortfolioWork')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->portfolio_work);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PortfolioWorkForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PortfolioWorkForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($portfolio_work = Doctrine_Core::getTable('PortfolioWork')->find(array($request->getParameter('id'))), sprintf('Object portfolio_work does not exist (%s).', $request->getParameter('id')));
    $this->form = new PortfolioWorkForm($portfolio_work);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($portfolio_work = Doctrine_Core::getTable('PortfolioWork')->find(array($request->getParameter('id'))), sprintf('Object portfolio_work does not exist (%s).', $request->getParameter('id')));
    $this->form = new PortfolioWorkForm($portfolio_work);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $work = $this->getRoute()->getObject();
    
    if($work->User == $this->getUser()->getGuardUser()) {
        $this->forward404Unless($portfolio_work = Doctrine_Core::getTable('PortfolioWork')->find(array($request->getParameter('id'))), sprintf('Object portfolio_work does not exist (%s).', $request->getParameter('id')));
        $portfolio_work->delete();
    }
    $this->redirect('portfolio', $work->User);
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $portfolio_work = $form->save();

      $this->redirect('portfolio/edit?id='.$portfolio_work->getId());
    }
  }
}
