<?php

class Addavatartoaccount extends Doctrine_Migration_Base
{
  public function up()
  {
      $this->addColumn('account', 'avatar', 'string', 100);
  }

  public function down()
  {
      $this->removeColumn('account', 'avatar');
  }
}
