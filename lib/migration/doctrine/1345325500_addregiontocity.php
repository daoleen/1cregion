<?php

class Addregiontocity extends Doctrine_Migration_Base
{
  public function up()
  {
      $this->addColumn('city', 'region_id', 'integer', array('notnull' => true));
  }

  public function down()
  {
      $this->removeColumn('city', 'region_id');
  }
}
