<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addsfguarduser extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('sf_guard_user', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => 8,
              'autoincrement' => true,
              'primary' => true,
             ),
             'first_name' => 
             array(
              'type' => 'string',
              'length' => 255,
             ),
             'last_name' => 
             array(
              'type' => 'string',
              'length' => 255,
             ),
             'email_address' => 
             array(
              'type' => 'string',
              'notnull' => true,
              'unique' => true,
              'length' => 255,
             ),
             'username' => 
             array(
              'type' => 'string',
              'notnull' => true,
              'unique' => true,
              'length' => 128,
             ),
             'algorithm' => 
             array(
              'type' => 'string',
              'default' => 'sha1',
              'notnull' => true,
              'length' => 128,
             ),
             'salt' => 
             array(
              'type' => 'string',
              'length' => 128,
             ),
             'password' => 
             array(
              'type' => 'string',
              'length' => 128,
             ),
             'is_active' => 
             array(
              'type' => 'boolean',
              'default' => 0,
              'length' => 25,
             ),
             'is_super_admin' => 
             array(
              'type' => 'boolean',
              'default' => 0,
              'length' => 25,
             ),
             'last_login' => 
             array(
              'type' => 'timestamp',
              'length' => 25,
             ),
             'created_at' => 
             array(
              'notnull' => true,
              'type' => 'timestamp',
              'length' => 25,
             ),
             'updated_at' => 
             array(
              'notnull' => true,
              'type' => 'timestamp',
              'length' => 25,
             ),
             ), array(
             'indexes' => 
             array(
              'is_active_idx' => 
              array(
              'fields' => 
              array(
               0 => 'is_active',
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
        $this->dropTable('sf_guard_user');
    }
}