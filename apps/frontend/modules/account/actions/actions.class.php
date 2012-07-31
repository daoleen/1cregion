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
}