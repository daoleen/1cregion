<?php

class Addofficeregiontoproject extends Doctrine_Migration_Base
{
  public function up()
  {
      $this->addColumn('project', 'office_region_id', 'integer');
  }

  public function down()
  {
      $this->removeColumn('project', 'office_region_id');
  }
}
