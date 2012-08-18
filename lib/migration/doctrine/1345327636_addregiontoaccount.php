<?php

class Addregiontoaccount extends Doctrine_Migration_Base
{
  public function up()
  {
      $this->addColumn('account', 'region_id', 'integer');
  }

  public function down()
  {
      $this->removeColumn('account', 'region_id');
  }
}
