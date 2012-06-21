<?php

class capistranoSetupTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
      // add your own options here
    ));

    $this->namespace        = 'capistrano';
    $this->name             = 'setup';
    $this->briefDescription = 'Создание файловой структуры сервера';
    $this->detailedDescription = <<<EOF
The [capistrano:setup|INFO] task does things.
    Просто вызывает ruby-script:
        cap deploy:setup
  [php symfony capistrano:setup|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
      $output = array();
      exec("cap deploy:setup", $output);
      
      foreach($output as $tb) {
          echo $tb;
      }
  }
}