<?php

class capistranoDeployTask extends sfBaseTask
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
    $this->name             = 'deploy';
    $this->briefDescription = 'Обновляет приложение до новейшей версии';
    $this->detailedDescription = <<<EOF
The [capistrano:deploy|INFO] task does things.
    Выполняет ruby-скрипт:
        cap deploy
    Исходный код проекта берет из github'a
  [php symfony capistrano:deploy|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
      $output = array();
      exec("cap deploy", $output);
      
      foreach($output as $tb) {
          echo $tb;
      }
  }
}
