<?php

/**
 * sfGuardFormSignin for sfGuardAuth signin action
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardFormSignin.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class sfGuardFormSignin extends BasesfGuardFormSignin
{
  /**
   * @see sfForm
   */
  public function configure()
  {
      $this->widgetSchema['username']->setLabel("Логин");
      $this->widgetSchema['password']->setLabel("Пароль");
      $this->widgetSchema['remember']->setLabel("Запомнить");
      
      $this->widgetSchema['username']->setAttribute('class', 'autorisation_input_text');
      $this->widgetSchema['password']->setAttribute('class', 'autorisation_input_text');
  }
  
  public function getStylesheets() {
      return array('authorisation_component.css' => null);
  }
}
