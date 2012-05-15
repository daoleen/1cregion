<?php

class Addtermoptionstoproject extends Doctrine_Migration_Base
{
  public function up()
  {
      $this->addColumn('project', 'term_options', 'enum', null, array('value' => array('Час','День', 'Неделя', 'Месяц', 'Год'), 'default' => 'День', 'notnull' => true));
  }

  public function down()
  {
      $this->removeColumn('project', 'term_options');
  }
}
