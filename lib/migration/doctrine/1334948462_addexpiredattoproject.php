<?php

class Addexpiredattoproject extends Doctrine_Migration_Base
{
  public function up()
  {
      $this->addColumn('project', 'expires_at', 'timestamp', 25, array('notnull' => true));
  }

  public function down()
  {
      $this->removeColumn('project', 'expired_at');
  }
}
