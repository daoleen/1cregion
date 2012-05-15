<?php

class Addtermtoproject extends Doctrine_Migration_Base
{
  public function up()
  {
      $this->addColumn('project', 'term', 'int');
  }

  public function down()
  {
      $this->removeColumn('project', 'term');
  }
}
