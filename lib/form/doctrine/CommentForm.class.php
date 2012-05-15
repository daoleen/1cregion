<?php

/**
 * Comment form.
 *
 * @package    1CRegion.ru
 * @subpackage form
 * @author     Alex Kozlov <alexssource@gmail.com>
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CommentForm extends BaseCommentForm
{
  public function configure()
  {
      unset(
              $this['user_id'], $this['is_active'], 
              $this['is_candidate'], $this['is_performer'], 
              $this['created_at'], $this['updated_at']
        );
      
      $this->setWidget('project_id', new sfWidgetFormInputHidden());
  }
}
