<?php

/**
 * activate actions.
 *
 * @package    1CRegion.ru
 * @subpackage activate
 * @author     Alex Kozlov <alexssource@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class activateActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeActivateUser(sfWebRequest $request)
  {
      $user = sfGuardUser::getByUsername($request->getParameter('username'));
      $token_original = Helper::getUserActivationToken($user->getUsername(), $user->getEmailAddress);
      
      if($token_original != $request->getParameter('token')) {
          $this->getUser()->setFlash('notice', 'Bad token value');
          $this->redirect('@homepage');
      }
      else {
          $user->setIsActive(true);
          $this->getUser()->signIn($user);
          $this->redirect404();
      }
  }
}
