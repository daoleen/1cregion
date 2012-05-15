<?php

class Addisactivetoproject extends Doctrine_Migration_Base
{
  public function up()
  {
      $this->addColumn('project', 'is_active', 'boolean', null, array('default' => true));
  }

  public function down()
  {
      $this->removeColumn('project', 'is_active');
  }
}
