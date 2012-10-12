<?php

/**
 * Messages form.
 *
 * @package    1CRegion.ru
 * @subpackage form
 * @author     Alex Kozlov <alexssource@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MessagesForm extends BaseMessagesForm
{
  public function configure()
  {
      unset($this['from_id'], $this['created_at'], $this['updated_at']);
      $this->widgetSchema['to_id'] = new sfWidgetFormInputHidden();
  }
}
