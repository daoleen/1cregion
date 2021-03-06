<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addcurrency extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('currency', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => 8,
              'autoincrement' => true,
              'primary' => true,
             ),
             'name' => 
             array(
              'type' => 'string',
              'notnull' => true,
              'unique' => true,
              'length' => 16,
             ),
             'coef' => 
             array(
              'type' => 'float',
              'length' => 8,
              'notnull' => true,
              'default' => 1,
             ),
             ), array(
             'indexes' => 
             array(
             ),
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_general_ci',
             'charset' => 'utf8',
             ));
    }

    public function down()
    {
        $this->dropTable('currency');
    }
}