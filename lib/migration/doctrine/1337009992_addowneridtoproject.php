<?php

class Addowneridtoproject extends Doctrine_Migration_Base
{
  public function up()
  {
      $this->addColumn('project', 'owner_id', 'integer', 8, array('notnull' => true));
  }

  public function down()
  {
      $this->removeColumn('project', 'owner_id');
  }
}
