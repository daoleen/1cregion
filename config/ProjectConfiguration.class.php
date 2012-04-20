<?php

require_once '/opt/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfDoctrineGuardPlugin');
  }
  
  public function configureDoctrine(Doctrine_Manager $manager)
  {
      $manager->setCharset('utf8');
      $manager->setCollate('utf8_general_ci');
  }
}
