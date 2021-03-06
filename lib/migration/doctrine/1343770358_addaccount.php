<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addaccount extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('account', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => 8,
              'autoincrement' => true,
              'primary' => true,
             ),
             'birthday' => 
             array(
              'type' => 'date',
              'default' => '1994-01-01',
              'length' => 25,
             ),
             'country_id' => 
             array(
              'type' => 'integer',
              'length' => 8,
             ),
             'city_id' => 
             array(
              'type' => 'integer',
              'length' => 8,
             ),
             'visitors' => 
             array(
              'type' => 'integer',
              'notnull' => true,
              'default' => 0,
              'length' => 8,
             ),
             'email' => 
             array(
              'type' => 'string',
              'length' => 100,
             ),
             'icq' => 
             array(
              'type' => 'string',
              'length' => 20,
             ),
             'skype' => 
             array(
              'type' => 'string',
              'length' => 100,
             ),
             'other_contacts' => 
             array(
              'type' => 'string',
              'length' => 255,
             ),
             'other_info' => 
             array(
              'type' => 'string',
              'length' => 1000,
             ),
             ), array(
             'indexes' => 
             array(
              'city_idx' => 
              array(
              'fields' => 
              array(
               0 => 'country_id',
               1 => 'city_id',
              ),
              ),
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
        $this->dropTable('account');
    }
}