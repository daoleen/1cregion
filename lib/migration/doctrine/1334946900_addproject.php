<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addproject extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('project', array(
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
              'length' => 80,
             ),
             'small_description' => 
             array(
              'type' => 'string',
              'notnull' => true,
              'length' => 100,
             ),
             'description' => 
             array(
              'type' => 'string',
              'notnull' => true,
              'length' => 2000,
             ),
             'file_src' => 
             array(
              'type' => 'string',
              'length' => 255,
             ),
             'category_id' => 
             array(
              'type' => 'integer',
              'notnull' => true,
              'length' => 8,
             ),
             'work_type' => 
             array(
              'type' => 'enum',
              'values' => 
              array(
              0 => 'Проекты',
              1 => 'В офис',
              ),
              'default' => 'Проекты',
              'length' => NULL,
             ),
             'office_country_id' => 
             array(
              'type' => 'integer',
              'length' => 8,
             ),
             'office_city_id' => 
             array(
              'type' => 'integer',
              'length' => 8,
             ),
             'is_budget_by_agreement' => 
             array(
              'type' => 'boolean',
              'notnull' => true,
              'default' => 0,
              'length' => 25,
             ),
             'budget' => 
             array(
              'type' => 'float',
              'length' => 8,
              'notnull' => true,
              'default' => 0,
             ),
             'budget_currency_id' => 
             array(
              'type' => 'integer',
              'length' => 8,
             ),
             'budget_type' => 
             array(
              'type' => 'enum',
              'values' => 
              array(
              0 => 'цена за час',
              1 => 'цена за день',
              2 => 'цена за месяц',
              3 => 'цена за проект',
              ),
              'default' => 'цена за проект',
              'length' => NULL,
             ),
             'is_security_deal' => 
             array(
              'type' => 'boolean',
              'notnull' => true,
              'default' => 0,
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
             'slug' => 
             array(
              'type' => 'string',
              'length' => 255,
             ),
             ), array(
             'indexes' => 
             array(
              'project_sluggable' => 
              array(
              'fields' => 
              array(
               0 => 'slug',
              ),
              'type' => 'unique',
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
        $this->dropTable('project');
    }
}