<?php

class Addratingtoaccount extends Doctrine_Migration_Base
{
  public function up()
  {
      $this->addColumn('account', 'rating', 'integer', null, array('notnull' => true, 'default' => 0));
  }

  public function down()
  {
      $this->removeColumn('account', 'rating');
  }
}
